<?
/**
 * TEMPLATE_IS_NOT_SETTABLE
 */
?>

<!-- </div> -->

@section('footer_contacts')
    <section class="b-section _no-padding-bottom">
        <div class="h2 _mb35">Икра
            <form class="nl-form _text-red" data-nl>
                <select id="city_selection">
                    @foreach ($dic_city as $city)
                        <?
                        if (!$city->important)
                            continue;
                        ?>
                        <option value="{{ $city->id }}"{{ $city->id == $current_city->id ? ' selected' : '' }}>{{ $city->name }}</option>
                    @endforeach
                    @if (0)
                        <option value="1">Москва</option>
                        <option value="2">Спб</option>
                        <option value="3">Минск</option>
                        <option value="4">Екб</option>
                    @endif
                </select>

                <div class="nl-overlay"></div>
        </div>

        {{ Helper::ta_($current_city) }}

        <div class="row">
            <div class="col-md-6 _mb30">
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
                     <input type="hidden" id="city_id">
                    <button type="submit" class="btn btn-blue btn-wide">Отправить</button>
                </form>

            </div>
        </div>
    </section>
@show

<footer class="b-footer">
    <div class="b-footer__map" data-lat="{{ $current_city->lat }}" data-lng="{{ $current_city->lng }}">
        <div id="footer_gmap"></div>
        <div class="b-footer__map-text">
            <div class="b-footer__map-text-valign h4">
                {{ $current_city->name }}, <br> {{ $current_city->address }}
            </div>
        </div>
    </div>
    <div class="b-footer__bottom">
        <img src="{{ Config::get('site.theme_path') }}/img/logo/ikra-igra.png" height="41" width="221" alt="Икра - это игра">
    </div>
</footer>

<div class="nl-overlay"></div>


{{-- Логика отображения поп-апа с выбором города --}}
@if (!isset($_COOKIE['change_city']) || !$_COOKIE['change_city'])
    <!-- Change city pop-up -->
@endif

<script>
    __SITE = __SITE || {};
    __SITE.img_path_full = "{{ Config::get('site.galleries_photo_public_dir') }}";
    __SITE.img_path_thumb = "{{ Config::get('site.galleries_thumb_public_dir') }}";
    __SITE.cities = {{ json_encode($dic_city, JSON_UNESCAPED_UNICODE) }};
    __SITE.directions = {{ json_encode($dic_direction, JSON_UNESCAPED_UNICODE) }};
    __SITE.types = {{ json_encode($dic_type, JSON_UNESCAPED_UNICODE) }};
    __SITE.teachers = {{ json_encode($dic_teachers, JSON_UNESCAPED_UNICODE) }};
</script>