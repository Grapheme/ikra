<?php

class ApplicationController extends BaseController {

    public static $name = 'application';
    public static $group = 'application';
    public static $user_city_cache_key = 'current_city';
    public static $user_city_cache_min = 525600; #60*24*365;
    public static $global_cache_min = 10;

    /****************************************************************************/

    ## Routing rules of module
    public static function returnRoutes($prefix = null) {

        /**
         * Здесь нужно кешировать города, направления, типы курсов, партнеры, клиенты
         * Загружаем из БД - сохраняем в кеше на 10 минут например
         * При сохранении этих сущностей - сбрасывать кеш (в настройках словарей)
         * dic.city, dic.direction, dic.type, dic.partners, dic.clients и т.д.
         *
         * Ниже идет получение города юзера из БД - заменить на получение из кеша
         */
        $dics_for_cache = ['city', 'direction', 'type', 'course', 'teachers', 'stories', 'partners', 'clients', 'professions', 'students_work', 'reviews', 'cases', 'workers'];
        foreach ($dics_for_cache as $dic_name) {

            ## Refresh dics cache
            #Cache::forget('dic_' . $dic_name);

            $dic_{$dic_name} = Cache::get('dic_' . $dic_name);
            if (!$dic_{$dic_name}) {
                Cache::forget('dic_' . $dic_name);
                $dic_{$dic_name} = Dic::valuesBySlug($dic_name, null, ['fields', 'textfields', 'related_dicvals'], true, true, true);
                $dic_{$dic_name} = DicLib::loadImages($dic_{$dic_name}, ['avatar', 'image', 'logo', 'photo', 'header_img']);
                Cache::add('dic_' . $dic_name, $dic_{$dic_name}, self::$global_cache_min);
            }
            View::share('dic_' . $dic_name, $dic_{$dic_name});

            #Helper::d($dic_name); Helper::ta($dic_{$dic_name});
        }
        #Helper::tad($dic_{'city'});
        #die;


        /**
         * Определяем город юзера, если есть пометка в COOKIES. Иначе - Москва (id из конфига).
         * Предзагружаем из сессии, кешируем в сессию, делаем глобальным для шаблонизатора.
         */
        $dic_city = $dic_{'city'};
        #Helper::tad($dic_city);

        $refresh_city = false;
        #$refresh_city = true;
        $user_city_cache_key = self::$user_city_cache_key;
        $user_city_cache_min = self::$user_city_cache_min;
        if ($refresh_city)
            Session::forget($user_city_cache_key);
        $city = @$dic_city[Session::get($user_city_cache_key)];
        #Helper::tad($city);
        if (!$city || $refresh_city) {
            Session::forget($user_city_cache_key);
            if (isset($_COOKIE['city_id']) && is_numeric($_COOKIE['city_id'])) {
                $city = @$dic_city[$_COOKIE['city_id']];
            }
            if (!$city || $refresh_city) {
                $city = @$dic_city[Config::get('site.default_city_id')];
            }
            Session::set($user_city_cache_key, $city->id);
        }
        #Helper::tad($city);
        #die;
        View::share($user_city_cache_key, $city);
        View::share($user_city_cache_key . '_slug', $city->slug);


        /**
         * Общие роуты
         */
        Route::group(array(), function() {

            #Route::any('/ajax/send-message', array('as' => 'ajax.send-message', 'uses' => __CLASS__.'@postSendMessage'));
            Route::any('/ajax/change_city', array('as' => 'ajax.change_city', 'uses' => __CLASS__.'@ajaxChangeCity'));
            Route::any('/ajax/get_courses', array('as' => 'ajax.get_courses', 'uses' => __CLASS__.'@ajaxGetCourses'));

            Route::any('/ajax/form_question', array('as' => 'app.form_question', 'uses' => __CLASS__.'@formQuestion'));
            Route::any('/ajax/form_course_register', array('as' => 'app.form_course_register', 'uses' => __CLASS__.'@formCourseRegister'));
            Route::any('/ajax/form_corp', array('as' => 'app.form_corp', 'uses' => __CLASS__.'@formCorp'));
            Route::any('/ajax/form_subscribe', array('as' => 'app.form_subscribe', 'uses' => __CLASS__.'@formSubscribe'));
            Route::any('/ajax/form_course', array('as' => 'app.form_course', 'uses' => __CLASS__.'@formCourse'));
        });
    }


    /****************************************************************************/


	public function __construct(){
        #
	}


    /**
     * Форма производльного вопроса
     * На всех страницах в футере
     * Email зависит от города
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function formQuestion() {

        #if (!Request::ajax())
        #    App::abort(404);

        $json_request = ['status' => FALSE, 'responseText' => ''];
        $data = Input::all();

        $city = View::shared('dic_city');
        $city = @$city[$data['city_id']];
        #Helper::tad($city);
        if (!is_object($city) || null == ($emails = $city->email_question)) {
            $json_request['errorText'] = 'City with id=' . $data['city_id'] . ' not found, or e-mail is nulled';
            return Response::json($json_request, 200);
        }
        $data['to'] = $emails;

        $tpl = 'emails.question';
        if (View::exists($tpl)) {

            Mail::send($tpl, $data, function ($message) use ($data) {
                #$message->from(Config::get('mail.from.address'), Config::get('mail.from.name'));

                $from_email = Config::get('app.settings.main.feedback_from_email') ?: 'no@reply.ru';
                $from_name = Config::get('app.settings.main.feedback_from_name') ?: 'No-reply';

                $message->from($from_email, $from_name);
                $message->subject('Вопрос с сайта');

                #$email = Config::get('app.settings.main.feedback_address') ?: 'dev@null.ru';
                $email = $data['to'];
                $emails = array();
                if (strpos($email, ',')) {
                    $emails = explode(',', $email);
                    foreach ($emails as $e => $email) {
                        $email = trim($email);
                        if (filter_var($email, FILTER_VALIDATE_EMAIL))
                            $emails[$e] = $email;
                    }
                    $email = array_shift($emails);
                }

                $message->to($email);

                #$ccs = Config::get('mail.feedback.cc');
                $ccs = $emails;
                if (isset($ccs) && is_array($ccs) && count($ccs))
                    foreach ($ccs as $cc)
                        $message->cc($cc);

                /**
                 * Прикрепляем файл
                 */
                /*
                if (Input::hasFile('file') && ($file = Input::file('file')) !== NULL) {
                    #Helper::dd($file->getPathname() . ' / ' . $file->getClientOriginalName() . ' / ' . $file->getClientMimeType());
                    $message->attach($file->getPathname(), array('as' => $file->getClientOriginalName(), 'mime' => $file->getClientMimeType()));
                }
                #*/

            });
            $json_request['status'] = TRUE;

        } else {

            $json_request['responseText'] = 'Template ' . $tpl . ' not found.';
        }

        #Helper::dd($result);
        return Response::json($json_request, 200);
    }


    /**
     * Форма записи на произвольный курс
     * http://ikra.dev/city/msk/courses
     * Email зависит от города
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function formCourseRegister() {

        #if (!Request::ajax())
        #    App::abort(404);

        $json_request = ['status' => FALSE, 'responseText' => ''];
        $data = Input::all();

        #$city = View::shared('dic_city');
        #$city = @$city[$data['city_id']];
        $city = View::shared('current_city');
        #Helper::tad($city);
        if (!is_object($city) || null == ($emails = $city->email_course_register)) {
            $json_request['errorText'] = 'Current city not found, or e-mail is nulled';
            return Response::json($json_request, 200);
        }
        $data['to'] = $emails;

        $tpl = 'emails.course_register';
        if (View::exists($tpl)) {

            Mail::send($tpl, $data, function ($message) use ($data) {
                #$message->from(Config::get('mail.from.address'), Config::get('mail.from.name'));

                $from_email = Config::get('app.settings.main.feedback_from_email') ?: 'no@reply.ru';
                $from_name = Config::get('app.settings.main.feedback_from_name') ?: 'No-reply';

                $message->from($from_email, $from_name);
                $message->subject('Заявка с сайта - запрос курса');

                #$email = Config::get('app.settings.main.feedback_address') ?: 'dev@null.ru';
                $email = $data['to'];
                $emails = array();
                if (strpos($email, ',')) {
                    $emails = explode(',', $email);
                    foreach ($emails as $e => $email) {
                        $email = trim($email);
                        if (filter_var($email, FILTER_VALIDATE_EMAIL))
                            $emails[$e] = $email;
                    }
                    $email = array_shift($emails);
                }

                $message->to($email);

                #$ccs = Config::get('mail.feedback.cc');
                $ccs = $emails;
                if (isset($ccs) && is_array($ccs) && count($ccs))
                    foreach ($ccs as $cc)
                        $message->cc($cc);

                /**
                 * Прикрепляем файл
                 */
                /*
                if (Input::hasFile('file') && ($file = Input::file('file')) !== NULL) {
                    #Helper::dd($file->getPathname() . ' / ' . $file->getClientOriginalName() . ' / ' . $file->getClientMimeType());
                    $message->attach($file->getPathname(), array('as' => $file->getClientOriginalName(), 'mime' => $file->getClientMimeType()));
                }
                #*/

            });
            $json_request['status'] = TRUE;

        } else {

            $json_request['responseText'] = 'Template ' . $tpl . ' not found.';
        }

        #Helper::dd($result);
        return Response::json($json_request, 200);
    }


    /**
     * Форма записи на корпоративной странице
     * http://ikra.dev/corp
     * Email НЕ зависит от города - берется из настроек
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function formCorp() {

        #if (!Request::ajax())
        #    App::abort(404);

        $json_request = ['status' => FALSE, 'responseText' => ''];
        $data = Input::all();

        #$city = View::shared('dic_city');
        #$city = @$city[$data['city_id']];
        #$city = View::shared('current_city');
        #Helper::tad($city);
        #if (!is_object($city) || null == ($emails = $city->email_question)) {
        if (null == ($emails = Config::get('app.settings.main.feedback_address_corp'))) {
            $json_request['errorText'] = 'E-mail is nulled';
            return Response::json($json_request, 200);
        }
        $data['to'] = $emails;

        $tpl = 'emails.corp';
        if (View::exists($tpl)) {

            Mail::send($tpl, $data, function ($message) use ($data) {
                #$message->from(Config::get('mail.from.address'), Config::get('mail.from.name'));

                $from_email = Config::get('app.settings.main.feedback_from_email') ?: 'no@reply.ru';
                $from_name = Config::get('app.settings.main.feedback_from_name') ?: 'No-reply';

                $message->from($from_email, $from_name);
                $message->subject('Заявка с сайта - корпоративная');

                #$email = Config::get('app.settings.main.feedback_address') ?: 'dev@null.ru';
                $email = $data['to'];
                $emails = array();
                if (strpos($email, ',')) {
                    $emails = explode(',', $email);
                    foreach ($emails as $e => $email) {
                        $email = trim($email);
                        if (filter_var($email, FILTER_VALIDATE_EMAIL))
                            $emails[$e] = $email;
                    }
                    $email = array_shift($emails);
                }

                $message->to($email);

                #$ccs = Config::get('mail.feedback.cc');
                $ccs = $emails;
                if (isset($ccs) && is_array($ccs) && count($ccs))
                    foreach ($ccs as $cc)
                        $message->cc($cc);

                /**
                 * Прикрепляем файл
                 */
                /*
                if (Input::hasFile('file') && ($file = Input::file('file')) !== NULL) {
                    #Helper::dd($file->getPathname() . ' / ' . $file->getClientOriginalName() . ' / ' . $file->getClientMimeType());
                    $message->attach($file->getPathname(), array('as' => $file->getClientOriginalName(), 'mime' => $file->getClientMimeType()));
                }
                #*/

            });
            $json_request['status'] = TRUE;

        } else {

            $json_request['responseText'] = 'Template ' . $tpl . ' not found.';
        }

        #Helper::dd($result);
        return Response::json($json_request, 200);
    }


    /**
     * Форма подписки
     * На всех страницах в меню
     * Email сохраняется в БД
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function formSubscribe() {

        #if (!Request::ajax())
        #    App::abort(404);

        $json_request = ['status' => FALSE, 'responseText' => ''];
        #$data = Input::all();
        $email = Input::get('email');

        ## Check email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $json_request['errorText'] = 'Bad email';
            return Response::json($json_request, 200);
        }

        ## Find exist records
        $city = View::shared('current_city');
        $record = Dic::valuesBySlug('subscribes', function($query) use ($email, $city) {
            $query->where('name', $email);
            $query->filter_by_field('city_id', '=', $city->id);
        }, [], true, true, false);
        #Helper::tad($record);
        if (count($record) >= 1) {
            $json_request['status'] = true;
            $json_request['also'] = true;
            $json_request['responseText'] = 'Email also in DB';
            return Response::json($json_request, 200);
        }

        ## Create record
        $temp = DicVal::inject('subscribes', array(
            'slug' => NULL,
            'name' => $email,
            'fields' => array(
                'city_id' => $city->id,
            ),
        ));

        $json_request['status'] = TRUE;

        #Helper::dd($result);
        return Response::json($json_request, 200);
    }


    /**
     * Форма записи на курс
     * http://ikra.dev/city/msk/courses/18
     * + Сохраняется в БД
     * - Отправляется на почту
     * - Отправляется в битрикс24
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function formCourse() {

        #if (!Request::ajax())
        #    App::abort(404);

        $json_request = ['status' => FALSE, 'responseText' => ''];
        $data = Input::all();

        #$city = View::shared('dic_city');
        #$city = @$city[$data['city_id']];
        $city = View::shared('current_city');
        #Helper::tad($city);
        if (!is_object($city) || null == ($emails = $city->email_course)) {
            $json_request['errorText'] = 'Current city not found, or e-mail is nulled';
            return Response::json($json_request, 200);
        }
        $data['city'] = $city;
        $data['to'] = $emails;

        ## Find course
        $course = Dic::valueBySlugAndId('course', @$data['course_id'], 'all', true, true, true);
        #Helper::tad($course);
        if (!is_object($course)) {
            $json_request['errorText'] = 'Course not found';
            return Response::json($json_request, 200);
        }
        $data['course'] = $course;

        ## Find exist records - by email & course_id
        $record = Dic::valuesBySlug('leads', function($query) use ($data) {
            $query->filter_by_field('email', '=', $data['email']);
            $query->filter_by_field('course_id', '=', $data['course_id']);
        }, ['fields'], true, true, false);
        #Helper::tad($record);
        if (count($record) >= 1) {
            $json_request['status'] = true;
            $json_request['also'] = true;
            $json_request['responseText'] = 'Email also in DB';
            return Response::json($json_request, 200);
        }

        ## Create lead in bitrix24
        $answer = file_get_contents(
            'https://ikrafamily.bitrix24.ru/crm/configs/import/lead.php?'
                . '&LOGIN=' . Config::get('app.settings.main.bitrix24_login')
                . '&PASSWORD=' . Config::get('app.settings.main.bitrix24_pass')
                . '&TITLE=' . @$data['name'] . ' - ' . $data['email']
                . '&NAME=' . @$data['name']
                . '&EMAIL_HOME=' . @$data['email']
                . '&PHONE_MOBILE=' . @$data['phone']
                . '&UF_CRM_1429722925=' . $course->name . ' (' . $city->name . ')'
        );
        #Helper::tad($answer);

        ## Create record
        $temp = DicVal::inject('leads', array(
            'slug' => NULL,
            'name' => @$data['name'],
            'fields' => array(
                'city_id' => $city->id,
                'course_id' => @$data['course_id'],
                'email' => @$data['email'],
                'phone' => @$data['phone'],
            ),
        ));

        ## Send email
        $tpl = 'emails.lead';
        if (View::exists($tpl)) {

            Mail::send($tpl, $data, function ($message) use ($data) {
                #$message->from(Config::get('mail.from.address'), Config::get('mail.from.name'));

                $from_email = Config::get('app.settings.main.feedback_from_email') ?: 'no@reply.ru';
                $from_name = Config::get('app.settings.main.feedback_from_name') ?: 'No-reply';

                $message->from($from_email, $from_name);
                $message->subject('Заявка с сайта - запись на курс');

                #$email = Config::get('app.settings.main.feedback_address') ?: 'dev@null.ru';
                $email = $data['to'];
                $emails = array();
                if (strpos($email, ',')) {
                    $emails = explode(',', $email);
                    foreach ($emails as $e => $email) {
                        $email = trim($email);
                        if (filter_var($email, FILTER_VALIDATE_EMAIL))
                            $emails[$e] = $email;
                    }
                    $email = array_shift($emails);
                }

                $message->to($email);

                #$ccs = Config::get('mail.feedback.cc');
                $ccs = $emails;
                if (isset($ccs) && is_array($ccs) && count($ccs))
                    foreach ($ccs as $cc)
                        $message->cc($cc);

                /**
                 * Прикрепляем файл
                 */
                /*
                if (Input::hasFile('file') && ($file = Input::file('file')) !== NULL) {
                    #Helper::dd($file->getPathname() . ' / ' . $file->getClientOriginalName() . ' / ' . $file->getClientMimeType());
                    $message->attach($file->getPathname(), array('as' => $file->getClientOriginalName(), 'mime' => $file->getClientMimeType()));
                }
                #*/

            });
            $json_request['status'] = TRUE;

        } else {

            $json_request['responseText'] = 'Template ' . $tpl . ' not found.';
        }

        $json_request['status'] = TRUE;

        #Helper::dd($result);
        return Response::json($json_request, 200);
    }


    public function postSendMessage() {

        if (!Request::ajax())
            App::abort(404);

        $json_request = ['status' => FALSE, 'responseText' => ''];
        $data = Input::all();

        $tpl = 'emails.feedback';
        if (View::exists($tpl)) {

            Mail::send($tpl, $data, function ($message) use ($data) {
                #$message->from(Config::get('mail.from.address'), Config::get('mail.from.name'));

                $from_email = Config::get('app.settings.main.feedback_from_email') ?: 'no@reply.ru';
                $from_name = Config::get('app.settings.main.feedback_from_name') ?: 'No-reply';

                $message->from($from_email, $from_name);
                $message->subject('Сообщение обратной связи');

                $email = Config::get('app.settings.main.feedback_address') ?: 'dev@null.ru';
                $emails = array();
                if (strpos($email, ',')) {
                    $emails = explode(',', $email);
                    foreach ($emails as $e => $email) {
                        $email = trim($email);
                        if (filter_var($email, FILTER_VALIDATE_EMAIL))
                            $emails[$e] = $email;
                    }
                    $email = array_shift($emails);
                }

                $message->to($email);

                #$ccs = Config::get('mail.feedback.cc');
                $ccs = $emails;
                if (isset($ccs) && is_array($ccs) && count($ccs))
                    foreach ($ccs as $cc)
                        $message->cc($cc);

                /**
                 * Прикрепляем файл
                 */
                /*
                if (Input::hasFile('file') && ($file = Input::file('file')) !== NULL) {
                    #Helper::dd($file->getPathname() . ' / ' . $file->getClientOriginalName() . ' / ' . $file->getClientMimeType());
                    $message->attach($file->getPathname(), array('as' => $file->getClientOriginalName(), 'mime' => $file->getClientMimeType()));
                }
                #*/

            });
            $json_request['status'] = TRUE;

        } else {

            $json_request['responseText'] = 'Template ' . $tpl . ' not found.';
        }

        #Helper::dd($result);
        return Response::json($json_request, 200);
    }


    ###########################################################################


    public function appCity() {

        #dd(func_get_args());
        $city = $this->getCity(func_get_args());
        Helper::ta($city);
    }


    ###########################################################################


    public function appCourses() {

        #dd(func_get_args());
        $city = $this->getCity(func_get_args());
        Helper::ta($city);
    }

    public function appCourse() {

        #dd(func_get_args());
        $city = $this->getCity(func_get_args());
        $id   = $this->getId(func_get_args());
        Helper::ta($city);
        Helper::dd($id);
    }


    ###########################################################################


    public function appStories() {

        $city = $this->getCity(func_get_args());
        Helper::ta($city);
    }

    public function appStory() {

        $city = $this->getCity(func_get_args());
        $id   = $this->getId(func_get_args());
        Helper::ta($city);
        Helper::dd($id);
    }


    ###########################################################################


    public function appTeachers() {

        $city = $this->getCity(func_get_args());
        Helper::ta($city);
    }

    public function appTeacher() {

        $city = $this->getCity(func_get_args());
        $id   = $this->getId(func_get_args());
        Helper::ta($city);
        Helper::dd($id);
    }


    ###########################################################################


    private function getCity($args) {

        $city = $city_slug = null;

        #dd($args);

        $direct_route = false;
        $route = Route::current();
        if (is_object($route)) {
            $route_name = $route->getName();
            if (strpos($route_name, '_direct'))
                $direct_route = true;
        }
        #dd($direct_route);

        if (count($args) == 2) {
            $city_slug = $args[0];
        } elseif (count($args) == 1 || count($args) == 0) {
            /**
             * Вот тут костылек: первым параметром может являться как slug города, так и id сущности.
             * В зависимости от того, генерится ли ссылка на сущность в дефолтном городе или нет.
             * Выход - именовать все прямые роуты (с явным указанием города) по маске: *_direct.
             * И проверять текущий роут - прямой он или нет.
             */
            if ($direct_route) {
                $city_slug = $args[0];
            } else {
                $city = Session::get(self::$user_city_cache_key);
                #Helper::tad($city);
                $city_slug = $city->slug;
            }
        }

        if (is_object($city)) {
            return $city;
        }

        #dd($city_slug);
        if ($city_slug) {
            $city = Dic::valueBySlugs('city', $city_slug, ['fields']);
        }
        #Helper::tad($city);

        return $city;
    }

    private function getId($args) {

        $id = null;

        if (count($args) == 2) {
            $id = $args[1];
        } elseif (count($args) == 1) {
            $id = $args[0];
        }

        return $id;
    }


    ###########################################################################


    public function ajaxGetCourses() {

        $city_id = Input::get('city');
        $direction_id = Input::get('direction');

        $response = ['status' => false, 'errorText' => ''];

        $courses = Dic::valuesBySlug('course', function($query) use ($city_id, $direction_id) {
            $query->filter_by_field('city_id', '=', $city_id);
            if ($direction_id > 0)
                $query->filter_by_field('direction_id', '=', $direction_id);
        }, ['fields', 'textfields'], true, true, true);

        $response['status'] = true;
        $response['list'] = $courses;

        return Response::json($response);
    }


    ###########################################################################



    public function ajaxChangeCity() {

        $city_id = Input::get('city_id');

        $response = ['status' => false, 'errorText' => ''];

        $user_city_cache_key = self::$user_city_cache_key;
        $user_city_cache_min = self::$user_city_cache_min;
        if (is_numeric($city_id)) {
            $city = Dic::valueBySlugAndId('city', $city_id, 'all');
            if (is_object($city) && $city->id) {
                Session::set($user_city_cache_key, $city->id);
                setcookie('change_city', true, time()+60*$user_city_cache_min, '/');
                $response['status'] = true;
                $response['session'] = Session::all();
            } else {
                $response['errorText'] = 'wrong city_id';
            }
        } else {
            $response['errorText'] = 'bad city_id';
        }

        return Response::json($response);
    }

}
