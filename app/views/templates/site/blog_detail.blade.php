<?
/**
 * TITLE: Запись в блоге
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
$route = Route::current();
#dd($route);

$id = $route->getParameter('id');
$record = Dic::valueBySlugAndId('blog', $id, ['fields', 'textfields']);
if (!$record) {
    echo json_encode(['responseType' => 'error', 'responseCode' => 404]);
    return;
}
$record = DicLib::loadImages($record, ['image', 'header_img']);
#Helper::tad($record);

$others_news = Dic::valuesBySlug('blog', function($query) use ($record) {
    $query->where('id', '!=', $record->id);
    $query->orderBy('created_at', 'desc');
    $query->take(5);
}, ['fields', 'textfields']);
$others_news = DicLib::loadImages($others_news, ['image']);
#Helper::tad($others_news);
?>


@section('style')
@stop


@section('content')

    <section class="b-title " style="background-image: url({{ isset($record->header_img) && is_object($record->header_img) ? $record->header_img->full() : '' }});">

        <div class="b-title__logo _invisible">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
        </div>

        <div class="b-title__text">
            <h2 class="_mb25">{{ $record->name }}</h2>
            <i class="_block _mb55"><strong>{{ $record->annotation }}</strong></i>
        </div>

    </section>




    <section class="b-section _no-padding-bottom">
        <div class="row">
            <div class="col-md-8">
                {{ $record->full }}
            </div>
            <div class="col-md-4 sharing-right-block">
                <h3 class="_mb15">Поделиться новостью:</h3>
                <script type="text/javascript" src="//yastatic.net/share/share.js" charset="utf-8"></script>
                <div class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook">
                </div>
            </div>
        </div>
    </section>




    @if (isset($others_news) && is_object($others_news) && $others_news->count())
        <section class="b-section _no-padding-bottom">
            <div class="_txt3 _mb50"><b>Другие новости</b></div>

            <div class="row b-slider _mb20 owl-carousel _small">

                @foreach ($others_news as $entry)
                    <div class="col-sm-4 text-left owl-item">
                        @if (isset($entry->image) && is_object($entry->image))
                            <a class="_block _mb20" href="{{ URL::route('page.blog_detail', [$entry->id]) }}">
                                <img class="_full-width" src="{{ $entry->image->full() }}" alt="{{ $entry->name }}">
                            </a>
                        @endif
                        <h3>{{ $entry->name }}</h3>
                        <div class="_txt9">&nbsp;</div>
                    </div>
                @endforeach

            </div>
        </section>
    @endif

@stop


@section('scripts')
@stop
