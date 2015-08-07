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
