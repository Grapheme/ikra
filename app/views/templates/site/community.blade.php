<?
/**
 * TITLE: Сообщество
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php

##
## Instagram Photos
##
$instagram_cache_key = 'instagram_data';
$media = null;
#Cache::forget($instagram_cache_key);
if (Cache::has($instagram_cache_key)) {

    $media = Cache::get($instagram_cache_key);

} else {

    $instagram = new MetzWeb\Instagram\Instagram(Config::get('site.instagram.api'));

    $result = $instagram->searchUser(Config::get('site.instagram.account_name'), 1);
    $account_id = $result->data[0]->id;
    #$account_id = Config::get('site.instagram.account_id');
    #dd($account_id);

    $result = $instagram->getUserMedia($account_id, 5);
    #Helper::dd($result);
    if (isset($result) && is_object($result) && $result->meta->code == 200) {
        $media = $result->data;
        Cache::add($instagram_cache_key, $media, 15);
    }
}
#Helper::dd($media);

##
## Paginator Set Current Page - It is WORK!!
## http://stackoverflow.com/questions/17386641/specify-a-page-for-pagination-laravel-4
##
$current_page = Input::get('tab') == 'blog' ? Input::get('page') : 1;
Paginator::setCurrentPage($current_page);
$blogs = Dic::valuesBySlug('blog', function($query){
    $query->orderBy('created_at', 'desc');
}, ['fields', 'textfields'], true, true, true, 1);
$blogs = DicLib::loadImages($blogs, ['image']);
#Helper::tad($blogs);
#dd($blogs);

$current_page = Input::get('tab') == 'events' ? Input::get('page') : 1;
Paginator::setCurrentPage($current_page);
$events = Dic::valuesBySlug('events', function($query) use ($current_city) {
    $query->filter_by_field('city_id', '=', $current_city->id);
    $query->filter_by_field('date_start', '>=', date('Y-m-d'));
    $query->order_by_field('date_start', 'asc');
}, ['fields', 'textfields'], true, true, true, 1);
$events = DicLib::loadImages($events, ['image']);
#Helper::tad($events);
#dd($events);

Paginator::setCurrentPage(1);

$current_tab = 'blog';
if (Input::get('tab') == 'events')
    $current_tab = Input::get('tab');
elseif (Input::get('tab') == 'social')
    $current_tab = Input::get('tab');
?>


@section('style')
@stop


@section('content')

    <section class="b-title _short">

        <div class="b-title__logo">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" alt="ИКРА IKRA">
        </div>

        <h2 class="b-title__text">
            Сообщество
        </h2>

    </section>



    {{--Instagram Photos--}}
    @if (isset($media) && is_array($media) && count($media))
        <ul class="b-social__photos _block-nowrap">
            @foreach ($media as $post)
                <li><a href="{{ $post->link }}" target="_blank"><img src="{{ $post->images->standard_resolution->url }}" alt="{{ $post->caption->text }}"></a></li>
            @endforeach
        </ul>
    @endif



    <section class="b-section _no-padding-bottom">

        <ul class="row _mb40 text-center" id="tabs-head">
            <li class="col-sm-4 _mb30{{ $current_tab == 'blog' ? ' _text-red' : '' }}">
                <h3><a href="#blog">Блог</a></h3>
            </li>
            <li class="col-sm-4 _mb30{{ $current_tab == 'events' ? ' _text-red' : '' }}">
                <h3><a href="#events">События</a></h3>
            </li>
            <li class="col-sm-4 _mb30{{ $current_tab == 'social' ? ' _text-red' : '' }}">
                <h3><a href="#social">Социальные сети</a></h3>
            </li>
        </ul>


        {{-- BLOG --}}
        
        <div id="tabs-holder">
            @if (isset($blogs) && is_object($blogs) && $blogs->count())
                <div class="tab_blog" id="tab_blog" data-name="blog">

                    <ul class="row">
                        @foreach ($blogs as $blog)
                            <li class="col-sm-4 _mb80 blog-teaser" data-equalheight>
                                @if (isset($blog->image) && is_object($blog->image))
                                    <a class="_block _mb30 blog-readmore" style="background-image: url({{ $blog->image->full() }});" href="{{ URL::route('page.blog_detail', [$blog->id]) }}">
                                        <div class="decor-block"></div>
                                        <h3>{{ $blog->name }}</h3>
                                        <p class="_mb30 annotation">
                                            {{ $blog->annotation }}
                                        </p>
                                    </a>
                                @endif
                                <p class="_mb30">
                                    {{ $blog->short }}
                                </p>
                                <div class="text-right">
                                    <a href="{{ URL::route('page.blog_detail', [$blog->id]) }}" class="btn btn-readmore">Читать полностью</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    {{ $blogs->appends(['tab' => 'blog'])->fragment('blog')->links() }}

                </div>
            @endif


            {{-- EVENTS --}}

            @if (isset($events) && is_object($events) && $events->count())
                <div class="tab_events" id="tab_events" data-name="events">

                    <ul class="row">
                        @foreach ($events as $event)
                            <li class="col-sm-4 _mb80 event-teaser" data-equalheight>
                                @if (isset($event->image) && is_object($event->image))
                                    <a class="_block _mb30 event-readmore" style="background-image: url({{ $event->image->full() }});" href="{{ URL::route('page.event', [$event->id]) }}">
                                        <div class="decor-block"></div>
                                        <p class="h3">
                                            {{ $event->name }}
                                        </p>
                                        <time class="h5">
                                            @if ($event->date_start)
                                                {{ Helper::rdate('j M', $event->date_start) }}
                                            @endif
                                            @if ($event->date_start < $event->date_stop)
                                                &mdash;<br>{{ Helper::rdate('j M', $event->date_stop) }}
                                            @endif
                                        </time>
                                    </a>
                                @endif
                                <p class="_mb30">
                                    {{ $event->short }}
                                </p>
                                <div class="text-right">
                                    <a href="{{ URL::route('page.event', [$event->id]) }}#form" class="btn btn-blue">Записаться</a>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                    {{ $events->appends(['tab' => 'events'])->fragment('events')->links() }}

                </div>
            @endif

            {{-- SOCIAL --}}

            @if (isset($dic_city) && is_object($dic_city) && $dic_city->count())
                <div class="row b-community__social tab_social" id="tab_social" data-name="social">
                    @foreach ($dic_city as $city)
                        <li class="col-sm-3">
                            <div class="_txt4 _text-red _mb40"><b>Икра {{ $city->name }}</b></div>
                            <div class="b-social">
                                @if ($city->fb_link)
                                    <a class="_facebook" href="{{ $city->fb_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if ($city->vk_link)
                                    <a class="_vkontakte" href="{{ $city->vk_link }}" target="_blank"><i class="fa fa-vk"></i></a>
                                @endif
                                @if ($city->ig_link)
                                    <a class="_instagram" href="{{ $city->ig_link }}" target="_blank"><i class="fa fa-instagram"></i></a>
                                @endif
                                @if ($city->tw_link)
                                    <a class="_twitter" href="{{ $city->tw_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
                                @endif
                                @if ($city->yt_link)
                                    <a class="_youtube" href="{{ $city->yt_link }}" target="_blank"><i class="fa fa-youtube"></i></a>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

@stop


@section('scripts')
@stop
