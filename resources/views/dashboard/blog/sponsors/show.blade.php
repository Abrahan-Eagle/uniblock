@extends('layouts.app') @section('title','Show') @section('content')


            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body p-4">
                            <h2 class="text-muted">Detalles del Patrocinante</h2>
                        </div>




            <div class="card-footer p-4">
                <div class="row">
                    <div class="col-7">
                        <p><strong> Nombre del Patrocinante: </strong> {{ $sponsor -> name }} </p>
                        <p><strong> SLUG: </strong> {{ $sponsor -> slug }} </p>
                    </div>

                    @empty($sponsor->img)
                    <div class="col-5">
                        <h2><strong> SIN IMAGEN </strong></h2>
                    </div>
                    @else
                    <div class="col-5">
                        <div class="container-fluid">
                            <div id="ui-view">
                                <img src="/images/user/sponsor/{{ $sponsor -> img }}" class="img-fluid h-100 w-100 img-responsive center-block d-block mx-auto" style="filter: grayscale(0%); width: 30%!important;"
                                    alt="{{ $sponsor -> name }}">
                            </div>
                        </div>
                    </div>
                    @endempty
                    <div class="col-12">
                        <br>
                        <p><strong> Descripción: </strong> {!! $sponsor -> content !!}</p>
                    </div>

                    


                </div>
            </div>

        </div>
    </div>
</div>


@endsection