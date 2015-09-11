<?
/**
 * TITLE: Курс
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
$route = Route::current();
#dd($route);


$city_slug = $route->getParameter('city_slug');
#Helper::tad($city_slug);

$city = null;
foreach ($dic_city as $temp) {
    if ($temp->slug == $city_slug) {
        $city = $temp;
        break;
    }
}
#Helper::tad($city);
if (!is_object($city)) {
    echo json_encode(['responseType' => 'error', 'responseCode' => 404]);
    return;
}


$course_id = $route->getParameter('course_id');
#Helper::tad($course_id);
$course = isset($dic_course[$course_id]) ? $dic_course[$course_id] : null;
## Если курс не найден - 404
if (!$course) {
    echo json_encode(['responseType' => 'error', 'responseCode' => 404]);
    return;
}
#Helper::tad($course);

## Если город курса не совпадает с текущим...
if ($course->city_id != $city->id) {

    #Helper::tad('$course->city_id != $city->id => ' . $course->city_id . ' != ' . $city->id);

    $real_city = isset($dic_city[$course->city_id]) ? $dic_city[$course->city_id] : null;
    if ($real_city) {
        ## Редирект на нужный адрес
        echo json_encode(['responseType' => 'redirect', 'redirectUrl' => URL::route('page.course', [$real_city->slug, $course_id])]);
        return;
    } else {
        ## 404
        echo json_encode(['responseType' => 'error', 'responseCode' => 404]);
        return;
    }
}
#$course->load('related_dicvals'); ## пусто
#Helper::tad($course);


$teacher = isset($dic_teachers[$course->teacher_id]) ? $dic_teachers[$course->teacher_id] : null;
#Helper::tad($teacher);


$lessons = Dic::valuesBySlug('lessons', function($query) use ($course) {
    $query->filter_by_field('course_id', '=', $course->id);
}, 'all', true, true, true);
#Helper::tad($lessons);


$students_works = new Collection();
if (isset($dic_students_work) && is_object($dic_students_work) && $dic_students_work->count()) {
    foreach ($dic_students_work as $work) {
        if ($work->type_id == $course->type_id)
            $students_works[] = $work;
    }
}
#Helper::tad($students_works);


$reviews = new Collection();
if (isset($dic_reviews) && is_object($dic_reviews) && $dic_reviews->count()) {
    foreach ($dic_reviews as $review) {
        if ($review->course_id == $course->id)
            $reviews[] = $review;
    }
}
#Helper::tad($reviews);
?>


@section('style')
@stop


@section('content')


    <section class="b-title _short">

        <div class="h2 b-title__text">
            {{ $course->name }}

            <div class="h3 b-title__action">
                @if ($course->date_start)
                    {{ Helper::rdate('j M', $course->date_start) }}
                @endif
                @if ($course->date_start < $course->date_stop)
                    &mdash; {{ Helper::rdate('j M', $course->date_stop) }}
                @endif
                @if ($course->weekdays)
                    <br/>
                    {{ $course->weekdays }}
                @endif
            </div>
            <div class="course-form-holder" class="collapse in" aria-expanded="true">
                <form role="form" class="row _white">
                    <div class="col-md-5 _mb60 col-md-offset-0">
                        <div class="form-group _mb20">
                            <input name="name" type="text" class="form-control" id="" placeholder="Имя">
                        </div>
                        <div class="form-group _mb20">
                            <input name="email" type="email" class="form-control" id="" placeholder="E-mail">
                        </div>
                        <div class="form-group _mb20">
                            <input name="phone" type="text" class="form-control" id="" placeholder="Телефон">
                        </div>
                        <div class="form-group _mb20">
                            <div data-nl="">
                                <div class="nl-field nl-dd">
                                    <select>
                                        <option value="0">Скидка</option>
                                        <option value="1">0%</option>
                                        <option value="2">10%</option>
                                        <option value="3">20%</option>
                                        <option value="4">30%</option>
                                        <option value="5">40%</option>
                                        <option value="6">50%</option>
                                    </select>
                                </div>
                                <div class="nl-overlay"></div>
                            </div>
                        </div>
                </div>
                <div class="col-xs-12 _text-blue text-center">
                    <button type="submit" class="btn">Отправить</button>
                </div>
                </form>
            </div>
            <span class="_text-red"><a class="open-form btn btn-white" href="#">Записаться</a></span>
        </div>

    </section>




    @if ($teacher)
        <section class="b-section _no-padding-bottom">
            <div class="row">
                <div class="col-md-4 _mb60" data-equalheight>
                    <a class="_block _mb10 course-teacher-avatar" style="background-image: url({{ ($teacher->avatar->full() && is_object($teacher->avatar)) ? $teacher->avatar->full() : '' }});" href="{{ URL::route('page.teacher', [$teacher->id]) }}">

                    </a>
                    <h3>{{ $teacher->name }}</h3>
                    <small>
                        <?php
                        $temp = [];
                        if ($teacher->position)
                            $temp[] = $teacher->position;
                        if ($teacher->company)
                            $temp[] = $teacher->company;
                        ?>
                        {{ implode(', ', $temp) }}
                    </small>
                </div>
                <div class="col-md-8 _mb60" data-equalheight>
                    <div class="_vertical-center">
                        <blockquote>
                            <i><strong>{{ $course->blockquote }}</strong></i>
                        </blockquote>
                    </div>
                </div>
            </div>
        </section>
    @endif




    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 _bg-cyan" data-equalheight>
                <div class="b-section">
                    <h2 class="_mb20">Для кого</h2>
                    <p>{{ $course->for_who }}</p>
                </div>
            </div>
            <div class="col-md-6 _bg-yellow" data-equalheight>
                <div class="b-section">
                    <h2 class="_mb20">Что в итоге</h2>
                    <p>{{ $course->result }}</p> </div>
            </div>
        </div>
    </div>




    <section class="b-section">
        @if (isset($lessons) && is_object($lessons) && $lessons->count())
            <h2>Программа курса</h2>

            <ul class="b-primary _mb100">
                @foreach ($lessons as $lesson)
                    <?
                    $lesson_direction = isset($dic_direction[$lesson->direction_id]) ? $dic_direction[$lesson->direction_id] : null;
                    #Helper::ta($lesson_direction);
                    $lesson_teacher = isset($dic_teachers[$lesson->teacher_id]) ? $dic_teachers[$lesson->teacher_id] : null;
                    ?>
                    <li data-direction_id="{{ $lesson_direction->id }}">
                        <a class="b-primary__title collapsed _mb30" data-toggle="collapse" href="#lesson{{ $lesson->id }}" aria-expanded="true">
                            @if (is_object($lesson_direction->image))
                                <img src="{{ $lesson_direction->image->thumb() }}" height="60" width="60" alt="">
                            @endif
                            <span class="_txt4" style="color: {{ $lesson_direction->color }}"><b>{{ $lesson->name }}</b> <i class="fa fa-caret-down"></i> <i class="fa fa-caret-up"></i> </span>
                        </a>

                        <div class="collapse b-primary__step" id="lesson{{ $lesson->id }}" aria-expanded="true">

                            @if (!$lesson->col_1 && !$lesson->col_2)

                                <div class="row">
                                    <div class="col-md-4 _mb20">
                                        <h3 class="_mb10">Куратор блока</h3>
                                        @if (isset($lesson_teacher->avatar) && is_object($lesson_teacher->avatar))
                                            <a class="_block _mb20" href="{{ URL::route('page.teacher', [$teacher->id]) }}">
                                                <img src="{{ $lesson_teacher->avatar->full() }}" alt="{{ $lesson_teacher->name }}">
                                            </a>
                                        @endif
                                        <h3>{{ $lesson_teacher->name }}</h3>
                                        <small>
                                            <?php
                                            $temp = [];
                                            if ($teacher->position)
                                                $temp[] = $teacher->position;
                                            if ($teacher->company)
                                                $temp[] = $teacher->company;
                                            ?>
                                            {{ implode(', ', $temp) }}
                                        </small>
                                    </div>
                                    <div class="col-md-8 _mb20 _max-text">
                                        <article>
                                            @if ($lesson->when)
                                                <h3>Когда?</h3>
                                                <p>
                                                    {{ $lesson->when }}
                                                </p>
                                            @endif
                                            @if ($lesson->what)
                                                <h3>Что делаем?</h3>
                                                <p>
                                                    {{ $lesson->what }}
                                                </p>
                                            @endif
                                        </article>
                                    </div>
                                </div>
                                <div class="row all-teachers">
                                </div>
                                <div class="row _mb70">
                                    <div class="col-md-4">

                                    </div>
                                    <div class="col-md-8 _max-text text-right b-primary__all-teachers">
                                        <a href="#" class="btn btn-blue">Все преподаватели блока</a>
                                    </div>
                                </div>

                            @else

                                <div class="row _mb20">
                                    <div class="col-md-6">

                                        {{ $lesson->col_1 }}

                                    </div>
                                    <div class="col-md-6">

                                        {{ $lesson->col_2 }}

                                    </div>
                                </div>

                            @endif

                        </div>
                    </li>
                @endforeach

            </ul>
        @endif

        @if ($course->worktime)
            <div class="b-primary__step">
                <div class="_txt4 _text-red _mb10"><b>Время занятий</b></div>
                <p>
                    {{ nl2br($course->worktime) }}
                </p>
            </div>
        @endif

    </section>




    @if (isset($students_works) && is_object($students_works) && $students_works->count())
        <section class="b-section">
            <h2>Лучшие работы студентов</h2>

            <ul class="row">
                @foreach ($students_works as $work)
                    <li class="col-md-4 _mb50">
                        <a class="_block _mb20" href="{{ URL::route('page.students_work', [$work->id]) }}" target="_blank">
                            @if (isset($work->image) && is_object($work->image))
                                <img src="{{ $work->image->full() }}" alt="">
                            @endif
                        </a>
                        <h3 class="_mb5">{{ $work->command }}, {{ $work->city }}</h3>
                        <small class="_block">Бренд: {{ $work->brand }}</small>
                    </li>
                @endforeach
            </ul>

        </section>
    @endif




    <section class="b-section _bg-blue">
        <div class="_vertical-center">
            <div>
                <h2 class="_cta">
                    Сегодня отличный день попробовать что-то новое!
                </h2>
                <br><br>
                <span class="_text-blue"><a href="#cta_form" data-toggle="collapse" class="btn">Записаться на курс!</a></span>
            </div>
        </div>

        <div id="cta_form" class="collapse">
            <br>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form id="curent-course-form" role="form" class="_white">
                        <div class="form-group _mb20">
                            <input name="name" type="text" class="form-control" id="" placeholder="Имя">
                        </div>
                        <div class="form-group _mb20">
                            <input name="email" type="email" class="form-control" id="" placeholder="E-mail">
                        </div>
                        <div class="form-group _mb50">
                            <input name="phone" type="text" class="form-control" id="" placeholder="Телефон">
                        </div>
                        <button type="submit" class="btn btn-wide">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>




    @if (isset($reviews) && is_object($reviews) && $reviews->count())
        <section class="b-section">
            <h2>Отзывы выпускников</h2>
            <ul class="row">

                @foreach ($reviews as $review)

                    <li class="b-textroll col-md-4 _mb50">
                        @if (isset($review->image) && is_object($review->image))
                            <span class="b-textroll__img _block _mb20">
                                    <img src="{{ $review->image->full() }}" alt="">
                            </span>
                        @endif
                        <h3 class="_mb5">{{ $review->fio }}</h3>
                        <small class="_block _mb25">{{ $review->company }}, {{ $review->position }}</small>
                        <p class="b-textroll__content">
                            {{ $review->content }}
                        </p>
                        <div class="text-right">
                            <a href="#" class="btn btn-readmore b-textroll__show">Показать полностью</a>
                            <a href="#" class="btn btn-readmore b-textroll__hide">Свернуть</a>
                        </div>
                    </li>

                @endforeach

            </ul>
        </section>
    @endif




    <section class="b-section _bg-red">
        <div class="row">
            <div class="col-md-6">
                <h2>{{ $course->name }}</h2>
                <div class="h2">{{ $course->price }}</div><br>
                <div class="_txt4">
                    @if ($course->date_start)
                        {{ Helper::rdate('j M', $course->date_start) }}
                    @endif
                    @if ($course->date_start < $course->date_stop)
                        &mdash; {{ Helper::rdate('j M', $course->date_stop) }}
                    @endif
                </div><br>
                @if ($course->discounts)
                    <div class="_txt4 _mb20">
                        <a href="#discount" class="collapsed" data-toggle="collapse">
                            Подробности и скидки <i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i>
                        </a>
                    </div>
                    <div class="collapse" id="discount">
                        {{ $course->discounts }}
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="_mb70"></div>
                <form role="form" class="_white">
                    <div class="form-group _mb20">
                        <input type="text" name="name" placeholder="Имя" id="" class="form-control">
                    </div>
                    <div class="form-group _mb20">
                        <input type="email" name="email" placeholder="E-mail" id="" class="form-control">
                    </div>
                    <div class="form-group _mb50">
                        <input type="text" name="phone" placeholder="Телефон" id="" class="form-control">
                    </div>
                    <button class="btn btn-white btn-wide" type="submit">Записаться</button>
                </form>
            </div>
        </div>
    </section>




    <section class="b-section text-center _no-padding-bottom course-sharing-block">
        <h4 class="_text-blue _mb50">Такой информацией стоит поделиться с друзьями:</h4>
        <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
        <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook">
        </div>
    </section>

@stop


@section('scripts')
@stop