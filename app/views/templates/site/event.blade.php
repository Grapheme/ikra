<?
/**
 * TITLE: Событие
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
$route = Route::current();
#dd($route);

$id = $route->getParameter('id');
$event = Dic::valueBySlugAndId('events', $id, ['fields', 'textfields']);
if (!$event) {
    echo json_encode(['responseType' => 'error', 'responseCode' => 404]);
    return;
}
$event = DicLib::loadImages($event, ['image', 'header_img']);
#Helper::tad($event);

$others_events = Dic::valuesBySlug('events', function($query) use ($event) {
    #$query->where('id', '!=', $event->id);
    $query->filter_by_field('date_start', '>=', date('Y-m-d'));
    $query->order_by_field('date_start', 'asc');
    $query->take(5);
}, ['fields', 'textfields']);
$others_events = DicLib::loadImages($others_events, ['image']);
#Helper::tad($others_news);
?>


@section('style')
@stop


@section('content')

    <section class="b-title " style="background-image: url({{ isset($event->header_img) && is_object($event->header_img) ? $event->header_img->full() : '' }});">

        <div class="b-title__logo _invisible">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
        </div>

        <div class="b-title__text">
            <h2 class="_mb25">{{ $event->name }}</h2>
            <i class="_block _mb55"><strong>{{ $event->short }}</strong></i>
        </div>

    </section>




    <section class="b-section">

        <div class="row">
            <div class="col-md-8">
                {{ $event->full }}
            </div>
            <div class="col-md-4">
                <h3 class="_mb15">Поделиться:</h3>
                <a href="#" class="btn btn-blue _mb20" style="margin-right: 40px">В фейсбуке</a>
                <br>
                <a href="#" class="btn btn-blue _mb20">Во вконтакте</a>
            </div>
        </div>
    </section>



    
    <section class="b-section _bg-red">

        <div class="row">
            <a name="form"></a>
            <div class="col-md-6">
                <h2>{{ $event->name }}</h2>
                <div class="h2">{{ $event->price }}</div><br>
                <div class="_txt4 _mb10">
                    @if ($event->date_start)
                        {{ Helper::rdate('j M', $event->date_start) }}
                    @endif
                    @if ($event->date_start < $event->date_stop)
                        &mdash; {{ Helper::rdate('j M', $event->date_stop) }}
                    @endif
                </div><br>
                @if ($event->discounts)
                    <div class="_txt4 _mb20">
                        <a href="#discount" class="collapsed" data-toggle="collapse">
                            Подробности и скидки <i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i>
                        </a>
                    </div>
                    <div class="collapse" id="discount">
                        {{ $event->discounts }}
                    </div>
                @endif
            </div>
            <div class="col-md-4">
                <div class="_mb70"></div>
                <form role="form" class="_white">
                    <div class="form-group _mb20">
                        <input type="text" placeholder="Имя" id="" class="form-control">
                    </div>
                    <div class="form-group _mb20">
                        <input type="email" placeholder="E-mail" id="" class="form-control">
                    </div>
                    <div class="form-group _mb50">
                        <input type="text" placeholder="Телефон" id="" class="form-control">
                    </div>
                    <button class="btn btn-white btn-wide" type="submit">Записаться</button>
                </form>
            </div>
        </div>

    </section>


    

    @if (isset($others_events) && is_object($others_events) && $others_events->count())
        <section class="b-section _no-padding-bottom">
            <div class="_txt3 _mb50"><b>Другие события</b></div>

            <div class="row b-slider _mb20 owl-carousel _small">

                @foreach ($others_events as $other_event)
                    <?
                    if ($other_event->id == $event->id)
                        continue;
                    ?>
                    <div class="col-sm-4 text-left owl-item">
                        <a class="_block _mb20" href="{{ URL::route('page.event', [$other_event->id]) }}">
                            @if (isset($other_event->image) && is_object($other_event->image))
                                <img class="_full-width" src="{{ $other_event->image->full() }}" alt="{{ $other_event->name }}">
                            @endif
                            <h3>{{ $other_event->name }}</h3>
                        </a>
                        <div class="_txt9">&nbsp;</div>
                    </div>
                @endforeach

            </div>
        </section>
    @endif

@stop


@section('scripts')
@stop
