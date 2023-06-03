@extends('layouts.app')
@auth
@section('title','Dashboard - Tecnologia - Uniblock')

@section('content')
<main class="c-main">
    <div class="container-fluid">
        <div id="ui-view">
            <br><br>
            <img src="{{ asset('uniblock/img/logo/loder.png') }}" class="img-fluid h-50 w-50 img-responsive center-block d-block mx-auto" style="filter: grayscale(0%); width: 30%!important;"
                alt="Tecnologia - Uniblock">
                <h1 class="w-50 h-50 mx-auto text-center">Tecnologia - Uniblock</h1>
        </div>
    </div>
</main>


@endsection
@endauth





