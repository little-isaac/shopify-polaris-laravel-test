<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel React application</title>
        <meta name="csrf-token" value="{{ csrf_token() }}">
        <style>
            @-webkit-keyframes a {
                to {
                    -webkit-transform: rotate(1turn);
                    transform: rotate(1turn)
                }
            }

            @keyframes a {
                to {
                    -webkit-transform: rotate(1turn);
                    transform: rotate(1turn)
                }
            }
            .Polaris-Spinner {
                -webkit-animation: a .5s linear infinite;
                animation: a .5s linear infinite;
                color: transparent
            }

            .Polaris-Spinner--sizeSmall {
                height: 2rem;
                width: 2rem
            }

            .Polaris-Spinner--sizeLarge {
                height: 4.4rem;
                width: 4.4rem
            }

            .Polaris-Spinner--colorWhite {
                fill: #fff
            }

            .Polaris-Spinner--colorTeal {
                fill: #47c1bf
            }

            .Polaris-Spinner--colorInkLightest {
                fill: #919eab
            }
            .loading{
                position:absolute;
                left:50%;
                top:50%;
                -moz-transform: translate(-50%,-50%);
                -webkit-transform: translate(-50%,-50%);
                -o-transform: translate(-50%,-50%);
                -ms-transform: translate(-50%,-50%);
                transform: translate(-50%,-50%);
            }
        </style>
        <!--<link rel="stylesheet" href="https://sdks.shopifycdn.com/polaris/1.14.1/polaris.min.css" />-->
        <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div id="@yield('main_content_id','login')">
                <div class="loading">
                    <svg viewBox="0 0 44 44" class="Polaris-Spinner Polaris-Spinner--colorTeal Polaris-Spinner--sizeLarge" role="status"><path d="M15.542 1.487A21.507 21.507 0 0 0 .5 22c0 11.874 9.626 21.5 21.5 21.5 9.847 0 18.364-6.675 20.809-16.072a1.5 1.5 0 0 0-2.904-.756C37.803 34.755 30.473 40.5 22 40.5 11.783 40.5 3.5 32.217 3.5 22c0-8.137 5.3-15.247 12.942-17.65a1.5 1.5 0 1 0-.9-2.863z"></path></svg>
                </div>
            </div>
        </div>
        @yield('js')
        <script src="{{ secure_asset('js/app.js') }}" ></script>
    </body>
</html>
