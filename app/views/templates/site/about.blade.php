<?
/**
 * TITLE: О нас
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
#$temp = Dic::valueBySlugAndId('equipments', 1);
#Helper::ta($temp);
#Helper::tad($dic_direction);
#Helper::ta($page);
#echo $page->block('about');
#die;
?>


@section('style')
@stop


@section('content')

    <section class="b-title">

        <div class="b-title__logo">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" alt="ИКРА IKRA">
        </div>

        <div class="b-title__text">
            <h1>{{ $page->h1_or_name() }}</h1>
        </div>

    </section>


    <section class="b-section _no-padding-bottom">
        <h2>Наши направления</h2>

        @if (isset($dic_direction) && is_object($dic_direction) && $dic_direction->count())

            <ul class="b-about__directions row text-center">

                @foreach ($dic_direction as $direction)

                    <li class="col-sm-6 col-md-4">
                        <a class="collapsed" data-toggle="collapse" href="#about_{{ $direction->slug }}">
                            <span class="_mb35">
                                @if (is_object($direction->image))
                                    <img src="{{ $direction->image->thumb()  }}" alt="">
                                @endif
                            </span>
        					<span class="_txt4 _mb20" style="color: {{ $direction->color }}">
		        				<b>
				        			<span class="_nowrap">
						        		{{ $direction->name }}&nbsp;<i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i>
                                    </span>
                                </b>
                            </span>
                        </a>
                        <p id="about_{{ $direction->slug }}" class="collapse">
                            {{ nl2br($direction->short) }}
                        </p>
                    </li>
                @endforeach

            </ul>

        @endif

    </section>




    {{ $page->block('about') }}



    @if (isset($dic_type) && is_object($dic_type) && $dic_type->count())
        <section class="b-section">
            <div class="_txt3 text-center _mb40"><b>Школа предлагает четыре типа курсов</b></div>

            <ul class="b-about__course-list row">
                @foreach ($dic_type as $type)
                    <li class="col-md-3">
                        <h3 class="text-center _text-red _mb20"><strong>{{ $type->name }}</strong></h3>
                        <div class="b-about__course-text">
                            <p class="_mb20">{{ $type->short }}</p>
                            <b>{{ $type->howlong }}</b>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
    @endif




    <section class="b-section _bg-blue">
        <div class="_vertical-center">
            <div>
                <h2 class="_cta">
                    Сегодня отличный день попробовать что-то новое!
                </h2>
                <br><br>
                <span class="_text-blue"><a href="{{ URL::route('page.courses', [$current_city->slug]) }}" class="btn btn-white">Записаться на курс</a></span>
            </div>
        </div>
    </section>




    <section class="b-section">
        <h2>Как мы учим</h2>

        <div class="b-about__how row _mb70">
            <div class="col-md-4 _mb20"><i>На ИКРе мы переосмыслили подход к обучению. Каждый наш преподаватель &mdash; это дизайнер опыта, а занятие &mdash; это событие, из которого студент выносит какой-то опыт.</i></div>
            <div class="col-md-4 _mb20"><i>Rerum esse, animi vero autem recusandae illo alias doloribus, consequuntur quam a, adipisci ut at eos illum, dolorem! Consequuntur vel, voluptatum alias?</i></div>
            <div class="col-md-4 _mb20"><img src="{{ Config::get('site.theme_path') }}/img/bg/spaceman.jpg" height="222" width="193" alt=""></div>
        </div>

        <ul class="b-about__step-list row text-center">
            <li class="col-md-4">
                <div class="b-about__step-caption _vertical-center"><span class="_txt7 _text-red">Мы даём вам совершить ошибку на&nbsp;практике</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <div class="b-about__step-name"><span class="_txt7 _text-red">Шаг 1. Ошибка</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <b>Зачем?</b>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam doloremque atque autem quam ab. Architecto voluptates dignissimos quis corrupti eveniet, natus fuga asperiores repellat at! Odio ut, mollitia voluptas recusandae!</p>
                <b>Что в итоге?</b>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae ipsam laborum sint, repudiandae magnam quae? Nam excepturi, quae eaque voluptas numquam commodi sed omnis aspernatur, voluptate, minima doloremque facere odit.</p>
            </li>
            <li class="col-md-4">
                <div class="b-about__step-caption _vertical-center"><span class="_txt7 _text-red">С помощью преподавателя и его теоретического материала вы исправляете ошибку</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <div class="b-about__step-name"><span class="_txt7 _text-red">Шаг 2. Теория</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <b>Зачем?</b>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam doloremque atque autem quam ab. Architecto voluptates dignissimos quis corrupti eveniet, natus fuga asperiores repellat at! Odio ut, mollitia voluptas recusandae!</p>
                <b>Что в итоге?</b>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae ipsam laborum sint, repudiandae magnam quae? Nam excepturi, quae eaque voluptas numquam commodi sed omnis aspernatur, voluptate, minima doloremque facere odit.</p>
            </li>
            <li class="col-md-4">
                <div class="b-about__step-caption _vertical-center"><span class="_txt7 _text-red">Фиксируем результаты с помощью повторного практического задания</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <div class="b-about__step-name"><span class="_txt7 _text-red">Шаг 3. Практика</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <b>Зачем?</b>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam doloremque atque autem quam ab. Architecto voluptates dignissimos quis corrupti eveniet, natus fuga asperiores repellat at! Odio ut, mollitia voluptas recusandae!</p>
                <b>Что в итоге?</b>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae ipsam laborum sint, repudiandae magnam quae? Nam excepturi, quae eaque voluptas numquam commodi sed omnis aspernatur, voluptate, minima doloremque facere odit.</p>
            </li>
        </ul>

    </section>




    <section class="b-section _bg-blue">
        <div class="_vertical-center">
            <div>
                <h2 class="_cta">
                    Хотите узнать поподробнее о нашей <span class="_text-yellow"><a href="{{ Config::get('app.settings.content.metodology_link') }}" target="_blank">методологии</a>?
                </h2>
                <br><br>
                <span class="_text-blue"><a href="#cta_form" data-toggle="collapse" class="btn">Да!</a></span>
            </div>
        </div>

        <div id="cta_form" class="collapse">
            <br>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form role="form" class="_white">
                        <div class="form-group _mb20">
                            <input type="text" class="form-control" id="" placeholder="Имя">
                        </div>
                        <div class="form-group _mb20">
                            <input type="email" class="form-control" id="" placeholder="E-mail">
                        </div>
                        <div class="form-group _mb50">
                            <input type="text" class="form-control" id="" placeholder="Телефон">
                        </div>
                        <button type="submit" class="btn btn-wide">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </section>




    @if (isset($dic_partners) && is_object($dic_partners) && $dic_partners->count())
        <section class="b-section">
            <h2>Наши партнеры</h2>

            <div class="b-slider _mb20 owl-carousel">
                @foreach ($dic_partners as $client)
                    <?php
                    if (!is_object($client->logo))
                        continue;
                    ?>
                    <div class="owl-item">
                        <a href="{{ $client->url }}" class="" target="_blank">
                            <img src="{{ $client->logo->thumb() }}" alt="{{ $client->name }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif




    @if (isset($dic_clients) && is_object($dic_clients) && $dic_clients->count())
        <section class="b-section">
            <h2>Наши клиенты</h2>

            <div class="b-slider _mb20 owl-carousel">
                @foreach ($dic_clients as $client)
                    <?php
                    if (!is_object($client->logo))
                        continue;
                    ?>
                    <div class="owl-item">
                        <a href="{{ $client->url }}" class="" target="_blank">
                            <img src="{{ $client->logo->thumb() }}" alt="{{ $client->name }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

@stop


@section('scripts')
@stop