<?
/**
 * TITLE: Контакты
 * AVAILABLE_ONLY_IN_ADVANCED_MODE
 */
?>
@extends(Helper::layout())
<?php
?>


@section('style')
@stop


@section('content')


    {{ $page->block('header') }}


    <section class="b-section _no-padding-bottom">
        <div class="h2 _mb65">Икра
            <form class="nl-form _text-red" data-nl>
                <select name="city" class="js-city-select">
                    @foreach ($dic_city as $city)
                        <option value="{{ $city->id }}"{{ $city->id == $current_city->id ? ' selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                </select>
                <div class="nl-overlay"></div>
            </form>
        </div>


        <div class="row b-contacts__ways _mb50">
                <div class="col-md-4">
                    <h3 class="_mb40">{{ $current_city->address }}</h3>
                    <p class="_max-text">
                        {{ nl2br($current_city->how2get_text) }}
                    </p>
                </div>
                <div class="col-md-6 col-md-push-2">
                    <div class="_mb40"><br><br><b>На транспорте до нас можно добраться от:</b></div>
                    <div class="_mb40">{{ nl2br($current_city->how2get_way_1) }}</div>
                    <div class="_mb40">{{ nl2br($current_city->how2get_way_2) }}</div>
                    <div class="_mb40">{{ nl2br($current_city->how2get_way_3) }}</div>
                </div>
        </div>


        <div class="row">
            <div class="col-md-6 _mb30 js-footer-contact-info">
                @if ($current_city->manager_1_fio)
                    <div class="_mb30">
                        <h3>
                            {{ $current_city->manager_1_phone }} /
                            <strong class="_text-red">
                                <a href="mailto:{{ $current_city->manager_1_email }}">{{ $current_city->manager_1_email }}</a>
                            </strong>
                        </h3>
                        <small>{{ $current_city->manager_1_position }}, {{ $current_city->manager_1_fio }}</small>
                    </div>
                @endif
                @if ($current_city->manager_2_fio)
                    <div class="_mb30">
                        <h3>
                            {{ $current_city->manager_2_phone }} /
                            <strong class="_text-red">
                                <a href="mailto:{{ $current_city->manager_2_email }}">{{ $current_city->manager_2_email }}</a>
                            </strong>
                        </h3>
                        <small>{{ $current_city->manager_2_position }}, {{ $current_city->manager_2_fio }}</small>
                    </div>
                @endif
                @if ($current_city->manager_3_fio)
                    <div class="_mb30">
                        <h3>
                            {{ $current_city->manager_3_phone }} /
                            <strong class="_text-red">
                                <a href="mailto:{{ $current_city->manager_3_email }}">{{ $current_city->manager_3_email }}</a>
                            </strong>
                        </h3>
                        <small>{{ $current_city->manager_3_position }}, {{ $current_city->manager_3_fio }}</small>
                    </div>
                @endif

                @if ($current_city->comment)
                    <small class="_block _mb60 _text-blue">{{ nl2br($current_city->comment) }}</small>
                @endif

                <div class="b-social">
                    @if ($current_city->fb_link)
                        <a class="_facebook" href="{{ $current_city->fb_link }}" target="_blank"><i class="fa fa-facebook"></i></a>
                    @endif
                    @if ($current_city->vk_link)
                        <a class="_vkontakte" href="{{ $current_city->vk_link }}" target="_blank"><i class="fa fa-vk"></i></a>
                    @endif
                    @if ($current_city->ig_link)
                        <a class="_instagram" href="{{ $current_city->ig_link }}" target="_blank"><i class="fa fa-instagram"></i></a>
                    @endif
                    @if ($current_city->tw_link)
                        <a class="_twitter" href="{{ $current_city->tw_link }}" target="_blank"><i class="fa fa-twitter"></i></a>
                    @endif
                    @if ($current_city->yt_link)
                        <a class="_youtube" href="{{ $current_city->yt_link }}" target="_blank"><i class="fa fa-youtube"></i></a>
                    @endif
                </div>
            </div>

            <div class="col-md-4 _mb30">
                <div class="h4 _mb30">С удовольствием ответим на вопросы</div>

                <form role="form" class="_max-form">
                    <div class="form-group _mb15">
                        <input type="email" class="form-control" id="" placeholder="E-mail для ответа">
                    </div>
                    <div class="form-group _mb40">
                        <input type="text" class="form-control" id="" placeholder="А здесь вопрос">
                    </div>
                    <button type="submit" class="btn btn-blue btn-wide">Отправить</button>
                </form>

            </div>
        </div>
    </section>




    @if (isset($dic_workers) && is_object($dic_workers) && $dic_workers->count())
        <section class="b-section _bg-cyan _no-padding-bottom">
            <h2>В главных ролях </h2>
            <div class="jcarousel-nav-bar">
                <div class="jcarousel-nav arrow-left"></div>
                <div class="jcarousel-nav arrow-right"></div>
            </div>
            <div class="jcarousel">
                <ul class="row _mb0">
                    @foreach ($dic_workers as $worker)
                        <li class="col-sm-4 _mb50">
                            <span class="_block _mb20">
                                @if (isset($worker->avatar) && is_object($worker->avatar))
                                    <img src="{{ $worker->avatar->full() }}" alt="{{ $worker->name }}">
                                @endif
                            </span>
                            <h3 class="_mb5">{{ $worker->name }}</h3>
                            @if ($worker->position)
                                <small class="_block _mb30">{{ $worker->position }}</small>
                            @endif
                            @if ($worker->phone)
                                <h3><a href="tel:{{ $worker->phone }}">{{ $worker->phone }}</a></h3>
                            @endif
                            @if ($worker->email)
                                <h3><strong><a href="mailto:{{ $worker->email }}">{{ $worker->email }}</a></strong></h3>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

@stop


@section('scripts')
@stop


@section('footer_contacts')
@stop