<?
if ($image && null !== ($temp = Photo::find($image)) && is_object($temp))
    $image = $temp;
?>

<section class="b-title" style="background-image: url({{ $image->full() }});">

    <div class="b-title__logo _invisible">
        <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" height="102" width="129" alt="ИКРА IKRA">
    </div>

    <div class="b-title__text">
        <h2>{{ $text }}</h2>
        <i class="_text-yellow"><strong>{{ $short }}</strong></i>
    </div>

</section>
