<?php

return array(

    'fields' => function() {

        return array(

            'header_img' => array(
                'title' => 'Изображение в шапке',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 4, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),
            'image' => array(
                'title' => 'Изображение',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 4, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),
            'annotation' => array(
                'title' => 'Аннотация',
                'type' => 'textarea',
            ),
            'short' => array(
                'title' => 'Короткий текст',
                'type' => 'textarea',
            ),
            'full' => array(
                'title' => 'Полный текст',
                'type' => 'textarea_redactor',
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