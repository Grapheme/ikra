@extends(Helper::layout())


@section('style')
    <style>

        .b-section._no-padding-bottom {
            display: none;
        }

        .b-footer .b-footer__map{
            display: none;
        }

        .b-footer {
            margin-top: -117px;
            z-index: 3;
            position: relative;
            background-color: #fff;
        }
        
        .error-page {
            height: 100vh;
            position: relative;
        }

        .error-filter {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: rgba(0, 0, 0, 0.25);
            z-index: 0;
            background-image: url('/theme/site/img/pages/pussy404.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }

        .error-page .error-page-text {
            color: #fff;
            display: inline-block;
            text-align: center;
            width: 99%;
            position: relative;
            z-index: 2;
        }

        .error-page .error-page-hack {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            width: 0px;
            height: 100%;
            top: 0;
            bottom: 0;
            left: 0;
        }

        .error-page .error-page-text a {
            color: #ef4949;
        }

        .error-page .error-page-text h2 {
            margin-bottom: 25px;
        }

        .error-page .error-page-text h3 {
            font-size: 25px;
        }

        .error-page .error-page-text i {
            margin-bottom: 50px;
            font-size: 24px;
            display: block;
        }

        .error-page-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>
@stop


@section('content')
    <div class="error-page-wrapper">
        <div class="error-filter"></div>
        <div class="error-page">
            <div class="error-page-hack"></div>
            <div class="error-page-text">
                <h2>ЭТА СТРАНИЦА НЕ НАЙДЕНА</h2>
                <i>Зато есть много других</i>
                <h3>Начните с <a href="/">главной</a></h3>
            </div>
        </div>
    </div>
@stop


@section('scripts')
@stop