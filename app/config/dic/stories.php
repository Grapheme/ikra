<?php

return array(

    'fields' => function() {

        /**
         * Предзагружаем нужные словари с данными, по системному имени словаря, для дальнейшего использования.
         * Делается это одним SQL-запросом, для снижения нагрузки на сервер БД.
         */
        $dics_slugs = array(
            'city',
            'course',
        );
        $dics = Dic::whereIn('slug', $dics_slugs)->with('values')->get();
        $dics = Dic::modifyKeys($dics, 'slug');
        #Helper::tad($dics);
        $lists = Dic::makeLists($dics, 'values', 'name', 'id');
        #Helper::dd($lists);
        $lists_ids = Dic::makeLists($dics, null, 'id', 'slug');
        #Helper::dd($lists_ids);

        return array(

            'company' => array(
                'title' => 'Компания',
                'type' => 'text',
            ),
            'position' => array(
                'title' => 'Должность',
                'type' => 'text',
            ),

            'quote' => array(
                'title' => 'Цитата в шапке',
                'type' => 'textarea',
            ),
            /*
            'header_img' => array(
                'title' => 'Изображение в шапке',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 4, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),
            */
            'avatar' => array(
                'title' => 'Аватар',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 4, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),
            'gender' => array(
                'title' => 'Пол',
                'type' => 'select',
                'values' => Config::get('site.genders'),
                #'default' => Input::get('filter.fields.city_id') ?: null,
            ),

            'short' => array(
                'title' => 'Короткий текст',
                'type' => 'textarea',
            ),
            'full' => array(
                'title' => 'Полный текст',
                'type' => 'textarea_redactor',
            ),

            'city_id' => array(
                'title' => 'Город',
                'type' => 'select',
                'values' => $lists['city'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.city_id') ?: null,
            ),

            'course_id' => array(
                'title' => 'Обучался на курсе',
                'type' => 'select',
                'values' => array('Выберите..') + $lists['course'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.course_id') ?: null,
            ),
            '-' => array(
                'type' => 'custom',
                'content' => '<br/><strong>ИЛИ</strong><br/><br/>',
            ),
            'course_text' => array(
                'title' => 'Название курса',
                'type' => 'text',
            ),

            'mainpage' => array(
                'no_label' => true,
                'title' => 'Показывать на главной',
                'type' => 'checkbox',
                'label_class' => 'normal_checkbox',
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