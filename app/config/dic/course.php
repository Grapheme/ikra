<?php

return array(

    'fields' => function() {

        /**
         * Предзагружаем нужные словари с данными, по системному имени словаря, для дальнейшего использования.
         * Делается это одним SQL-запросом, для снижения нагрузки на сервер БД.
         */
        $dics_slugs = array(
            'city',
            'type',
            'direction',
            'teachers',
        );
        $dics = Dic::whereIn('slug', $dics_slugs)->with('values')->get();
        $dics = Dic::modifyKeys($dics, 'slug');
        #Helper::tad($dics);
        $lists = Dic::makeLists($dics, 'values', 'name', 'id');
        #Helper::dd($lists);
        $lists_ids = Dic::makeLists($dics, null, 'id', 'slug');
        #Helper::dd($lists_ids);

        #asort($lists['city']);
        asort($lists['teachers']);

        return array(

            'city_id' => array(
                'title' => 'Город',
                'type' => 'select',
                'values' => $lists['city'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.city_id') ?: null,
            ),

            'type_id' => array(
                'title' => 'Тип курса',
                'type' => 'select',
                'values' => $lists['type'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.type_id') ?: null,
            ),

            'direction_id' => array(
                'title' => 'Направление курса',
                'type' => 'select',
                'values' => $lists['direction'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.direction_id') ?: null,
            ),

            'date_start' => array(
                'title' => 'Дата начала',
                'type' => 'date',
                'others' => array(
                    'class' => 'text-center',
                    'style' => 'width: 221px',
                    'placeholder' => 'Нажмите для выбора'
                ),
                'handler' => function($value) {
                    return $value ? @date('Y-m-d', strtotime($value)) : $value;
                },
                'value_modifier' => function($value) {
                    return $value ? date('d.m.Y', strtotime($value)) : date('d.m.Y');
                },
            ),
            'date_stop' => array(
                'title' => 'Дата окончания',
                'type' => 'date',
                'others' => array(
                    'class' => 'text-center',
                    'style' => 'width: 221px',
                    'placeholder' => 'Нажмите для выбора'
                ),
                'handler' => function($value) {
                    return $value ? @date('Y-m-d', strtotime($value)) : $value;
                },
                'value_modifier' => function($value) {
                    return $value ? date('d.m.Y', strtotime($value)) : date('d.m.Y');
                },
            ),
            'weekdays' => array(
                'title' => 'Дни недели',
                'type' => 'text',
            ),

            'price' => array(
                'title' => 'Стоимость',
                'type' => 'text',
            ),
            'discounts' => array(
                'title' => 'Возможные скидки',
                'type' => 'textarea_redactor',
            ),

            'short' => array(
                'title' => 'Краткое описание',
                'type' => 'textarea',
            ),

            'teacher_id' => array(
                'title' => 'Куратор курса',
                'type' => 'select',
                'values' => $lists['teachers'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.teacher_id') ?: null,
            ),
            'blockquote' => array(
                'title' => 'Цитата куратора',
                'type' => 'textarea',
            ),

            'for_who' => array(
                'title' => 'Для кого',
                'type' => 'textarea',
            ),
            'result' => array(
                'title' => 'Что в итоге',
                'type' => 'textarea',
            ),

            'worktime' => array(
                'title' => 'Время занятий',
                'type' => 'textarea',
            ),
        );
    },


    /**
     * MENUS - дополнительные пункты верхнего меню, под названием словаря.
     */
    'menus' => function($dic, $dicval = NULL) {
        $menus = array();
        $menus[] = array('raw' => '<br/>');

        /**
         * Предзагружаем словари для дальнейшего использования, одним SQL-запросом
         */
        /*
        $dics_slugs = array(
            'product_type',
            'countries',
            'factory',
        );
        $dics = Dic::whereIn('slug', $dics_slugs)->with('values')->get();
        $dics = Dic::modifyKeys($dics, 'slug');
        $lists = Dic::makeLists($dics, 'values', 'name', 'id');
        #Helper::tad($lists);
        */

        ## Получаем списки с нужными индексами
        $cities = Config::get('temp.cities');
        #Helper::ta($cities);
        $types = Config::get('temp.types');
        #Helper::ta($types);

        /**
         * Добавляем доп. элементы в меню, в данном случае: выпадающие поля для организации фильтрации записей по их свойствам
         */
        if (is_array($cities) && count($cities))
            $menus[] = Helper::getDicValMenuDropdown('city_id', 'Все города', $cities, $dic);
        if (is_array($types) && count($types))
            $menus[] = Helper::getDicValMenuDropdown('type_id', 'Все типы', $types, $dic);
        return $menus;
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
        $dic_lessons = $dics['lessons'];
        $dic_reviews = $dics['reviews'];
        $counts = Config::get('temp.index_counts');

        /**
         * Возвращаем доп. элементы в столбец "Действия": кнопки со ссылками и счетчиками, индивидуальны для каждой записи
         */
        return '
            <span class="block_ margin-bottom-5_">
                <a href="' . URL::route('entity.index', array('lessons', 'filter[fields][course_id]' => $dicval->id)) . '" class="btn btn-default">
                    Программа курса (' . @(int)$counts[$dicval->id][$dic_lessons->id]. ')
                </a>
            </span>
            <span class="block_ margin-bottom-5_">
                <a href="' . URL::route('entity.index', array('reviews', 'filter[fields][course_id]' => $dicval->id)) . '" class="btn btn-default">
                    Отзывы (' . @(int)$counts[$dicval->id][$dic_reviews->id]. ')
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
                'city',
                'type',
                'lessons',
                'reviews',
            );
            $dics = Dic::whereIn('slug', $dics_slugs)->with('values_no_conditions')->get();
            $dics = Dic::modifyKeys($dics, 'slug');
            #Helper::tad($dics);
            Config::set('temp.index_dics', $dics);

            ## Получаем список с нужными индексами
            $cities = Dic::makeLists($dics['city']['values_no_conditions'], null, 'name', 'id');
            #Helper::ta($cities);
            Config::set('temp.cities', $cities);

            ## Получаем список с нужными индексами
            $types = Dic::makeLists($dics['type']['values_no_conditions'], null, 'name', 'id');
            #Helper::ta($types);
            Config::set('temp.types', $types);

            /**
             * Создаем списки из полученных данных
             */
            $dic_ids = Dic::makeLists($dics, false, 'id');
            #Helper::d($dic_ids);
            $dicval_ids = Dic::makeLists($dicvals, false, 'id');
            #Helper::d($dicval_ids);

            /**
             * Получаем количество необходимых нам данных, одним SQL-запросом.
             * Сохраняем данные в конфиг - для дальнейшего использования в функции-замыкании actions (см. выше).
             */
            $counts = array();
            if (count($dic_ids) && count($dicval_ids))
                $counts = DicVal::counts_by_fields($dic_ids, array('course_id' => $dicval_ids));
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


    'second_line_modifier' => function($line, $dic, $dicval) {

        #Helper::ta($dicval);

        ## Получаем списки с нужными индексами
        $cities = Config::get('temp.cities');
        #Helper::ta($cities);
        $types = Config::get('temp.types');
        #Helper::ta($types);

        $array = [];
        if (isset($cities[$dicval->city_id])) {
            $array[] = $cities[$dicval->city_id];
        }
        if (isset($types[$dicval->type_id])) {
            $array[] = $types[$dicval->type_id];
        }

        ## Выводим строку
        return implode(' - ', $array);
    },


    'seo' => ['title', 'description', 'keywords'],
);