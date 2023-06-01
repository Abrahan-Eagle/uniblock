@extends('welcome')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "Iglesia Centro Refugio Hefzi-bá | $titleTag")
@section('content')

<section id="home" class="video-hero js-fullheight" style="height: 700px; background-image: url(/images/front/banner/sermon1.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
  <div class="overlay js-fullheight"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
        <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="{{url('/')}} ">Home -></a></span><span><a href="{{url('/sermons')}} ">Predicas   </a></span> <span class="mr-2">-> {!! $titleTag !!} </span></p>
        <h1 class="mb-3 mt-0 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"> {!! $titleTag !!} </h1>
      </div>
    </div>
  </div>
</section>



    <!-- ******************************************************* MODULO DE ACTIVITY ************************************************* -->

    @include('front.component.bible-study')

    <!-- ******************************************************* MODULO DE ACTIVITY ************************************************* -->


    <section class="ftco-section ftco-degree-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-8 ftco-animate fadeInUp ftco-animated">

                    <h1 class="mb-3"> {!! substr($post['title'], 0, 92) !!} </h1>
                    <h6 style="color: #055e94;" class="mb-3"> <b> {!! $post->excerpt !!} </b></h6>
                    <br>
                    
                    @if ($post -> url_video == true)
                        <div class="sermons2" style="margin-bottom: 0em">
                            <a type="button" class="img mb-3 d-flex justify-content-center align-items-center" style="background-image: url(/images/front/sermon/{{ $post -> img }});" data-toggle="modal" data-target="#exampleModal2">
                                <div class="icon d-flex justify-content-center align-items-center">
                                    <span class="icon-play"></span>
                                </div>
                            </a>
                        </div>

                    @elseif ($post -> url_video == null)
                        <div class="">
                            <p><img src="/images/front/sermon/{{ $post->img }}" alt="" class="img-responsive mx-auto img-fluid img mb-3 d-flex justify-content-center align-items-center"></p>
                        </div>

                    @else
                            
                    @endif

                    <div class="block-21 mb-4 d-flex">
                      <div class="text">
                        <div class="meta">
                          <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                          <div><a href="#"><span class="icon-eye"></span> @if( $post->views >= 1 ) {!! $post->views !!} @else {!! $post->views !!}  @endif visualizaciones</a></div>
                          <div><a href="#"><span class="icon-calendar"></span> {!! date('d M Y', strtotime($post -> created_at)) !!}</a></div>
                          <div><a href="#"><span class="icon-chat"></span> {{ count($comment) }}</a></div>
                          

                        
    
                          <div><a 
                            @foreach($iplike as $value)
                            @if($value->REMOTE_ADDR_like == true) style="color: #007bff !important" @else @endif
                            @endforeach
                        href="{{ route('sermon.like', ['slug' => $post->slug]) }}"><span class="icon-thumbs-up"></span>
                        @if ($like -> isNotEmpty()) @foreach($like as $likes) {{ $likes->like }} @endforeach @else 0 @endif
                        </a></div>
                        
                        <div><a 
                            @foreach($iplike as $value)
                            @if($value->REMOTE_ADDR_dislike == true) style="color: #007bff !important" @else @endif 
                            @endforeach
                            href="{{ route('sermon.dislike', ['slug' => $post->slug]) }}"><span class="icon-thumbs-down"></span>
                        @if ($like -> isNotEmpty()) @foreach($like as $likes) {{ $likes->dislike }} @endforeach @else 0 @endif
                        </a></div>
                        
                        
                            
                          
                        </div>
                      </div>
                    </div>
                        
                
                    <div class="tag-widget post-tag-container mb-1 mt-1">
                        <h5>Categorias</h5>
                        <div class="tagcloud">
                            <a href="{{ route('sermon.category', ['slug' => $post->category->slug]) }}"
                                class="tag-cloud-link">{{ $post->category->title }}</a>
                        </div>
                    </div>


                    <!--  <p align="justify">{{ $post->content }}</p> -->
                    <p align="justify">{!! $post->content !!}</p>



                    <div class="tag-widget post-tag-container  mb-1 mt-1">
                        <h5>Etiquetas</h5>
                        <div class="tagcloud">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('sermon.tag', ['slug' => $tag->slug]) }}"
                                    class="tag-cloud-link">{{ $tag->title }}</a>
                            @endforeach
                        </div>
                    </div>



                    @foreach($author as $authors)
                    <div class="about-author d-flex p-5 bg-light">
                        
                        <div class="bio align-self-md-center mr-5">
                            <img src="/images/user/author/{{ $authors->img }}" alt="Image placeholder" class="img-fluid rounded-circle mb-4">
                        </div>
                        <div class="desc align-self-md-center">
                            <h3> {!! $authors->name !!} </h3>
                            <p>{!! $authors->content !!}</p>
                        </div>
                        
                    </div>
                    @endforeach

                    <!-- COMENTARIOS -->

                    <div class="pt-5 mt-5">
                        @if ($comment -> isNotEmpty())
                        <h3 class="mb-5"> {{ count($comment) }} Comentarios</h3>
                        <ul class="comment-list">

                            @foreach($comment as $comments)
                            <li class="comment">
                                <div class="vcard bio">
                                    <img src="/images/user/{{ $comments->img }}" alt="Image placeholder">
                                </div>
                                
                                <div class="comment-body">
                                    <h3> {!! $comments -> name !!} </h3>
                                    <div class="meta"> {!! date('d M Y', strtotime($comments -> created_at)) !!} </div>
                                    <p> {!! $comments-> comment !!} </p>
                                    <p><button type="button" class="reply" data-toggle="modal" data-target="#exampleModal" data-whatever="{!! $comments-> id !!}">Respuesta</button></p>
                                </div>
                            
                                @foreach($comments->reply as $replys)
    
                                <ul class="children">
                                    <li class="comment">
                                        <div class="vcard bio">
                                            <img src="/images/user/{{ $replys->img }}" alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                            <h3> {!! $replys -> name !!} </h3>
                                            <div class="meta"> {!! date('d M Y', strtotime($replys -> created_at)) !!} </div>
                                            <p> {!! $replys-> comment !!} </p>
                                        </div>
                                    </li>
                                </ul>
                                @endforeach

                            </li>
                            @endforeach
                            @else
                            <h3>No hay comentarios</h3>
                            @endif

                        </ul>
                        <!-- END comment-list -->

                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Deja un comentario</h3>
                            <form  class="p-5 bg-light"  action="{{ route('comment.submit', $post->id) }}" method="post" novalidate="novalidate">
                                @csrf
                                <input class="form-control" name="_token" id="_token" type="hidden" value="{{csrf_token()}}">
                                <input class="form-control" name="user_id" id="user_id" type="hidden" value="{{ $post->user_id }}">
                                <div class="form-group">
                                    <label for="name">Nombre *</label>
                                    <input type="text" class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Nombre y Apellido'" placeholder='Nombre y Apellido' required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email *</label>
                                    <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Correo Electronico'" placeholder='Correo Electronico' required>
                                </div>

                                <div class="form-group">
                                    <label for="website">Celular</label>
                                    <input class="form-control" name="cell" id="cell" type="tel" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{4}" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Teléfono Celular'" placeholder='Teléfono Celular'>
                                </div>

                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input class="form-control" name="website" id="website" type="url" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Página Web'" placeholder='Página Web'>
                                </div>

                                <div class="form-group">
                                    <label for="comment">Comentario*</label>
                                    <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="7" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingrese su mensaje'" placeholder='Ingrese su mensaje' required></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Publicar Comentario" class="btn py-3 px-4 btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- COMENTARIOS FIN-->


              

                </div> <!-- .col-md-8 -->
                <div class="col-md-4 sidebar ftco-animate order-first fadeInUp ftco-animated">
                    <div class="sidebar-box">
                        <form action="{{ URL::to('/sermons') }}" method="GET" class="search-form">
                            <div class="form-group">
                                <span class="icon fa fa-search"></span>
                                <input type="text" name="search" id="search" class="form-control" placeholder='Buscar'
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Buscar'">
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <div class="categories">
                            <h3>Categorias</h3>
                            @foreach ($categories as $category)
                                <li><a href="{{ route('sermon.categories', ['slug' => $category->slug]) }}">{{ $category->title }}
                                        <span>({{ count($category->posts) }})</span> </a></li>
                            @endforeach

                            <!-- <li><a href="#">Gospel <span>(22)</span></a></li> -->

                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <h3>Post Recientes</h3>

                        @foreach ($recentpost as $recentposts)

                            <div class="block-21 mb-4 d-flex">
                                <a href="{{ route('sermon.post', ['slug' => $recentposts->slug]) }}" class="blog-img mr-4"
                                    style="background-image: url(/images/front/sermon/{{ $recentposts->img }});"></a>
                                <div class="text">
                                    <h3 class="heading"><a
                                            href="{{ route('sermon.post', ['slug' => $recentposts->slug]) }}">{!!
                                            substr($recentposts['title'], 0, 40) !!}</a></h3>
                                    <div class="meta">
                                        <div><a href="#"><span class="icon-calendar"></span>
                                                {{ date('d M Y', strtotime($recentposts->created_at)) }}</a></div>
                                        <!-- <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                      <div><a href="#"><span class="icon-chat"></span> 19</a></div> -->
                                    </div>
                                </div>
                            </div>

                        @endforeach


                        <!--<div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> July 12, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>-->


                    </div>

                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <h3>Etiquetas</h3>
                        <div class="tagcloud">
                            @foreach ($tags as $tag)
                                <a href="{{ route('sermon.tags', ['slug' => $tag->slug]) }}"
                                    class="tag-cloud-link">{{ $tag->title }}</a>
                            @endforeach
                        </div>
                    </div>

                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <h2>Versículo del Dia.</h2>
                        <h3>El alcance del amor de Dios</h3>
                        <p><b>Juan 3:16:</b> 16 Porque de tal manera amó Dios al mundo, que dio a su Hijo Unigénito, para que todo aquel que en Él cree, no se pierda, mas tenga vida eterna.</p>
                    </div>

                    <div class="sidebar-box ftco-animate fadeInUp ftco-animated">
                        <h2>Descarga tu Biblia para tu Android.</h2>
                        <h3>BTX - La Bíblia Textual</h3>
                        <p>Esta es la Bíblia versión Textual, disponible de manera offline.</p>
                        <p>Ideal para estudios exegéticos de las escrituras, ya que permite conocer más precisamente el contenido original del texto bíblico.</p>
                        
                        <a class="btn btn-lg btn-success big-btn android-btn" href="https://play.google.com/store/apps/details?id=number.seven.apps.btx&hl=es_PA" target="_blank">
                            <div class="row">
                                <div class="container">
                                    <div class="col-md-12">
                                        <div class="col-sm-12">
                                            <img width="40%"  src="http://www.userlogos.org/files/logos/jumpordie/google_play_04.png">
                                            <small>Disponible en</small><br><strong>Google Play</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        
                    </div>
                </div>

            </div>
        </div>
    </section> <!-- .section -->
    
@include('front.component.reply')
@include('front.component.modal-youtube')


@endsection
