@extends('layouts.app') @section('title','Show') @section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card-footer p-4">
                <div class="row">
                    <div class="col-6">
                        <p><strong> Nombre: </strong> {{ $tag -> title }} </p>
                        <p><strong> Slug: </strong> {{ $tag -> slug }} </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection