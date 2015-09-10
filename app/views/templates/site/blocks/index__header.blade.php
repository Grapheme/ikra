<?
if ($image && null !== ($temp = Photo::find($image)) && is_object($temp))
    $image = $temp;
?>

<section class="b-title _long _invert" style="background-image: url({{ $image->full() }});">

    <div class="b-title__logo _invisible">
        <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" alt="ИКРА IKRA">
    </div>

    <div class="b-title__text">
        <h1 class="_mb30">{{ $current_city->name }}</h1>
        <i><strong>{{ $current_city->address }}</strong></i>
    </div>

</section>




<section class="b-title _long _violet overflown-head">
    <!-- <div class="video-bg-holder">
            <video class="video-bg" autoplay="" loop="">
                <source src="{{ Config::get('site.theme_path') }}/video/ikra.mp4" type="video/mp4">
            </video>
        </div> -->
    <div class="b-title__logo">
        <img src="theme/site/img/logo/logo.png" height="102" width="129" alt="ИКРА IKRA">
    </div>

    <div class="b-title__text">
        <div class="h2 _mb40">Икра &mdash; школа интерактивных коммуникаций</div>
        <div class="_mb40 _max-text _margin-auto">
            <i>Мы фокусируемся на творческом и стратегическом мышлении и помогаем нашим выпускникам находить себя в любимой профессии</i>
        </div>
        <div class="professions-slider">
            @if (isset($dic_professions) && is_object($dic_professions) && $dic_professions->count())
                @foreach ($dic_professions as $profession)
                    <div class="h2 sliding-profession pro-transformRight">{{ $profession->name }}</div>
                @endforeach
            @endif
        </div>
    </div>
</section>