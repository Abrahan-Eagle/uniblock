@extends('layouts.app') @section('title','Editar') @section('content')




            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body p-4">
                            <h1>Editar</h1>
                            <p class="text-muted">Editar Etiquetas</p>
                        </div>


        <form  action="{{ route('tags.update', $tag->id) }}" method="post" class="needs-validation" accept-charset="UTF-8" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="level" value="blog" />
        
                
                
                @include('dashboard.blog.tags.partials.form')
            
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card-footer">
                                    <button class="btn btn-block btn-facebook" type="submit"><span>Update</span></button>
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

