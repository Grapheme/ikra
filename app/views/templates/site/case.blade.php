<?
/**
 * TITLE: Кейс
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
$case_id = $route->getParameter('id');
#Helper::tad($course_id);
$case = isset($dic_cases[$case_id]) ? $dic_cases[$case_id] : null;
## Если курс не найден - 404
if (!$case) {
    echo json_encode(['responseType' => 'error', 'responseCode' => 404]);
    return;
}
#Helper::tad($case);
?>


@section('style')
@stop


@section('content')

    <section class="b-title " style="background-image: url({{ isset($case->header_img) && is_object($case->header_img) ? $case->header_img->full() : '' }});">
        <div class="b-title__logo _invisible">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" alt="ИКРА IKRA">
        </div>
        <div class="b-title__text">
            <h2 class="_mb25">{{ $case->name }}</h2>
            <i class="_block _mb55"><strong>{{ $case->company }}</strong></i>
        </div>
    </section>




    <section class="b-section _no-padding-bottom">

        <div class="_txt3 _text-red _mb70">
            <b>{{ $case->command }}</b>
        </div>

        <h3 class="_mb15"><strong>Презентация проекта</strong></h3>

        <div class="row">
            <div class="col-md-6 _mb40">
                {{ $case->presentation }}
            </div>
            <div class="col-md-6 _mb40">
                <article class="_max-text">
                    <h3><strong>Клиент</strong></h3>
                    <p>{{ nl2br($case->client) }}</p>
                    <br>
                    <h3><strong>Задача</strong></h3>
                    <p>{{ nl2br($case->task) }}</p>
                    <br>
                    <h3><strong>Решение</strong></h3>
                    <p>{{ nl2br($case->solution) }}</p>
                </article>
            </div>
        </div>
    </section>


    <section class="b-section _no-padding-bottom">
        <div class="text-center">
            <h4 class="_text-blue _mb50">Таким кейсом стоит поделиться с друзьями:</h4>
            <a href="#" class="btn btn-blue _mb20" style="margin: 10px">В фейсбуке</a>
            <a href="#" class="btn btn-blue _mb20" style="margin: 10px">Во вконтакте</a>
        </div>
    </section>




    @if (isset($dic_cases) && is_object($dic_cases) && $dic_cases->count() > 1)
        <section class="b-section _no-padding-bottom">
            <div class="_txt3 _mb50"><b>Другие проекты</b></div>
            <div class="row b-slider _mb20 owl-carousel _small">

                @foreach($dic_cases as $case)
                    <div class="col-sm-4 text-left owl-item">
                        <a class="_block _mb15" href="{{ URL::route('page.case', [$case->id]) }}">
                            @if (isset($case->image) && is_object($case->image))
                                <img src="{{ $case->image->full() }}" alt="{{ $case->name }}">
                            @endif
                        </a>
                        <div class="_txt9 _mb5">{{ $case->command }}</div>
                        <small class="_block">{{ $case->company }}</small>
                    </div>
                @endforeach

            </div>
        </section>
    @endif

@stop


@section('scripts')
@stop