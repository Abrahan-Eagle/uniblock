<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <link rel="icon" href="/images/logo/favicon.ico" type="image/ico">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">

    <!-- Icons-->
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/flag-icon.min.css') }}" rel="stylesheet"> <!-- icons -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('css')
    
    <!--Google Analytics-->

    <!-- <link href="{{ asset('css/coreui-chartjs.css') }}" rel="stylesheet"> -->
    @toastr_css
</head>

<?php $lightdark = Light(); ?>

@isset($lightdark)
@switch($lightdark)
@case(1)

<body class="c-app">
    @break
    @case(0)

    <body class="c-app c-dark-theme">
        @break
        @default

        <body class="c-app c-dark-theme">
            @endswitch
            @endisset

            @empty($lightdark)

            <body class="c-app c-dark-theme">
                @endempty


    <div id="app">
        @include('dashboard.shared.side_left')
        @include('dashboard.shared.side_right')
        <div class="c-wrapper">
            @include('dashboard.shared.navbar')
            <div class="c-body" style="padding-top: 2%;">
                @include('errors.alert')
                @include('dashboard.shared.body')
                @include('dashboard.shared.footer')
            </div>
        </div>
    </div>

    <!-- CoreUI and necessary plugins-->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/app2.js') }}"></script>
    <script src="{{asset('js/lazyload.js')}}" defer></script>
    <script>
        $(document).ready(function(){
            $('img').lazyload();
        });
    </script>
    @yield('script')


</body>

@jquery
@toastr_js
@toastr_render

</html>