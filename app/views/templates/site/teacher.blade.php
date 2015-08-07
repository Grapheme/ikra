<?
/**
 * TITLE: Преподаватель
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
$teacher_id = $route->getParameter('teacher_id');
#Helper::tad($teacher_id);
$teacher = isset($dic_teachers[$teacher_id]) ? $dic_teachers[$teacher_id] : null;

if (!$teacher) {
    echo json_encode(['responseType' => 'error', 'responseCode' => 404]);
    return;
}


$teacher_courses = new Collection();
## Преподает в уроках след. курсов
$teacher_courses_ids = [];
$temp = (new DicValRel())->where('dicval_parent_field', 'teachers')->where('dicval_child_id', $teacher->id)->get();
#Helper::tad($temp);
if (is_object($temp) && $temp->count()) {
    foreach ($temp as $tmp) {
        $teacher_courses_ids[$tmp->dicval_parent_id] = 1;
    }
}
#Helper::tad($teacher_courses_ids);
## Куратор в след. курсах
foreach ($dic_course as $course) {
    if ($course->teacher_id == $teacher->id || isset($teacher_courses_ids[$course->id])) {
        $teacher_courses[$course->id] = $course;
    }
}
#Helper::tad($teacher_courses);


## Еще преподаватели...
$more_teachers = new Collection();
foreach ($dic_teachers as $tchr) {
    if ($tchr->direction_id == $teacher->direction_id && $tchr->id != $teacher->id) {
        $more_teachers[$tchr->id] = $tchr;
    }
}
#Helper::tad($more_teachers);

$teacher_direction = isset($dic_direction[$teacher->direction]) ? $dic_direction[$teacher->direction] : null;
#dd($teacher_direction);
?>


@section('style')
@stop


@section('content')

    <section class="b-title _invert" style="background-image: url({{ isset($teacher->header_img) && is_object($teacher->header_img) ? $teacher->header_img->full() : '' }});">

        <div class="b-title__logo _invisible">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
        </div>

        <div class="b-title__text">
            <h1 class="_mb30">{{ $teacher->name }}</h1>
            <i><strong>{{ $teacher->quote }}</strong></i>
        </div>

    </section>




    <section class="b-section _no-padding-bottom">
        <div class="row _mb60">
            <div class="col-md-4 b-teacher__photo _mb20">
                <div>
                    @if (isset($teacher->avatar) && is_object($teacher->avatar))
                        <img src="{{ $teacher->avatar->full() }}" alt="{{ $teacher->name }}">
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <h3 class="_mb5">{{ $teacher->position }}</h3>
                <small class="_block">{{ $teacher->company }}</small>
            </div>
        </div>

        <div class="row">
            @if ($teacher->background)
                <div class="col-md-8">
                    <h3 class="_mb10">background</h3>

                    {{ nl2br($teacher->background) }}

                </div>
            @endif
            <div class="col-md-4">
                <h3 class="_mb10">Напиши Васе:</h3>
                <div class="b-social">
                    @if ($teacher->fb_link)
                        <a class="_facebook" href="{{ $teacher->fb_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if ($teacher->vk_link)
                        <a class="_vkontakte" href="{{ $teacher->vk_link }}" target="_blank"><i class="fa fa-vk"></i></a>
                    @endif
                    @if ($teacher->ig_link)
                        <a class="_instagram" href="{{ $teacher->ig_link }}" target="_blank"><i class="fa fa-instagram"></i></a>
                    @endif
                    @if ($teacher->tw_link)
                        <a class="_twitter" href="{{ $teacher->tw_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if ($teacher->yt_link)
                        <a class="_youtube" href="{{ $teacher->yt_link }}" target="_blank"><i class="fa fa-youtube"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </section>




    @if (isset($teacher_courses) && is_object($teacher_courses) && $teacher_courses->count())
        <section class="b-section">
            <h2>Преподаёт тут</h2>

            <div class="b-courses">
                <ul class="row">
                    @foreach ($teacher_courses as $course)
                        <?
                        $city = isset($dic_city[$course->city_id]) ? $dic_city[$course->city_id] : null;
                        if (!$city)
                            break;

                        $color = isset($dic_direction[$course->direction_id]) && is_object($dic_direction[$course->direction_id]) ? $dic_direction[$course->direction_id]->color : null;
                        ?>
                        <li data-equalheight="" class="text-center _mb30 col-sm-6 col-md-4" style="height: 180px;">
                            <a class="b-courses__link" href="{{ URL::route('page.course', [$city->slug, $course->id]) }}" style="background-color: {{ $color }}">
                                <span class="h3"><strong>{{ $course->name }}</strong></span>
                                <span class="b-courses__descr"><i>{{ $course->short }}</i></span>
                                <time class="h5">
                                    @if ($course->date_start)
                                        {{ Helper::rdate('j M', $course->date_start) }}
                                    @endif
                                    @if ($course->date_start < $course->date_stop)
                                        &mdash; {{ Helper::rdate('j M', $course->date_stop) }}
                                    @endif
                                </time>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif



    @if (isset($more_teachers) && is_object($more_teachers) && $more_teachers->count())
        <?
        $color = isset($teacher_direction) && is_object($teacher_direction) ? $teacher_direction->color : '';
        ?>
        <section class="b-section _no-padding-bottom" style="background-color: {{ $color }}">
            <h2>
                Ещё преподаватели
                @if (isset($teacher_direction) && is_object($teacher_direction))
                    {{ $teacher_direction->rp }}
                @endif
            </h2>

            <ul class="row">
                @foreach ($more_teachers as $tchr)
                    <li class="col-sm-4 _mb70">
                        <a class="_block _mb20" href="{{ URL::route('page.teacher', $teacher->id) }}">
                            @if (isset($tchr->avatar) && is_object($tchr->avatar))
                                <img src="{{ $tchr->avatar->full() }}" alt="{{ $tchr->name }}">
                            @endif
                        </a>
                        <h3 class="_mb5">{{ $tchr->name }}</h3>
                        <small class="_block _mb10">
                            <?php
                            $temp = [];
                            if ($teacher->position)
                                $temp[] = $teacher->position;
                            if ($teacher->company)
                                $temp[] = $teacher->company;
                            ?>
                            {{ implode(', ', $temp) }}
                        </small>
                    </li>
                @endforeach
            </ul>
        </section>
    @endif

@stop


@section('scripts')
@stop