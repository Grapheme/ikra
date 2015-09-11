<?
/**
 * TITLE: Преподаватели
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
$teachers = new Collection();
if (isset($dic_teachers) && is_object($dic_teachers) && $dic_teachers->count()) {
    foreach ($dic_teachers as $teacher) {
        if ($teacher->city_id == $current_city->id)
            $teachers[] = $teacher;
    }
}
#Helper::tad($teachers);
?>


@section('style')
@stop


@section('content')

    <section class="b-title _short">

        <div class="b-title__logo">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
        </div>

        <h2 class="b-title__text">
            Преподаватели
        </h2>

    </section>


    <section class="b-section _no-padding-bottom">
        <div class="h2" id="teachers-filter-form">
            Преподаватели в
            <form class="nl-form _text-red" data-nl>
                <select class="js-teach-select" name="teacher-city" id="teacher-city">
                    @foreach ($dic_city as $city)
                        <option value="{{ $city->id }}"{{ $city->id == $current_city->id ? ' selected' : '' }}>{{ $city->dp }}</option>
                    @endforeach
                </select>
                <div class="nl-overlay"></div>
            </form>
            <br>
            по
            <form class="nl-form _text-red" data-nl>
                <div class="js-course-recoloring">
                    <select class="js-teach-select" name="teach-subject" id="derection-teacher">
                        <option value="0" data-color="#ff0000">всем направлениям</option>
                        @foreach ($dic_direction as $direction)
                            <option value="{{ $direction->id }}" data-color="{{ $direction->color }}">{{ $direction->dp }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="nl-overlay"></div>
            </form>
        </div>

        @if (isset($teachers) && is_object($teachers) && $teachers->count())
          	@foreach (array_chunk($teachers->all(), 3) as $teachersRow)
            <ul class="b-teachers__list row">
                @foreach ($teachersRow as $teacher)
                    <li class="col-sm-4 _mb70">
                        <a href="{{ URL::route('page.teacher', $teacher->id) }}" style="background-image: url({{ is_object($teacher->avatar) ? $teacher->avatar->full() : '' }});" class="_block _mb20 teacher-list-avatar">

                        </a>
                        <div class="teacher-list-info">
                            <h3 class="_mb5">{{ $teacher->name }}</h3>
                            <div class="_block _mb10">
                                <?php
                                $temp = [];
                                if ($teacher->position)
                                    $temp[] = $teacher->position;
                                if ($teacher->company)
                                    $temp[] = $teacher->company;
                                ?>
                                {{ implode(', ', $temp) }}
                            </div>
                            <div class="text-right">
                                <a class="btn btn-readmore" href="{{ URL::route('page.teacher', [$teacher->id]) }}">Подробнее</a>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            @endforeach
        @endif

    </section>


@stop


@section('scripts')
@stop