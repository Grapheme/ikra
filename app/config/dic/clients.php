<?php

return array(

    'fields' => function() {

        return array(
            'logo' => array(
                'title' => 'Логотип',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 4, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),
            'url' => array(
                'title' => 'Ссылка',
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