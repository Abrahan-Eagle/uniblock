@extends('layouts.app') @section('title','Crear patrocinante') @section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body p-4">
                <h2 class="text-muted">Crear Patrocinantes</h2>
            </div>
            <form action="{{ route('sponsors.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                
                    @include('dashboard.blog.sponsors.partials.form')

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-footer">
                                    <button class="btn btn-block btn-facebook" type="submit"><span>Registrar</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    

            <form/>
        </div>
    </div>
</div>


@endsection
