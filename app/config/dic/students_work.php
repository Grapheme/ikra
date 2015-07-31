<?php

return array(

    'fields' => function($dicval = null) {

        /**
         * Предзагружаем нужные словари с данными, по системному имени словаря, для дальнейшего использования.
         * Делается это одним SQL-запросом, для снижения нагрузки на сервер БД.
         */
        $dics_slugs = array(
            'type',
        );
        $dics = Dic::whereIn('slug', $dics_slugs)->with('values')->get();
        $dics = Dic::modifyKeys($dics, 'slug');
        #Helper::tad($dics);
        $lists = Dic::makeLists($dics, 'values', 'name', 'id');
        #Helper::dd($lists);
        $lists_ids = Dic::makeLists($dics, null, 'id', 'slug');
        #Helper::dd($lists_ids);

        return array(

            'type_id' => array(
                'title' => 'Тип курса',
                'type' => 'select',
                'values' => $lists['type'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.type_id') ?: null,
            ),

            'photo' => array(
                'title' => 'Изображение',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 4, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),

            'command' => array(
                'title' => 'Команда',
                'type' => 'text',
            ),
            'city' => array(
                'title' => 'Город',
                'type' => 'text',
            ),
            'brand' => array(
                'title' => 'Бренд',
                'type' => 'text',
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
        $types = Config::get('temp.types');
        #Helper::ta($types);

        /**
         * Добавляем доп. элементы в меню, в данном случае: выпадающие поля для организации фильтрации записей по их свойствам
         */
        if (is_array($types) && count($types))
            $menus[] = Helper::getDicValMenuDropdown('type_id', 'Все типы', $types, $dic);
        return $menus;
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
                'type',
            );
            $dics = Dic::whereIn('slug', $dics_slugs)->with('values_no_conditions')->get();
            $dics = Dic::modifyKeys($dics, 'slug');
            #Helper::tad($dics);
            Config::set('temp.index_dics', $dics);


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
    ),


    /**
     * Запретить отображение списка записей, если не выбраны элементы для фильтрации
     * Список указывается массивом: ['city', 'category']
     */
    'disable_listing_without_filter' => [
        'fields' => ['type_id'],
        'message' => 'Сначала выберите тип курса.',
    ],

);