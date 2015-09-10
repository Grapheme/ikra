<?php

return array(

    'seo' => ['title', 'description', 'keywords'],

    'versions' => 0,

    'disable_mainpage_route' => false, ## отключить маршрут главной страницы (mainpage)

    'disable_url_modification' => false, ## отключить модификаторы урлов. Установить в false!
    'disable_slug_to_template' => true, ## отключить автоматический поиск шаблона страницы по ее системному имени в случае, если страница не существует

    'preload_pages_limit' => 0, ## NULL - never; 0 - always; 100 - if less than 100 (+one more sql request)
    'preload_cache_lifetime' => 60*24, ## время жизни кеша страниц, в минутах

    /*
    'fields' => function() {

        return array(
            'image' => array(
                'title' => 'Картинка для шапки',
                'type' => 'image',
            ),
        );
    },
    #*/

    #/*
    'block_templates' => function() {

        $block_tpls = [

            'index__about' => [
                'title' => 'Главная - Шапка',
                'fields' => [
                    'video' => [
                        'title' => 'Видео для фона',
                        'type' => 'textarea',
                    ],
                    'image' => [
                        'title' => 'Картинка для фона',
                        'type' => 'image',
                    ],
                ],
            ],

            'about__about' => [
                'title' => 'Об икре - О школе',
                'fields' => [
                    'text' => [
                        'title' => 'Заголовок',
                        'type' => 'text',
                    ],
                    'short' => [
                        'title' => 'Краткое описание',
                        'type' => 'textarea',
                    ],
                    'full' => [
                        'title' => 'Полное описание',
                        'type' => 'textarea',
                    ],
                ],
            ],

            'story__header' => [
                'title' => 'Истории успеха - Шапка',
                'fields' => [
                    'image' => [
                        'title' => 'Фоновое изображение',
                        'type' => 'image',
                    ],
                    'text' => [
                        'title' => 'Заголовок',
                        'type' => 'text',
                    ],
                    'short' => [
                        'title' => 'Краткое описание',
                        'type' => 'textarea',
                    ],
                ],
            ],

            'contacts__header' => [
                'title' => 'Контакты - Шапка',
                'fields' => [
                    'image' => [
                        'title' => 'Фоновое изображение',
                        'type' => 'image',
                    ],
                ],
            ],
        ];

        return $block_tpls;
    }
    #*/
);