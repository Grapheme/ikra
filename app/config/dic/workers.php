<?php

return array(

    'fields' => function() {

        /**
         * Предзагружаем нужные словари с данными, по системному имени словаря, для дальнейшего использования.
         * Делается это одним SQL-запросом, для снижения нагрузки на сервер БД.
         */
        $dics_slugs = array(
            'city',
        );
        $dics = Dic::whereIn('slug', $dics_slugs)->with('values')->get();
        $dics = Dic::modifyKeys($dics, 'slug');
        #Helper::tad($dics);
        $lists = Dic::makeLists($dics, 'values', 'name', 'id');
        #Helper::dd($lists);
        $lists_ids = Dic::makeLists($dics, null, 'id', 'slug');
        #Helper::dd($lists_ids);

        return array(

            'city_id' => array(
                'title' => 'Город',
                'type' => 'select',
                'values' => $lists['city'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.city_id') ?: null,
            ),

            'avatar' => array(
                'title' => 'Аватар',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 4, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),
            'position' => array(
                'title' => 'Должность',
                'type' => 'text',
            ),
            'phone' => array(
                'title' => 'Номер телефона',
                'type' => 'text',
            ),
            'email' => array(
                'title' => 'E-mail',
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
        $cities = Config::get('temp.cities');
        #Helper::ta($cities);

        /**
         * Добавляем доп. элементы в меню, в данном случае: выпадающие поля для организации фильтрации записей по их свойствам
         */
        if (is_array($cities) && count($cities))
            $menus[] = Helper::getDicValMenuDropdown('city_id', 'Все города', $cities, $dic);
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
                'city',
            );
            $dics = Dic::whereIn('slug', $dics_slugs)->with('values_no_conditions')->get();
            $dics = Dic::modifyKeys($dics, 'slug');
            #Helper::tad($dics);
            Config::set('temp.index_dics', $dics);

            ## Получаем список с нужными индексами
            $cities = Dic::makeLists($dics['city']['values_no_conditions'], null, 'name', 'id');
            #Helper::ta($cities);
            Config::set('temp.cities', $cities);

            /**
             * Создаем списки из полученных данных
             */
            $dic_ids = Dic::makeLists($dics, false, 'id');
            #Helper::d($dic_ids);
            $dicval_ids = Dic::makeLists($dicvals, false, 'id');
            #Helper::d($dicval_ids);
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

        $array = [];
        if (isset($cities[$dicval->city_id])) {
            $array[] = $cities[$dicval->city_id];
        }
        ## Выводим строку
        return implode(' - ', $array);
    },


    #'seo' => ['title', 'description', 'keywords'],

    /**
     * Запретить сортировку записей, если не выбраны элементы для фильтрации
     * Можно указывать список - массивом: ['city', 'category']
     */
    'disable_ordering_without_filter' => 'city_id',
);