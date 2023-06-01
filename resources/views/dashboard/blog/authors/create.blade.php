@extends('layouts.app') @section('title','Crear autor') @section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body p-4">
                <h1>Registrar</h1>
                <p class="text-muted">Crear Autor</p>
            </div>
            <form action="{{ route('authors.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="level" value="blog" />
                
                    @include('dashboard.blog.authors.partials.form')

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
