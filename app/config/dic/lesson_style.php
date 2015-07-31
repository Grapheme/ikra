<?php

return array(

    'fields' => function() {

        return array(
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


    /**
     * HOOKS - набор функций-замыканий, которые вызываются в некоторых местах кода модуля словарей, для выполнения нужных действий.
     */
    'hooks' => array(

        /**
         * Вызывается в методе index, перед выводом данных в представление (вьюшку).
         * На этом этапе уже известны все элементы, которые будут отображены на странице.
         */
        'before_index_view' => function ($dic, $dicvals) {

            $dicvals = DicLib::loadImages($dicvals, ['image']);
        },
    ),


    #/*
    'first_line_modifier' => function($line, $dic, $dicval) {
        #Helper::ta($dicval);
        return (isset($dicval->image) && is_object($dicval->image) ? '<img src="' . $dicval->image->thumb() . '" height="20"/> ' : '') . '<span style="color:' . $dicval->color . '">' . $dicval->name . '</span>';
    },
    #*/

    #/*
    'second_line_modifier' => function($line, $dic, $dicval) {
        return $dicval->color;
    },
    #*/

    #'seo' => ['title', 'description', 'keywords'],
);