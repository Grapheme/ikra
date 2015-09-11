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
        );
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

            $temp = Dic::valuesBySlug('city', null, [], true, true, true);
            #Helper::tad($temp);
            Config::set('temp.city', $temp);
        },

        /**
         * Вызывается после создания, обновления, удаления записи, изменения порядка сортировки
         */
        'after_store_update_destroy_order' => function ($dic = NULL, $dicval = NULL) {

            Cache::forget('dic_' . $dic->slug);
        },
    ),


    #/*
    'second_line_modifier' => function($line, $dic, $dicval) {

        #Helper::ta($dicval);
        $cities = Config::get('temp.city');
        return (isset($cities[$dicval->city_id]) && is_object($cities[$dicval->city_id]) ? $cities[$dicval->city_id]->name : '');
    },
    #*/

    #'seo' => ['title', 'description', 'keywords'],
);