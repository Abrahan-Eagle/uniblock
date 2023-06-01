@extends('welcome')
@section('title','Iglesia Centro Refugio Hefzi-bá')
@section('content')


<!-- ******************************************************** MAIN ******************************************************* -->
<section id="home" class="video-hero js-fullheight" style="height: 700px; background-image: url(images/front/banner/home.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
  <div class="overlay js-fullheight"></div>
  <!-- <a class="player" data-property="{videoURL:'https://www.youtube.com/watch?v=5m--ptwd_iI',containment:'#home', showControls:false, autoPlay:true, loop:true, mute:false, startAt:0, opacity:1, quality:'default'}"></a> -->
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
        <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><u>Bienvenido a Centro Refugio Hefzi-bá </u><br> <font size=6>Proclamando <strong> El Reino de Dios </strong> a todas las naciones. </font></h1>
        <!--<p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><a href="#" class="btn btn-primary btn-outline-white px-4 py-3">Registrase</a></p>-->
      </div>
    </div>
  </div>
</section>




<!-- ******************************************************** MAIN ******************************************************* -->


<!-- ******************************************************* MODULO DE ACTIVITY ************************************************* -->

@include('front.component.bible-study')

<!-- ******************************************************* MODULO DE ACTIVITY ************************************************* -->


@foreach ( $videohero as $videoheros)
    
<section class="ftco-section-2">
  <div class="container-fluid">
    <div class="section-2-blocks-wrapper d-flex row no-gutters">
      <div class="img col-md-6 ftco-animate" style="background-image: url('images/front/banner/{{$videoheros->img}}');">
        <a href="{{$videoheros->url_video}}" class="button popup-vimeo"><span class="ion-ios-play"></span></a>
      </div>
      <div class="text col-md-6 ftco-animate">
        <div class="text-inner align-self-start">
            
          <h3 align='left'>{!! substr($videoheros['title'], 0, 105) !!}</h3>
          <p align='justify'>{{ $videoheros -> content }}</p>

        </div>
      </div>
    </div>
  </div>
</section>

@endforeach

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-8 text-center heading-section ftco-animate">
          <span class="subheading">NUESTROS SERVICIOS</span>
          <h2 class="mb-4">Porque eres importante para Dios</h2>
          <p>A continuación te ofrecemos algunos de nuestros servicios como hermanos. Estando seguros que te serán de gran ayuda</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon d-flex justify-content-center mb-3"><span class="align-self-center flaticon-planet-earth"></span></div></div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Células Familiares</h3>
              <p>Tenemos reuniones en los hogares donde procuramos que 1 Co.14:26 sea la guia para nuestros agapes. </p>
            </div>
          </div>      
        </div>
        <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon d-flex justify-content-center mb-3"><span class="align-self-center flaticon-maternity"></span></div></div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Ministerios de atención</h3>
              <p>Centro Refugio Hefzi-bá ofrece: Celebraciones dominicales, Celulas Fliares, Reuniones de Oración, Visitas Hospital.</p>
            </div>
          </div>      
        </div>
        <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon d-flex justify-content-center mb-3"><span class="align-self-center flaticon-pray"></span></div></div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Petición de oración</h3>
              <p>En C.R.H. Tenemos un equipo de intercesores por lo que puedes contactarnos y decirnos tus necesidades de oración.</p>
            </div>
          </div>    
        </div>

        <div class="col-md-6 col-lg-3 d-flex align-self-stretch ftco-animate">
          <div class="media block-6 services d-block text-center">
            <div class="d-flex justify-content-center"><div class="icon d-flex justify-content-center mb-3"><span class="align-self-center flaticon-podcast"></span></div></div>
            <div class="media-body p-2 mt-3">
              <h3 class="heading">Multimedia</h3>
              <p>Te ofrecemos archivos Multimedias como predicaciones, testimonios, música, estudios, biblias.</p>
            </div>
          </div>      
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2>Suscríbase a nuestro boletín</h2>
            <p>Si deseas recibir en tu correo la información contínua de nuestras actividades y noticias importantes, envíanos tu email.</p>
            <div class="row d-flex justify-content-center mt-5">
              <div class="col-md-6">
                  <form  action="{{ route('newsletter.submit') }}" method="POST" class="subscribe-form">
                      @csrf
                      <div class="form-group">
                        <span class="icon icon-paper-plane"></span>
                        <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Enviar Correo Electronico'" placeholder='Enviar Correo Electronico' required>    
                      </div>
                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row no-gutters justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Predicas</span>
          <h2 class="mb-4">Mira nuestras predicaciones</h2>
          <p>En este espacio queremos que usted sea bendecido por la palabra de Dios en su vida a travez de los estudios y predicaciones de grandes personas usadas por Dios.</p>
        </div>
      </div>
      <div class="row">
        
        @foreach ( $sermon as $sermons )

        <div class="col-md-4 ftco-animate">
          <div class="sermons">
            <a href="{{ route('sermon.post', ['slug' => $sermons -> slug]) }}" class="img mb-3 d-flex justify-content-center align-items-center" style="background-image: url(images/front/sermon/{{ $sermons -> img}} );"></a>
            <div class="text">
              <h3><a href="{{ route('sermon.post', ['slug' => $sermons -> slug]) }}">{{ $sermons -> title }} </a></h3>
              <span class="position"> {{ $sermons -> name }}</span>
            </div>
          </div>
        </div>
        
        @endforeach
        
     
      </div>
      <div class="row mt-5">
        <div class="col text-center">
        <p><a href="{{url('/sermons')}}" class="btn btn-primary btn-outline-primary p-3">Mira todas las predicaciones</a></p>
        </div>
      </div>
    </div>
  </section>

  
  <section class="ftco-section testimony-section bg-light">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">LEA, INSPÍRESE Y COMPARTA SU HISTORIA</span>
          <h2 class="mb-4">Micro Testimonios</h2>
          <p>De modo que si alguno es nueva criatura en el Mesías, las cosas viejas pasaron; he aquí,° son hechas nuevas. 2 Corintios 5:17</p>
        </div>
      </div>
      <div class="row ftco-animate">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            
            @foreach ( $testimonio as $testimonios)
                
            <div class="item text-center">
              <div class="testimony-wrap p-4 pb-5">
                <div class="user-img mb-4" style="background-image: url(images/user/{{$testimonios -> img}} )">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text">
                  <p class="mb-5">{!! substr($testimonios['content'], 0, 190) !!}</p>
                  <!-- <p class="name">Wistremiro Pulido</p>
                  <span class="position">Pastorx</span> -->
                </div>
              </div>
            </div>

            @endforeach

          </div>
        </div>
      </div>
    </div>
  </section>

  
  
  
  <section class="ftco-section-2 bg-light">
    <div class="container-fluid">
      <div class="row no-gutters d-flex">
        <div class="col-md-6 img d-flex justify-content-end align-items-center" style="background-image: url(images/front/banner/event1.jpg);">
          <div class="col-md-7 heading-section text-sm-center text-md-right heading-section-white ftco-animate mr-md-5 mt-md-5">
            <h2>Nuestros ultimos eventos</h2>
            <p>Entra para que vea la Gloria y el Poder de Dios y su Victoria vivida en cada uno de los eventos que hemos realizado.</p>
            <p><a href="{{url('/events')}}" class="btn btn-primary py-3 px-4">Ver nuestros Eventos</a></p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="event-wrap">
         
         @foreach ( $events as $event)
             
            <div class="event-entry d-flex ftco-animate">
              <div class="meta mr-4">
                <p>
                  <span>{{ date('d', strtotime($event -> date_activi)) }}</span>
                  <span>{{ date('M Y', strtotime($event -> date_activi)) }}</span>
                </p>
              </div>
                                                              
              <div class="text">
                <h3 class="mb-2"><a href="{{ route('event.post', ['slug' => $event -> slug]) }}">{!! substr($event['title'], 0, 100) !!} </a></h3>
                <p class="mb-4"><span>{{ date('H:i A', strtotime($event -> date_activi)) }} en {{$event -> countries_name}} Edo. {{$event -> states_name}} {{$event -> cities_name}}  {{$event -> direccion}}</span></p>
                <a href="{{ route('event.post', ['slug' => $event -> slug]) }}" class="img" style="background-image: url(/images/front/event/{{$event -> img}});"></a>
              </div>
            </div>
            
          @endforeach


          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="ftco-section">
    <div class="container">
      <div class="row justify-content-center mb-5 pb-5">
        <div class="col-md-7 text-center heading-section ftco-animate">
          <span class="subheading">Blog</span>
          <h2>Blog Recientes</h2>
          <p>Dios esta presente siempre en todas las cosas a nuestro alrededor. y por eso esta nuestro blog para hablar temas puntuales para nuestras vidas en Dios.</p>
        </div>
      </div>
      <div class="row">
        
        @foreach ( $posts as $post )


        <div class="col-md-4 ftco-animate">
          <div class="sermons">
            <a href="{{ route('blog.post', ['slug' => $post -> slug]) }}" class="img mb-3 d-flex justify-content-center align-items-center" style="background-image: url(/images/front/blog/{{ $post -> img}} );"></a>
            <div class="text">
              <h3><a href="{{ route('blog.post', ['slug' => $post -> slug]) }}">{{ $post -> title }} </a></h3>
              <span class="position"> {{ $post -> name }}</span>
            </div>
          </div>
        </div>
        
        @endforeach


      </div>
    </div>
  </section>


@endsection
  