@extends('layouts.app') @section('title','Editar') @section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <form method="POST" action="{{ route('authors.update', $author->id) }}" class="needs-validation" accept-charset="UTF-8" enctype="multipart/form-data">
                @csrf
                @method('POST')

                    @include('dashboard.blog.authors.partials.form')
            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-footer">
                                    <button class="btn btn-block btn-facebook" type="submit"><span>Actualizar</span></button>
                                </div>
                            </div>
                        </div>
                    </div>
             
            <form/>
         
            </form>
        </div>
    </div>
</div>







@endsection

