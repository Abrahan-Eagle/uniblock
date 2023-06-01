@extends('layouts.app') @section('title','Editar') @section('content')




            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-body p-4">
                            <h1 class="text-muted">Editar Etiquetas de Eventos</h1>
                        </div>



                <form  action="{{ route('tags-event.update', $tag->id) }}" method="post" class="needs-validation" accept-charset="UTF-8" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                    <input type="hidden" name="level" value="event" />
                


                @include('dashboard.blog.tags.partials.form')
            
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

