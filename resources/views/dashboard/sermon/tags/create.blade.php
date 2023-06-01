@extends('layouts.app') @section('title','Create') @section('content')


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body p-4">
                <h1>Registrar</h1>
                <p class="text-muted">Crear Etiquetas</p>
            </div>
            
            


                    <form  action="{{ route('tags-sermon.store') }}" method="post" class="needs-validation" accept-charset="UTF-8" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" name="level" value="sermon" />
                        
                        @include('dashboard.blog.tags.partials.form')

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-footer">
                                    <button class="btn btn-block btn-facebook" type="submit"><span>Register</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    

            <form/>
        </div>
    </div>
</div>


@endsection
