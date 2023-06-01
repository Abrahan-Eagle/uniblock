@extends('layouts.app') @section('title','Show') @section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body p-4">
                <h2 class="text-muted">Detalles de categoria</h2>
            </div>
            
            <div class="card-footer p-4">
                <div class="row">
                    <div class="col-12">
                        <p><strong> NOMBRE: </strong> {{ $category -> title }} </p>
                        <p><strong> SLUG: </strong> {{ $category -> slug }} </p>
                        <p><strong> CONTENIDO: </strong> {{ $category -> content }} </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection