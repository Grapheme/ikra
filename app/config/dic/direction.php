<?php

return array(

    'fields' => function() {

        return array(
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
        );
    },

    /*
    'second_line_modifier' => function($line, $dic, $dicval) {
        #Helper::ta($dicval);
        return (isset($dicval->answer) && $dicval->answer ? strip_tags($dicval->answer) : '');
    },
    */

    #'seo' => ['title', 'description', 'keywords'],
);