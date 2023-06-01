@extends('layouts.app')
@auth
@section('title','Dashboard - Centro Refugio Hefzi-ba')

@section('content')
<main class="c-main">
    <div class="container-fluid">
        <div id="ui-view">
            <br><br>
            <img src="/images/logo/LOGO.png" class="img-fluid h-50 w-50 img-responsive center-block d-block mx-auto" style="filter: grayscale(0%); width: 30%!important;"
                alt="Centro Refugio Hefzi-ba">
                <h1 class="w-50 h-50 mx-auto text-center">Centro Refugio Hefzi-ba</h1>
        </div>
    </div>
</main>


@endsection
@endauth





