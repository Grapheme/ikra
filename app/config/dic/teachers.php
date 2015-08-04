<?php

return array(

    'fields' => function() {

        /**
         * Предзагружаем нужные словари с данными, по системному имени словаря, для дальнейшего использования.
         * Делается это одним SQL-запросом, для снижения нагрузки на сервер БД.
         */
        $dics_slugs = array(
            'direction',
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
            'direction' => array(
                'title' => 'Основное направление',
                'type' => 'select',
                'values' => /*array('Выберите..') +*/ $lists['direction'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.direction') ?: null,
            ),
            'mainpage' => array(
                'no_label' => true,
                'title' => 'Выводить на главной странице',
                'type' => 'checkbox',
                'label_class' => 'normal_checkbox',
            ),

            'quote' => array(
                'title' => 'Цитата в шапке',
                'type' => 'textarea',
            ),
            'header_img' => array(
                'title' => 'Изображение в шапке',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 4, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
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

            'company' => array(
                'title' => 'Компания',
                'type' => 'text',
            ),
            'position' => array(
                'title' => 'Должность',
                'type' => 'text',
            ),

            'background' => array(
                'title' => 'Background',
                'type' => 'textarea',
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

        );
    },


    /**
     * HOOKS - набор функций-замыканий, которые вызываются в некоторых местах кода модуля словарей, для выполнения нужных действий.
     */
    'hooks' => array(

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

    #'seo' => ['title', 'description', 'keywords'],
);