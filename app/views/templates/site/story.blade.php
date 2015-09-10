<?
/**
 * TITLE: История успеха
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
$story_id = $route->getParameter('story_id');
$story = isset($dic_stories[$story_id]) ? $dic_stories[$story_id] : null;
if (!$story) {
    echo json_encode(['responseType' => 'error', 'responseCode' => 404]);
    return;
}

?>


@section('style')
@stop


@section('content')

    <section class="b-title" style="background-image: url({{ isset($story->header_img) && is_object($story->header_img) ? $story->header_img->full() : '' }});">

        <div class="b-title__logo _invisible">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
        </div>

        <div class="b-title__text">
            <h2 class="_mb25">{{ $story->name }}</h2>
            <i class="_block _mb55">
                <strong>
                    <?php
                    $temp = [];
                    if ($story->position)
                        $temp[] = $story->position;
                    if ($story->company)
                        $temp[] = $story->company;
                    ?>
                    {{ implode(', ', $temp) }}
                </strong>
            </i>
            <div class="_txt4 _mb50">
                <b>
                    @if ($story->course_id || $story->course_text)
                        <div class="h4">
                            @if ($story->gender == 'm')
                                Учился:
                            @else
                                Училась:
                            @endif
                            <?
                            #$color = isset($dic_direction[$course->direction_id]) && is_object($dic_direction[$course->direction_id]) ? $dic_direction[$course->direction_id]->color : null;
                            $color = null;
                            ?>
                            <b class="" style="color: {{ $color }}">
                                @if ($story->course_id && isset($dic_course[$story->course_id]) && is_object($dic_course[$story->course_id]))
                                    <?
                                    $course = isset($dic_course[$story->course_id]) ? $dic_course[$story->course_id] : null;
                                    $city = isset($dic_city[$course->city_id]) ? $dic_city[$course->city_id] : null;
                                    ?>
                                    @if ($city && $course)
                                        <a href="{{ URL::route('page.course', [$city->slug, $course->id]) }}">
                                            {{ $dic_course[$story->course_id]->name }}
                                        </a>
                                    @endif
                                @else
                                    {{ $story->course_text }}
                                @endif
                            </b>
                        </div>
                    @endif
                </b>
            </div>
        </div>

    </section>


    <section class="b-section _no-padding-bottom">
        <div class="row ">
            <div class="col-md-4 b-teacher__photo _mb20">
                <div>
                    @if (isset($story->avatar) && is_object($story->avatar))
                        <img src="{{ $story->avatar->full() }}" alt="{{ $story->name }}">
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <h3 class="_mb10"><br>Написать:</h3>
                <div class="b-social">
                    @if ($story->fb_link)
                        <a class="_facebook _mb0" href="{{ $current_city->fb_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if ($story->vk_link)
                        <a class="_vkontakte _mb0" href="{{ $current_city->vk_link }}" target="_blank"><i class="fa fa-vk"></i></a>
                    @endif
                    @if ($story->ig_link)
                        <a class="_instagram _mb0" href="{{ $current_city->ig_link }}" target="_blank"><i class="fa fa-instagram"></i></a>
                    @endif
                    @if ($story->tw_link)
                        <a class="_twitter _mb0" href="{{ $current_city->tw_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if ($story->yt_link)
                        <a class="_youtube _mb0" href="{{ $current_city->yt_link }}" target="_blank"><i class="fa fa-youtube"></i></a>
                    @endif

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                {{ $story->full }}
            </div>
            <div class="col-md-4">
                <h3 class="_mb15">Поделиться историей:</h3>
                <a href="#" class="btn btn-blue _mb20" style="margin-right: 40px">В фейсбуке</a>
                <br>
                <a href="#" class="btn btn-blue _mb20">Во вконтакте</a>
            </div>
        </div>
    </section>


    <section class="b-section">
        <div class="_txt3 _mb50"><b>истории успеха <br>других выпускников икры</b></div>

        <div class="row b-slider _mb20 owl-carousel _small">

            @foreach ($dic_stories as $somestory)
                <div class="col-sm-4 text-left owl-item">
                    <a class="_block _mb20" href="">
                        <img src="img/content/512.jpg" alt="">
                    </a>
                    <div class="_txt9">{{ $somestory->name }}</div>
                </div>
            @endforeach

        </div>
    </section>


    <section class="b-section _bg-blue">
        <div class="_vertical-center">
            <div>
                <h2 class="_cta">
                    Хочу учиться! На какой <span class="_text-yellow"><a href="#">курс</a></span> мне пойти?
                </h2>
            </div>
        </div>
    </section>


@stop


@section('scripts')
@stop
