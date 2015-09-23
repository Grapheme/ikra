<?
/**
 * TITLE: Корпоративным клиентам
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
#$cases = Dic::valuesBySlug('cases', function() {}, ['fields', 'textfields']);
?>


@section('style')
@stop


@section('content')

    <section class="b-title _short">
        <div class="b-title__logo">
            <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-top.png" alt="ИКРА IKRA">
        </div>

        <div class="b-title__text">
            <h2 class="_mb30">Мы обучаем ваших сотрудников</h2>
            <i><strong>и проводим консалтинг <br>в сфере коммуникаций для компании</strong></i>
        </div>
    </section>




    <section class="b-section">
        <h4 class="text-center _mb50">индивидуальные программы под каждую из ваших задач</h4>
        <article>
            <div class="row">
                <div class="col-md-3">
                    <ul class="_check-list">
                        <li>построение работы отдела, связанного с коммуникациями;</li>
                        <li>повышение уровня креативности сотрудников;</li>
                    </ul>
                </div>
                <div class="col-md-3 col-md-push-1">
                    <ul class="_check-list">
                        <li>структурирование работы региональных подразделений, связанных с коммуникациями;</li>
                        <li>повышение инициативности сотрудников;</li>
                    </ul>
                </div>
                <div class="col-md-3 col-md-push-2">
                    <ul class="_check-list">
                        <li>повышение профессионального уровня сотрудников в сфере коммуникации;</li>
                        <li>и многое другое.</li>
                    </ul>
                </div>
            </div>
        </article>
    </section>




    <section class="b-section _no-padding-bottom">
        <h2>Наш подход</h2>

        <div class="row _mb50">
            <div class="col-md-4 _mb10">
                <div class="b-icon-title">
                    <img src="{{ Config::get('site.theme_path') }}/img/icon/directions/corp.png" alt="">
				<span class="_txt4">
					<b>
                        Постановка задачи клиентом
                    </b>
				</span>
                </div>
            </div>
            <div class="col-md-4 col-md-push-1">
                <p>После постановки задачи мы исследуем область знаний, с которой эта задача связана.</p>
            </div>
        </div>

        <div class="row _mb50">
            <div class="col-md-4 _mb10">
                <div class="b-icon-title">
                    <img src="{{ Config::get('site.theme_path') }}/img/icon/directions/corp.png" alt="">
				<span class="_txt4">
					<b>
                        Исследование области знаний
                    </b>
				</span>
                </div>
            </div>
            <div class="col-md-4 col-md-push-1">
                <p>Определившись с основными направлениями деятельности, анкетируем сотрудников и руководство для выявления скрытых потребностей и проблем.</p>
            </div>
        </div>

        <div class="row _mb50">
            <div class="col-md-4 _mb10">
                <div class="b-icon-title">
                    <img src="{{ Config::get('site.theme_path') }}/img/icon/directions/corp.png" alt="">
				<span class="_txt4">
					<b>
                        Аудит деятельности компании
                    </b>
				</span>
                </div>
            </div>
            <div class="col-md-4 col-md-push-1">
                <p>Проводим серию мероприятий (обучение, консалтинг, супервайзинг) для решения поставленной задачи.</p>
            </div>
        </div>

        <div class="row _mb50">
            <div class="col-md-4 _mb10">
                <div class="b-icon-title">
                    <img src="{{ Config::get('site.theme_path') }}/img/icon/directions/corp.png" alt="">
				<span class="_txt4">
					<b>
                        Комплекс мероприятий, решающих поставленную задачу
                    </b>
				</span>
                </div>
            </div>
            <div class="col-md-4 col-md-push-1">
                <p>Готовим пул необходимых дополнительных методических материалов.</p>
            </div>
        </div>

    </section>




    <section class="b-section _no-padding-bottom">
        <h2>Наши компетенции</h2>

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




    <section class="b-section _bg-cyan" style="display:none;">
        <h2>Преподаватели Икры</h2>

        <div class="row b-corp__teachers">
            <div class="col-md-4 _mb50">
                <div class="_txt4 _mb30"><b>Специалист</b></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, possimus, unde! Reprehenderit est repudiandae facere, culpa nisi. Ea harum cumque ut, blanditiis quae nam dolores ipsam quidem deleniti corporis. Atque.</p>
            </div>
            <div class="col-md-4 _mb50">
                <div class="_txt4 _mb30"><b>Спикер</b></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, possimus, unde! Reprehenderit est repudiandae facere, culpa nisi. Ea harum cumque ut, blanditiis quae nam dolores ipsam quidem deleniti corporis. Atque.</p>
            </div>
            <div class="col-md-4 _mb50">
                <div class="_txt4 _mb30"><b>Преподаватель Икры</b></div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, possimus, unde! Reprehenderit est repudiandae facere, culpa nisi. Ea harum cumque ut, blanditiis quae nam dolores ipsam quidem deleniti corporis. Atque.</p>
            </div>
        </div>

    </section>





    <section class="b-section">
        <h2>Как мы учим</h2>

        <div class="b-about__how row _mb70">
            <div class="col-md-4 _mb20"><i>Мы выгодно отличаемся тем, что мы не скучные. Рожденные в digital, мы подошли к образовательному процессу исключительно интерактивно. Большинство наших занятий переведено в индуктивный формат (от практики к ошибке и теории). Все занятия построены на постоянных экспериментах и последующей рефлексии. Мы представляем каждое занятие как игру, в рамках которой мы выстраиваем опыт наших участников: опыт сопереживания, сплочения, сосредоточения, любви или негодования. Эмоциональный опыт позволяет сопереживать материалу и легче его запоминать.</i></div>
            <div class="col-md-4 _mb20"><i>В рамках нашей методологии мы также разработали систему креативного мышления CRAFT, которая базируется на понятии социальных форм большой идеи и ролевого моделирования сообществ. Однако, мы с одинаковым рвением развиваем направления латерального мышления, дизайн-мышления и ТРИЗа в рамках креативного направления ИКРЫ.<br>Каждый сезон наши программы дополняются новыми актуальными методиками и знаниями, так как мы не ограничены базовыми дисциплинами, а изменения в контенте диктует контекст бизнеса и востребованность на реальном конкурентном рынке.</i></div>
            <div class="col-md-4 _mb20"><img class="astronaut" src="{{ Config::get('site.theme_path') }}/img/bg/spaceman.jpg" height="222" width="193" alt=""></div>
        </div>

        <ul class="b-about__step-list row text-center">
            <li class="col-md-4">
                <div class="b-about__step-caption _vertical-center"><span class="_txt7 _text-red">Мы даём вам совершить ошибку на&nbsp;практике</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <div class="b-about__step-name"><span class="_txt7 _text-red">Шаг 1. Ошибка</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <b>Зачем?</b>
                <p>Потому что нужно вызвать сопереживание материалу и вся телега на пару предложений.</p>
                <b>Что в итоге?</b>
                <p>Студент анализирует собственные ошибки и стремиться их исправить, то есть готов к получению теоретических знаний.</p>
            </li>
            <li class="col-md-4">
                <div class="b-about__step-caption _vertical-center"><span class="_txt7 _text-red">С помощью преподавателя и его теоретического материала вы исправляете ошибку</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <div class="b-about__step-name"><span class="_txt7 _text-red">Шаг 2. Теория</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <b>Зачем?</b>
                <p>В наших занятиях теории всего 30-35%. Все знания можно получить на практике, но тем не менее структурный материал очень важен и вот это все.</p>
                <b>Что в итоге?</b>
                <p>Теория накладывается на ваш анализ собственных ошибок и делает вас готов броситься в бой и блестяще выполнить практическое задание второй раз.</p>
            </li>
            <li class="col-md-4">
                <div class="b-about__step-caption _vertical-center"><span class="_txt7 _text-red">Фиксируем результаты с помощью повторного практического задания</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <div class="b-about__step-name"><span class="_txt7 _text-red">Шаг 3. Практика</span></div>
                <img src="{{ Config::get('site.theme_path') }}/img/bg/arrow-down.png" alt="">
                <b>Зачем?</b>
                <p>Только после закрепления практического алгоритма выдается системное видение всего пройденного процесса. Благодаря предыдущим двум пунктам усвоение материала происходит во много раз быстрее, ведь присутствует сопереживание со стороны студента, и теория обретает практический смысл.</p>
                <b>Что в итоге?</b>
                <p>Результатом теоретического блока является обоснование и аргументация ранее пройденной практики, а также финальная систематизация изучаемого предмета.</p>
            </li>
        </ul>

    </section>



    <section class="b-section _bg-blue">
        <div class="_vertical-center">
            <div>
                <h2 class="_cta">
                    Хотите узнать поподробнее о нашей <span class="_text-yellow"><a href="{{ Config::get('app.settings.content.metodology_link') }}" target="_blank">методологии</a>?</span>
                </h2>
                <br><br>
                <span class="_text-blue"><a href="#cta_form" data-toggle="collapse" class="btn">Да!</a></span>
            </div>
        </div>
    </section>




    @if (isset($dic_cases) && is_object($dic_cases) && $dic_cases->count())
        <section class="b-section">
            <h2>Мы это сделали</h2>

            <div class="row b-slider _mb20 owl-carousel _large">

                @foreach ($dic_cases as $case)
                    <div class="col-sm-4 text-left owl-item">
                        <a class="_block _mb20" href="{{ URL::route('page.case', [$case->id]) }}">
                            @if (isset($case->image) && is_object($case->image))
                                <img src="{{ $case->image->full() }}" alt="{{ $case->name }}">
                            @endif
                        </a>
                        <h3 class="_mb5">{{ $case->company }}</h3>
                        <small class="_block _mb10">{{ $case->annotation }}</small>
                    </div>
                @endforeach

            </div>
        </section>
    @endif




    @if (isset($dic_reviews) && is_object($dic_reviews) && $dic_reviews->count() && false)
        <section class="b-section">
            <h2>Отзывы</h2>
            <ul class="row">
               @foreach($dic_reviews as $review)
                    <li class="b-textroll col-md-6 _mb50">
                        @if (isset($review->image) && is_object($review->image))
                            <span class="b-textroll__img _block _mb20">
                                <img src="{{ $review->image->full() }}" alt="">
                            </span>
                        @endif
                        <h3 class="_mb5">{{ $review->fio }}</h3>
                        <small class="_block _mb25">{{ $review->company }}, {{ $review->position }}</small>
                        <p class="b-textroll__content">
                            {{ $review->content }}
                        </p>
                        <div class="text-right">
                            <a href="#" class="btn btn-readmore b-textroll__show">Показать полностью</a>
                            <a href="#" class="btn btn-readmore b-textroll__hide">Свернуть</a>
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
                    Для организации курсов в вашей компании <br>звоните нам по телефону:
                    <?
                    $phone = Config::get('app.settings.content.corp_phone');
                    $phone_tel = preg_replace('~[^\d\+]+~is', '', $phone);
                    ?>
                    <span class="_text-yellow"><a href="tel:{{ $phone_tel }}">{{ $phone }}</a></span>
                </h2>
            </div>
        </div>
    </section>




    <section class="b-section _no-padding-bottom _mb30">
        <div class="_txt3 text-center _mb55 success-message" style="display:none;">Спасибо, ваша заявка отправлена.</div>
        <div class="_txt3 text-center _mb55">или оставьте заявку через форму:</div>
        <form action="{{ URL::route('app.form_corp') }}" class="form_corp" method="POST" role="form">
            <div class="row _mb45">
                <div class="col-sm-6">
                    <div class="_max-form _margin-auto">
                        <div class="form-group _mb20">
                            <input type="text" name="name" class="form-control" id="" placeholder="Имя">
                        </div>
                        <div class="form-group _mb20">
                            <input type="email" name="email" class="form-control" id="" placeholder="E-mail">
                        </div>
                        <div class="form-group _mb50">
                            <input type="text" name="phone" class="form-control" id="" placeholder="Телефон">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="_max-form _margin-auto">
                        <div class="form-group _mb20">
                            <input type="text" name="company" class="form-control" id="" placeholder="Компания">
                        </div>
                        <div class="form-group _mb20">
                            <input type="text" name="topic" class="form-control" id="" placeholder="Интересующая тема">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4 col-md-push-4">
                    <button type="submit" class="btn btn-blue btn-wide">Отправить заявку</button>
                </div>
            </div>
        </form>
    </section>


@stop


@section('scripts')
@stop