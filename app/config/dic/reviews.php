<?php

return array(

    'fields' => function($dicval = null) {

        /**
         * Предзагружаем нужные словари с данными, по системному имени словаря, для дальнейшего использования.
         * Делается это одним SQL-запросом, для снижения нагрузки на сервер БД.
         */
        $dics_slugs = array(
            'course',
        );
        $dics = Dic::whereIn('slug', $dics_slugs)->with('values')->get();
        $dics = Dic::modifyKeys($dics, 'slug');
        #Helper::tad($dics);
        $lists = Dic::makeLists($dics, 'values', 'name', 'id');
        #Helper::dd($lists);
        $lists_ids = Dic::makeLists($dics, null, 'id', 'slug');
        #Helper::dd($lists_ids);

        #Helper::ta($lists);
        #Helper::tad($dicval);

        $value_course_id = @$dicval->allfields[Config::get('app.locale')]['course_id'];
        if (!$value_course_id)
            $value_course_id = Input::get('filter.fields.course_id');

        return array(

            'course_id' => array(
                'title' => 'Курс',
                'type' => 'select',
                'values' => $lists['course'], ## Используется предзагруженный словарь
                'default' => Input::get('filter.fields.course_id') ?: null,
            ),
            'photo' => array(
                'title' => 'Изображение',
                'type' => 'image',
                'params' => array(
                    'maxFilesize' => 4, // MB
                    #'acceptedFiles' => 'image/*',
                    #'maxFiles' => 2,
                ),
            ),

            'fio' => array(
                'title' => 'Имя Фамилия',
                'type' => 'text',
            ),

            'company' => array(
                'title' => 'Компания',
                'type' => 'text',
            ),
            'position' => array(
                'title' => 'Должность',
                'type' => 'text',
            ),

            'short' => array(
                'title' => 'Краткий текст отзыва',
                'type' => 'textarea',
            ),
            'full' => array(
                'title' => 'Полный текст отзыва',
                'type' => 'textarea',
            ),

        );
    },


    /**
     * MENUS - дополнительные пункты верхнего меню, под названием словаря.
     */
    'menus' => function($dic, $dicval = NULL) {
        $menus = array();
        $menus[] = array('raw' => '<br/>');

        /**
         * Предзагружаем словари для дальнейшего использования, одним SQL-запросом
         */
        /*
        $dics_slugs = array(
            'course',
        );
        $dics = Dic::whereIn('slug', $dics_slugs)->with('values')->get();
        $dics = Dic::modifyKeys($dics, 'slug');
        $lists = Dic::makeLists($dics, 'values', 'name', 'id');
        #Helper::tad($lists);

        #Helper::tad($dics);
        if (isset($lists['course']) && count($lists['course'])) {
            foreach ($lists['course'] as $id => $name) {
                $lists['course'][$id] = $name . ' (' . $dics['course'][$id]->name . ')';
            }
        }
        #Helper::tad($lists);
        */

        /**
         * Добавляем доп. элементы в меню, в данном случае: выпадающие поля для организации фильтрации записей по их свойствам
         */
        #$menus[] = Helper::getDicValMenuDropdown('course_id', 'Все курсы', $lists['course'], $dic);
        #$menus[] = Helper::getDicValMenuDropdown('format_id', 'Все форматы', $lists['format'], $dic);


        if (null != ($cid = Input::get('filter.fields.course_id')) && null !== ($course = DicVal::find($cid))) {
            #$course->load('fields');
            #$menus[] = array('raw' => '<strong>' . $course->name . '</strong>');

            $url = action('entity.edit', array('dic_id' => 'course', $course->id));
            $menus[] = [
                'link'  => $url, #'?filter[fields][course_id]=' . $course->id,
                'title' => '<i class="fa fa-arrow-circle-left"></i> К курсу',
                'class' => 'btn btn-default',
            ];

            $url = action('entity.index', array('dic_id' => $dic->slug)) . '?' . urlencode('filter[fields][course_id]') . '=' . $course->id;
            $menus[] = [
                'link'  => $url, #'?filter[fields][course_id]=' . $course->id,
                'title' => $course->name,
                'class' => 'btn btn-default',
            ];

        }


        return $menus;
    },


    /**
     * HOOKS - набор функций-замыканий, которые вызываются в некоторых местах кода модуля словарей, для выполнения нужных действий.
     */
    'hooks' => array(

        /**
         * Вызывается в методе index, перед выводом данных в представление (вьюшку).
         * На этом этапе уже известны все элементы, которые будут отображены на странице.
         */
        'before_index_view' => function ($dic, &$dicvals) {

            #$dicvals = DicLib::loadImages($dicvals, ['image']);
        },

        /**
         * Вызывается после создания, обновления, удаления записи, изменения порядка сортировки
         */
        'after_store_update_destroy_order' => function ($dic = NULL, $dicval = NULL) {

            Cache::forget('dic_' . $dic->slug);
        },
    ),


    /*
    'second_line_modifier' => function($line, $dic, $dicval) {
        return $dicval->color;
    },
    #*/


    #'seo' => ['title', 'description', 'keywords'],

    /**
     * Запретить отображение списка записей, если не выбраны элементы для фильтрации
     * Список указывается массивом: ['city', 'category']
     */
    'disable_listing_without_filter' => [
        'fields' => ['course_id'],
        'message' => 'Сначала выберите курс.',
    ],

);