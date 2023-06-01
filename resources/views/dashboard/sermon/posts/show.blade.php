@extends('layouts.app') @section('title','Show') @section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card-footer p-4">
                <div class="row">
                    <div class="col-6">
                        <p><strong> Categoria: </strong> {{ $category -> title }} </p>
                        <p><strong> Nombre: </strong> {{ $post -> title }} </p>
                        <p><strong> Slug: </strong> {{ $post -> slug }} </p>
                        <p><strong> Contenido: </strong> {!! $post -> content !!} </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection