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

    /*
    'second_line_modifier' => function($line, $dic, $dicval) {
        #Helper::ta($dicval);
        return (isset($dicval->answer) && $dicval->answer ? strip_tags($dicval->answer) : '');
    },
    */

    #'seo' => ['title', 'description', 'keywords'],
);