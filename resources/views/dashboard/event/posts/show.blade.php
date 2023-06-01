@extends('layouts.app') @section('title','Show') @section('content')



<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-body p-4">
                <h2 class="text-muted">Detalles del Evento</h2>
            </div>


            
            <div class="card-footer p-4">
                <div class="row">
                    <div class="col-6">
                        <p><strong> Categoria: </strong> {{ $category -> title }} </p>
                        <p><strong> Nombre: </strong> {{ $post -> title }} </p>
                    </div>
                    <div class="col-6">
                        <p><strong> Slug: </strong> {{ $post -> slug }} </p>
                    </div>
                                     
                    <div class="row">
                        <div class="col-6">
                            <div class="container-fluid">
                                @empty($post-> url_video)
                                <p>NO CONTIENE VIDEO</p>
                                @else
                                <iframe width="100%" height="343px" src="https://www.youtube.com/embed/{{ $post -> url_video }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @endempty
                            </div>    
                        </div>    
                        
                        <div class="col-6">
                            <div class="container-fluid">
                                @empty($post->img)
                                <p>NO CONTIENE IMAGEN</p>
                                @else
                                <img src="/images/front/event/{{ $post -> img }}" class="img-fluid h-100 w-100 img-responsive center-block d-block mx-auto" alt="{{ $post -> name }}">
                                @endempty
                            </div>
                        </div>
                    </div>                    
                    <div class="col-12">
                        <br>
                        <p><strong> Resumen: </strong> {!! $post -> excerpt !!}</p>
                        <p><strong> Contenido: </strong> {!! $post -> content !!}</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


@endsection