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
?>


@section('style')
@stop


@section('content')

    <section class="b-title">

        <div class="b-title__logo">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" alt="ИКРА IKRA">
        </div>

        <div class="b-title__text">
            <h1>Об Икре</h1>
        </div>

    </section>


    <section class="b-section _no-padding-bottom">
        <h2>Наши направления</h2>

        <ul class="b-about__directions row text-center">
            <li class="col-sm-6 col-md-4">
                <a class="collapsed" data-toggle="collapse" href="#about_str">
                    <span class="_mb35"> <img src="{{ Config::get('site.theme_path') }}/img/icon/directions/str.png" alt=""> </span>
					<span class="_txt4 _mb20 _text-yellow">
						<b>
							<span class="_nowrap">
								Стратегия&nbsp;<i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i>
                </a>
                </b>
                </span>
                </a>
                <p id="about_str" class="collapse">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam ea cumque, magnam enim. Fugit adipisci temporibus doloremque officiis doloribus accusantium inventore iste nesciunt sit necessitatibus, obcaecati, enim minima praesentium. Similique.</p>
            </li>
            <li class="col-sm-6 col-md-4">
                <a class="collapsed" data-toggle="collapse" href="#about_cre">
                    <span class="_mb35"> <img src="{{ Config::get('site.theme_path') }}/img/icon/directions/cre.png" alt=""> </span>
					<span class="_txt4 _mb20 _text-violet">
						<b>
							<span class="_nowrap">
								Креатив&nbsp;<i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i>
							</span>
                        </b>
					</span>
                </a>
                <p id="about_cre" class="collapse">Описание</p>
            </li>
            <li class="col-sm-6 col-md-4">
                <a class="collapsed" data-toggle="collapse" href="#about_art">
                    <span class="_mb35"> <img src="{{ Config::get('site.theme_path') }}/img/icon/directions/art.png" alt=""> </span>
					<span class="_txt4 _mb20 _text-blue">
						<b>
							<span class="_nowrap">
								Арт-дирекшн&nbsp;<i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i>
                </a>
                </b>
                </span>
                </a>
                <p id="about_art" class="collapse">Описание</p>
            </li>
            <li class="col-sm-6 col-md-4">
                <a class="collapsed" data-toggle="collapse" href="#about_pro">
                    <span class="_mb35"> <img src="{{ Config::get('site.theme_path') }}/img/icon/directions/pro.png" alt=""> </span>
					<span class="_txt4 _mb20 _text-cyan">
						<b>
							<span class="_nowrap">
								Продюсирование&nbsp;<i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i>
                </a>
                </b>
                </span>
                </a>
                <p id="about_pro" class="collapse">Описание. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, possimus amet quod ab nesciunt modi sit eius eos a dolores ullam rem reprehenderit magnam consequatur porro qui pariatur delectus provident.</p>
            </li>
            <li class="col-sm-6 col-md-4">
                <a class="collapsed" data-toggle="collapse" href="#about_med">
                    <span class="_mb35"> <img src="{{ Config::get('site.theme_path') }}/img/icon/directions/med.png" alt=""> </span>
					<span class="_txt4 _mb20 _text-purple">
						<b>
							<span class="_nowrap">
								Медиа&nbsp;<i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i>
                </a>
                </b>
                </span>
                </a>
                <p id="about_med" class="collapse">Описание</p>
            </li>
            <li class="col-sm-6 col-md-4">
                <a class="collapsed" data-toggle="collapse" href="#about_man">
                    <span class="_mb35"> <img src="{{ Config::get('site.theme_path') }}/img/icon/directions/man.png" alt=""> </span>
					<span class="_txt4 _mb20 _text-green">
						<b>
							<span class="_nowrap">
								Менеджмент&nbsp;<i class="fa fa-caret-down"></i><i class="fa fa-caret-up"></i>
                </a>
                </b>
                </span>
                </a>
                <p id="about_man" class="collapse">Описание</p>
            </li>
        </ul>
    </section>



    <section class="b-section _no-padding-bottom">
        <h2>О школе</h2>

        <div class="row _mb30">
            <div class="b-about__col col-md-4">
                <div class="b-about__top">
                    <h4 class="_mb30">Икра - это школа интерактивных коммуникаций в рекламе</h4>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam explicabo atque sunt provident ea eum veniam ipsam quibusdam vitae consequatur possimus placeat laborum amet, aliquid, culpa qui magnam ducimus eaque.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam ullam facilis eveniet, animi, numquam magni maxime consectetur autem quod impedit modi odio, maiores optio quisquam saepe ab aliquid deserunt necessitatibus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut minima officiis molestias magnam placeat rerum ipsum ullam repellendus delectus esse. Saepe quae accusantium nam blanditiis consectetur odio, voluptatum maxime cumque.</p>
            </div>
            <div class="b-about__col col-md-4">
                <div class="b-about__top">
                    <div class="text-left _mb30"><img src="{{ Config::get('site.theme_path') }}/img/bg/oralo.jpg" height="87" width="82" alt=""></div>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam explicabo atque sunt provident ea eum veniam ipsam quibusdam vitae consequatur possimus placeat laborum amet, aliquid, culpa qui magnam ducimus eaque.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quibusdam ullam facilis eveniet, animi, numquam magni maxime consectetur autem quod impedit modi odio, maiores optio quisquam saepe ab aliquid deserunt necessitatibus!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut minima officiis molestias magnam placeat rerum ipsum ullam repellendus delectus esse. Saepe quae accusantium nam blanditiis consectetur odio, voluptatum maxime cumque.</p>
            </div>
            <div class="b-about__col col-md-4">
                <img src="{{ Config::get('site.theme_path') }}/img/bg/lips.png"  alt="">
            </div>
        </div>
    </section>

    <section class="b-section">
        <div class="_txt3 text-center _mb40"><b>Школа предлагает четыре типа курсов</b></div>

        <ul class="b-about__course-list row">
            <li class="col-md-3">
                <h3 class="text-center _text-red _mb20"><strong>Основной курс</strong></h3>
                <div class="b-about__course-text">
                    <p class="_mb20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque temporibus eligendi sint quisquam a quas, delectus expedita iusto cupiditate laudantium cumque molestias numquam blanditiis voluptatem aut aperiam, rerum iure aliquid.</p>
                    <b>Средняя продолжительность &mdash; <br>3 месяца</b>
                </div>
            </li>
            <li class="col-md-3">
                <h3 class="text-center _text-red _mb20"><strong>Левел-ап</strong></h3>
                <div class="b-about__course-text">
                    <p class="_mb20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum harum temporibus optio eos quo doloremque reprehenderit, iure pariatur itaque iusto minima. Labore pariatur nisi repudiandae ea, nemo doloribus nostrum impedit.</p>
                    <b>Средняя продолжительность &mdash; <br>3 месяца</b>
                </div>
            </li>
            <li class="col-md-3">
                <h3 class="text-center _text-red _mb20"><strong>Интенсив</strong></h3>
                <div class="b-about__course-text">
                    <p class="_mb20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet id inventore reiciendis illo, earum voluptate et tenetur ad impedit ea! Tempore iusto, eaque in quis inventore ratione quam ipsum quaerat.</p>
                    <b>Средняя продолжительность &mdash; <br>3 месяца</b>
                </div>
            </li>
            <li class="col-md-3">
                <h3 class="text-center _text-red _mb20"><strong>Выездной кампус</strong></h3>
                <div class="b-about__course-text">
                    <p class="_mb20">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores iusto sunt tempore eius excepturi minus quidem itaque unde laudantium non illo harum nam officiis, incidunt modi possimus minima vel? Adipisci?</p>
                    <b>Средняя продолжительность &mdash; <br>3 месяца</b>
                </div>
            </li>
        </ul>
    </section>






    <section class="b-section _bg-blue">
        <div class="_vertical-center">
            <div>
                <h2 class="_cta">
                    Сегодня отличный день попробовать что-то новое!
                </h2>
                <br><br>
                <span class="_text-blue"><a href="#" class="btn btn-white">Записаться на курс</a></span>
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
                    Хотите узнать поподробнее о нашей <span class="_text-yellow"><a href="#cta_form" data-toggle="collapse">методологии</a>?
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





    <section class="b-section">
        <h2>Наши партнеры</h2>

        <div class="b-slider owl-carousel">
            <div class="owl-item"><a href="#" class=""><img src="{{ Config::get('site.theme_path') }}/img/content/partners/1.png" alt=""></a></div>
            <div class="owl-item"><a href="#" class=""><img src="{{ Config::get('site.theme_path') }}/img/content/partners/2.png" alt=""></a></div>
            <div class="owl-item"><a href="#" class=""><img src="{{ Config::get('site.theme_path') }}/img/content/partners/3.png" alt=""></a></div>
            <div class="owl-item"><a href="#" class=""><img src="{{ Config::get('site.theme_path') }}/img/content/partners/1.png" alt=""></a></div>
            <div class="owl-item"><a href="#" class=""><img src="{{ Config::get('site.theme_path') }}/img/content/partners/3.png" alt=""></a></div>
        </div>

    </section>

    <section class="b-section">
        <h2>Наши клиенты</h2>

        <div class="b-slider _mb20 owl-carousel">
            <div class="owl-item"><a href="#" class=""><img src="{{ Config::get('site.theme_path') }}/img/content/clients/1.png" alt=""></a></div>
            <div class="owl-item"><a href="#" class=""><img src="{{ Config::get('site.theme_path') }}/img/content/clients/2.png" alt=""></a></div>
            <div class="owl-item"><a href="#" class=""><img src="{{ Config::get('site.theme_path') }}/img/content/clients/3.png" alt=""></a></div>
            <div class="owl-item"><a href="#" class=""><img src="{{ Config::get('site.theme_path') }}/img/content/clients/4.png" alt=""></a></div>
            <div class="owl-item"><a href="#" class=""><img src="{{ Config::get('site.theme_path') }}/img/content/clients/5.png" alt=""></a></div>
        </div>
    </section>


@stop


@section('scripts')
@stop