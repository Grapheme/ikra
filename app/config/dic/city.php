<?php

return array(

    'fields' => function($dicval) {

        return array(
            'dp' => array(
                'title' => 'Предложный падеж (например: Москве)',
                'type' => 'text',
            ),
            'name_mini' => array(
                'title' => 'Краткое название (Москва, Спб, Екб)',
                'type' => 'text',
            ),
            'important' => array(
                'no_label' => true,
                'title' => 'Важный город (будет выводиться в футере с контактами)',
                'type' => 'checkbox',
                'label_class' => 'normal_checkbox',
            ),

            'address' => array(
                'title' => 'Адрес',
                'type' => 'text',
            ),
            ## КАРТА ДЛЯ ГЕОКОДИНГА
            'map' => array(
                'type' => 'custom',
                'content' => View::make('system.views.map_google_block', [
                    'element' => $dicval,

                    #'map_id' => 'map',
                    #'map_style' => 'height:300px;',
                ])->render(),
                'scripts' => View::make('system.views.map_google_script', [
                    'element' => $dicval,

                    #'map_id' => 'map',
                    #'map_type' => 'google.maps.MapTypeId.ROADMAP',
                    #'field_address' => 'address',
                    #'field_lat' => 'lat',
                    #'field_lng' => 'lng',
                    #'keyup_timer' => 1200,

                    'geo_prefix' => '"Россия, " + $("input[name=name]").val() + ", "',
                    'default_lat' => '47.25221300',
                    'default_lng' => '39.69359700',
                    'default_zoom' => '11',
                ])->render(),
            ),
            'lat' => array(
                'title' => 'Широта',
                'type' => 'text',
            ),
            'lng' => array(
                'title' => 'Долгота',
                'type' => 'text',
            ),

            'how2get_text' => array(
                'title' => 'Как добраться - текст',
                'type' => 'textarea',
            ),
            'how2get_way_1' => array(
                'title' => 'Как добраться - способ 1',
                'type' => 'textarea',
            ),
            'how2get_way_2' => array(
                'title' => 'Как добраться - способ 2',
                'type' => 'textarea',
            ),
            'how2get_way_3' => array(
                'title' => 'Как добраться - способ 3',
                'type' => 'textarea',
                #'others' => [
                #    'class' => 'redactor_150',
                #],
            ),

            'header_img' => array(
                'title' => 'Изображение в шапке (на странице контактов)',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 4, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),

            '-1' => array(
                'type' => 'custom',
                'content' => '<br/>',
            ),

            'manager_1_fio' => array(
                'title' => 'Менеджер 1 - Имя Фамилия',
                'type' => 'text',
            ),
            'manager_1_position' => array(
                'title' => 'Менеджер 1 - должность',
                'type' => 'text',
            ),
            'manager_1_phone' => array(
                'title' => 'Менеджер 1 - телефон',
                'type' => 'text',
            ),
            'manager_1_email' => array(
                'title' => 'Менеджер 1 - e-mail',
                'type' => 'text',
            ),

            '-2' => array(
                'type' => 'custom',
                'content' => '<br/>',
            ),

            'manager_2_fio' => array(
                'title' => 'Менеджер 2 - Имя Фамилия',
                'type' => 'text',
            ),
            'manager_2_position' => array(
                'title' => 'Менеджер 2 - должность',
                'type' => 'text',
            ),
            'manager_2_phone' => array(
                'title' => 'Менеджер 2 - телефон',
                'type' => 'text',
            ),
            'manager_2_email' => array(
                'title' => 'Менеджер 2 - e-mail',
                'type' => 'text',
            ),

            '-3' => array(
                'type' => 'custom',
                'content' => '<br/>',
            ),

            'manager_3_fio' => array(
                'title' => 'Менеджер 3 - Имя Фамилия',
                'type' => 'text',
            ),
            'manager_3_position' => array(
                'title' => 'Менеджер 3 - должность',
                'type' => 'text',
            ),
            'manager_3_phone' => array(
                'title' => 'Менеджер 3 - телефон',
                'type' => 'text',
            ),
            'manager_3_email' => array(
                'title' => 'Менеджер 3 - e-mail',
                'type' => 'text',
            ),

            '-4' => array(
                'type' => 'custom',
                'content' => '<br/>',
            ),

            'comment' => array(
                'title' => 'Комментарий',
                'type' => 'textarea',
                'others' => [
                    'placeholder' => 'Например: С РАДОСТЬЮ ОТВЕЧАЕМ С 11:00 ДО 20:00 В БУДНИЕ ДНИ',
                ],
            ),

            'fb_link' => array(
                'title' => 'Facebook',
                'type' => 'text',
                'others' => [
                    'placeholder' => 'http://',
                ],
            ),
            'vk_link' => array(
                'title' => 'VKontakte',
                'type' => 'text',
                'others' => [
                    'placeholder' => 'http://',
                ],
            ),
            'ig_link' => array(
                'title' => 'Instagram',
                'type' => 'text',
                'others' => [
                    'placeholder' => 'http://',
                ],
            ),
            'tw_link' => array(
                'title' => 'Twitter',
                'type' => 'text',
                'others' => [
                    'placeholder' => 'http://',
                ],
            ),
            'yt_link' => array(
                'title' => 'YouTube',
                'type' => 'text',
                'others' => [
                    'placeholder' => 'http://',
                ],
            ),

            'email_question' => array(
                'title' => 'E-mail адреса для отправки вопросов (через запятую)',
                'type' => 'text',
            ),
            'email_course_register' => array(
                'title' => 'E-mail адреса для отправки запросов на обучение по курсу (через запятую)',
                'type' => 'text',
            ),
            'email_course' => array(
                'title' => 'E-mail адреса для отправки подтверждений о новой заявке на курс (битрикс24)',
                'type' => 'text',
            ),
        );
    },


    /**
     * ACTIONS - дополнительные элементы в столбце "Действия", на странице списка записей словаря.
     * Внутри данной функции не должно производиться запросов к БД!
     * Все запросы следует выносить в хуки (описание хуков ниже).
     */
    'actions' => function($dic, $dicval) {

        /**
         * Получаем данные, которые были созданы с помощью хука before_index_view (описание ниже).
         */
        $dics = Config::get('temp.index_dics');
        $dic_workers = $dics['workers'];
        $counts = Config::get('temp.index_counts');

        /**
         * Возвращаем доп. элементы в столбец "Действия": кнопки со ссылками и счетчиками, индивидуальны для каждой записи
         */
        return '
            <span class="block_ margin-bottom-5_">
                <a href="' . URL::route('entity.index', array('workers', 'filter[fields][city_id]' => $dicval->id)) . '" class="btn btn-default">
                    Сотрудники (' . @(int)$counts[$dicval->id][$dic_workers->id]. ')
                </a>
            </span>
        ';
    },


    /**
     * HOOKS - набор функций-замыканий, которые вызываются в некоторых местах кода модуля словарей, для выполнения нужных действий.
     */
    'hooks' => array(

        /**
         * Вызывается в методе index, перед выводом данных в представление (вьюшку).
         * На этом этапе уже известны все элементы, которые будут отображены на странице.
         */
        'before_index_view' => function ($dic, $dicvals) {
            /**
             * Предзагружаем нужные словари
             */
            $dics_slugs = array(
                'workers',
            );
            $dics = Dic::whereIn('slug', $dics_slugs)->with('values_no_conditions')->get();
            $dics = Dic::modifyKeys($dics, 'slug');
            #Helper::tad($dics);
            Config::set('temp.index_dics', $dics);

            ## Получаем список с нужными индексами
            #$workers = Dic::makeLists($dics['workers']['values_no_conditions'], null, 'name', 'id');
            ##Helper::tad($workers);
            #Config::set('temp.workers', $workers);

            /**
             * Создаем списки из полученных данных
             */
            $dic_ids = Dic::makeLists($dics, false, 'id');
            #Helper::d($dic_ids);
            $dicval_ids = Dic::makeLists($dicvals, false, 'id');
            #Helper::dd($dicval_ids);

            /**
             * Получаем количество необходимых нам данных, одним SQL-запросом.
             * Сохраняем данные в конфиг - для дальнейшего использования в функции-замыкании actions (см. выше).
             */
            $counts = array();
            if (count($dic_ids) && count($dicval_ids))
                $counts = DicVal::counts_by_fields($dic_ids, array('city_id' => $dicval_ids));
            #Helper::dd($counts);
            Config::set('temp.index_counts', $counts);
        },

        /**
         * Вызывается после создания, обновления, удаления записи, изменения порядка сортировки
         */
        'after_store_update_destroy_order' => function ($dic = NULL, $dicval = NULL) {

            Cache::forget('dic_' . $dic->slug);
        },
    ),


    /*
    'second_line_modifier' => function($line, $dic, $dicval) {
        #Helper::ta($dicval);
        return (isset($dicval->answer) && $dicval->answer ? strip_tags($dicval->answer) : '');
    },
    */

    'seo' => ['title', 'description', 'keywords'],
);