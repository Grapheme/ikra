<section class="b-section _no-padding-bottom">
    <h2>{{ $text }}</h2>

    <div class="row _mb30">

        <div class="b-about__col col-md-4">
            <div class="b-about__top">
                <h4 class="_mb30">
                    {{ $short }}
                </h4>
            </div>
        </div>
        <div class="b-about__col col-md-4">
            <div class="b-about__top">
                <div class="b-about__top">
                    <div class="text-left _mb30"><img src="{{ Config::get('site.theme_path') }}/img/bg/oralo.jpg" height="87" width="82" alt=""></div>
                </div>
            </div>
        </div>
        <div class="b-about__col col-md-8">
            <div class="b-about__top two-columns">
                <article>
                    <p>
                        {{ $full }}
                    </p>
                </article>
            </div>
        </div>


        <div class="b-about__col col-md-4 lips-image">
            <img src="{{ Config::get('site.theme_path') }}/img/bg/lips.png"  alt="">
        </div>
    </div>
</section>