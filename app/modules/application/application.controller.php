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
        $dics_for_cache = ['city', 'direction', 'type', 'course', 'teachers', 'stories', 'partners', 'clients', 'professions', 'students_work', 'reviews'];
        foreach ($dics_for_cache as $dic_name) {

            ## Refresh dics cache
            #Cache::forget('dic_' . $dic_name);

            $dic_{$dic_name} = Cache::get('dic_' . $dic_name);
            if (!$dic_{$dic_name}) {
                Cache::forget('dic_' . $dic_name);
                $dic_{$dic_name} = Dic::valuesBySlug($dic_name, null, ['fields', 'textfields'], true, true, true);
                $dic_{$dic_name} = DicLib::loadImages($dic_{$dic_name}, ['avatar', 'image', 'logo', 'photo']);
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
        $refresh_city = false;
        $refresh_city = true;
        $user_city_cache_key = self::$user_city_cache_key;
        $user_city_cache_min = self::$user_city_cache_min;
        $city = Session::get($user_city_cache_key);
        if ($refresh_city)
            Session::forget($user_city_cache_key);
        #Helper::tad($city);
        #var_dump($city);
        #Session::forget($user_city_cache_key); die;
        if (!$city || $refresh_city) {
            Session::forget($user_city_cache_key);
            if (isset($_COOKIE['city_id']) && is_numeric($_COOKIE['city_id'])) {
                #$city = Dic::valueBySlugAndId('city', $_COOKIE['city_id'], []);
                $city = @$dic_city[$_COOKIE['city_id']];
            }
            #var_dump($city);
            if (!$city || $refresh_city) {
                #$city = @$dic_city[$_COOKIE['city_id']];
                $city = @$dic_city[Config::get('site.default_city_id')];
            }
            #var_dump($city);
            #Helper::tad($city);
            Session::set($user_city_cache_key, $city);
        }
        #var_dump($city);
        #Helper::tad($dic_city);
        #Helper::tad($city);
        #die;
        View::share($user_city_cache_key, $city);
        View::share($user_city_cache_key . '_slug', $city->slug);


        /**
         * Роуты, контент которых зависит от текущего города
         */
        Route::group(array('prefix' => 'city/' . $city->slug), function() {

            #Route::any('/', array('as' => 'app.city', 'uses' => __CLASS__.'@appCity'));

            #Route::any('/courses', array('as' => 'app.courses', 'uses' => __CLASS__.'@appCourses'));
            #Route::any('/courses/{id}', array('as' => 'app.course', 'uses' => __CLASS__.'@appCourse'));

            #Route::any('/teachers', array('as' => 'app.teachers', 'uses' => __CLASS__.'@appTeachers'));
            #Route::any('/teachers/{id}', array('as' => 'app.teacher', 'uses' => __CLASS__.'@appTeacher'));

            Route::any('/story', array('as' => 'app.stories', 'uses' => __CLASS__.'@appStories'));
            Route::any('/story/{id}', array('as' => 'app.story', 'uses' => __CLASS__.'@appStory'));
        });


        Route::group(array('prefix' => 'city'), function() {

            #Route::any('/{city_slug}', array('as' => 'app.city_direct', 'uses' => __CLASS__.'@appCity'));

            #Route::any('/{city_slug}/courses', array('as' => 'app.courses_direct', 'uses' => __CLASS__.'@appCourses'));
            #Route::any('/{city_slug}/courses/{id}', array('as' => 'app.course_direct', 'uses' => __CLASS__.'@appCourse'));

            #Route::any('/{city_slug}/teachers', array('as' => 'app.teachers_direct', 'uses' => __CLASS__.'@appTeachers'));
            #Route::any('/{city_slug}/teachers/{id}', array('as' => 'app.teacher_direct', 'uses' => __CLASS__.'@appTeacher'));

            Route::any('/{city_slug}/story', array('as' => 'app.stories_direct', 'uses' => __CLASS__.'@appStories'));
            Route::any('/{city_slug}/story/{id}', array('as' => 'app.story_direct', 'uses' => __CLASS__.'@appStory'));
        });

        /**
         * Общие роуты
         */
        Route::group(array(), function() {

            #Route::any('/ajax/send-message', array('as' => 'ajax.send-message', 'uses' => __CLASS__.'@postSendMessage'));
            Route::any('/ajax/change_city', array('as' => 'ajax.change_city', 'uses' => __CLASS__.'@ajaxChangeCity'));
            Route::any('/ajax/get_courses', array('as' => 'ajax.get_courses', 'uses' => __CLASS__.'@ajaxGetCourses'));
        });
    }


    /****************************************************************************/


	public function __construct(){
        #
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
            $city = Dic::valueBySlugAndId('city', $city_id, []);
            if (is_object($city) && $city->id) {
                Session::set($user_city_cache_key, $city);
                setcookie('change_city', true, time()+60*$user_city_cache_min, '/');
                $response['status'] = true;
            } else {
                $response['errorText'] = 'wrong city_id';
            }
        } else {
            $response['errorText'] = 'bad city_id';
        }

        return Response::json($response);
    }

}