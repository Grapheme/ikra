<?php

return array(

    'fields' => function() {

        return array(
            'rp' => array(
                'title' => 'Родительный падеж (например: креатива)',
                'type' => 'text',
            ),
            'dp' => array(
                'title' => 'Дательный падеж (например: креативу)',
                'type' => 'text',
            ),
            'image' => array(
                'title' => 'Картинка',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 4, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),
            'color' => array(
                'title' => 'Код цвета (#000000 - #ffffff)',
                'type' => 'text',
                'others' => [
                    'placeholder' => '#000000',
                ],
            ),

            'short' => array(
                'title' => 'Краткое описание',
                'type' => 'textarea',
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