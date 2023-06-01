@extends('welcome')
@section('title','Sobre Nosotros - Iglesia Centro Refugio Hefzi-bá')
@section('content')

<section id="home" class="video-hero js-fullheight"
  style="height: 700px; background-image: url(images/front/banner/about.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;"
  data-section="home">
  <div class="overlay js-fullheight"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
      data-scrollax-parent="true">
      <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
        <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span><a
              href="{{url('/')}}">Home</a></span> <span class="mr-2">Sobre_Nosotros</span></p>
        <h1 class="mb-3 mt-0 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Sobre Nosotros</h1>
      </div>
    </div>
  </div>
</section>



<!-- ******************************************************* MODULO DE ACTIVITY ************************************************* -->

@include('front.component.bible-study')

<!-- ******************************************************* MODULO DE ACTIVITY ************************************************* -->


@foreach ( $history as $item )

<section class="ftco-section-2">
  <div class="container-fluid">
    <div class="section-2-blocks-wrapper d-flex row no-gutters">
      <div class="img col-md-6 ftco-animate" style="background-image: url('images/front/banner/{{$item->img}}');">
        <a href="{{$item->url_video}}" class="button popup-vimeo"><span class="ion-ios-play"></span></a>
      </div>
      <div class="text col-md-6 ftco-animate">
        <div class="text-inner align-self-start">

          <h3 align='left'>{!! substr($item['title'], 0, 100) !!}</h3>
          <p align='justify'>{{ $item -> content }}</p>

        </div>
      </div>
    </div>
  </div>
</section>

@endforeach








<section class="ftco-section testimony-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">LEA, INSPÍRESE Y COMPARTA SU HISTORIA</span>
        <h2 class="mb-4">Micro Testimonios</h2>
        <p>De modo que si alguno es nueva criatura en el Mesías, las cosas viejas pasaron; he aquí,° son hechas nuevas.
          2 Corintios 5:17</p>
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




<section class="ftco-section-3 bg-light">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-4 py-5 nav-link-wrap aside-stretch">
        <div class="nav ftco-animate flex-column nav-pills text-md-right" id="v-pills-tab" role="tablist"
          aria-orientation="vertical">
          <a class="nav-link active pr-5" id="v-pills-mission-tab" data-toggle="pill" href="#v-pills-mission" role="tab"
            aria-controls="v-pills-mission" aria-selected="true">Misión</a>

          <a class="nav-link pr-5" id="v-pills-vission-tab" data-toggle="pill" href="#v-pills-vission" role="tab"
            aria-controls="v-pills-vission" aria-selected="false">Visión</a>
        </div>
      </div>
      <div class="col-md-8 pt-5 pb-5 pl-md-5 d-flex align-items-center">

        <div class="tab-content ftco-animate pl-md-5" id="v-pills-tabContent">

          <div class="tab-pane fade show active" id="v-pills-mission" role="tabpanel"
            aria-labelledby="v-pills-mission-tab">
            <span class="icon mb-3 d-block flaticon-bed"></span>
            <h2 class="mb-4">Misión Centro Refugio Hefzi-bá</h2>
            <p class="lead text-justify">Nuestra Misión es ser las herramientas de honra en las manos de YHVH,
              para alcanzar a los perdidos, y así el Espíritu Santo establezca su REINO en el corazón de los salvos
              y a la vez equiparlos para que puedan ejercer las diferentes funciones de servicio como iglesia del Señor
              como un cuerpo vivo hasta que sean maduros en Cristo (EFESIOS, 4.11-13). </p>

            <p class="lead">Estableciendo muchos grupos de Hijos de Dios en todas partes del globo terráqueo. </p>
          </div>

          <div class="tab-pane fade" id="v-pills-vission" role="tabpanel" aria-labelledby="v-pills-vission-tab">
            <span class="icon mb-3 d-block flaticon-tray"></span>
            <h2 class="mb-4">Visión Centro Refugio Hefzi-bá</h2>

            <p class="lead text-justify">Nuestra meta es llegar a ser un grupo de comunidades de fe (Iglesia de Cristo),
              cuya base
              en todo su accionar sea el Amor Ágape. Amor expresado en la vida cotidiana de la Iglesia de Filadelfia
              (Apocalipsis, 3. 7 – 15).</p>

            <p class="lead text-justify">Haciendo la proclamación de las Buenas Nuevas desde nuestro Jerusalén
              particular hasta lo
              último de la tierra (Mateo, 28. 18 – 20).</p>
            <p class="lead text-justify">Ensenando a cada persona a ser un(a) hijo(a) de Dios maduro(a), y así
              convertirse en un(a)
              verdadero(a) discípulo(a) de Yeshua Ha Mashiah (Miqueas 6. 8).</p>
            <p class="lead text-justify">Hasta llegar a ser uno(a) con Dios, amándole con toda la mente, con todo el
              corazón y con
              todas las fuerzas (Juan, 17. 20 – 23).</p>
            <!-- <p><a href="#" class="btn btn-primary">Learn More</a></p> -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>




<section class="ftco-section testimony-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <h2 class="mb-4">Nuestros Ministros</h2>
        <p>Así, considérenos todo hombre como servidores del Mesías y administradores de los misterios de Dios. 1
          Corintios 4</p>
      </div>
    </div>
    <div class="row ftco-animate">
      <div class="col-md-12">
        <div class="carousel-testimony owl-carousel ftco-owl">


          <div class="item text-center">
            <div class="testimony-wrap p-4 pb-1">

              <div class="block-10 d-md-flex align-items-center" style="margin-bottom: 0px; !important">
                <div class="img" style="background-image: url(images/user/person_2x.jpg)"></div>
                <div class="person-info pl-md-3">
                  <span class="name">Wistremiro Pulido</span>
                  <span class="position">Pastor</span>
                </div>
              </div>

            </div>
          </div>

          <div class="item text-center">
            <div class="testimony-wrap p-4 pb-1">

              <div class="block-10 d-md-flex align-items-center" style="margin-bottom: 0px; !important">
                <div class="img" style="background-image: url(images/user/person_1x.jpg)"></div>
                <div class="person-info pl-md-3">
                  <span class="name">Nelly Pulido</span>
                  <span class="position">Profeta</span>
                </div>
              </div>

            </div>
          </div>


          <div class="item text-center">
            <div class="testimony-wrap p-4 pb-1">

              <div class="block-10 d-md-flex align-items-center" style="margin-bottom: 0px; !important">
                <div class="img" style="background-image: url(images/user/person_3x.jpg)"></div>
                <div class="person-info pl-md-3">
                  <span class="name">Abrahan Pulido</span>
                  <span class="position">Developer web & CEO</span>
                </div>
              </div>

            </div>
          </div>

<!--
          <div class="item text-center">
            <div class="testimony-wrap p-4 pb-1">

              <div class="block-10 d-md-flex align-items-center" style="margin-bottom: 0px; !important">
                <div class="img" style="background-image: url(images/user/person_2.jpg)"></div>
                <div class="person-info pl-md-3">
                  <span class="name">Gabriel Pulido</span>
                  <span class="position">Guitar</span>
                </div>
              </div>

            </div>
          </div>


          <div class="item text-center">
            <div class="testimony-wrap p-4 pb-1">

              <div class="block-10 d-md-flex align-items-center" style="margin-bottom: 0px; !important">
                <div class="img" style="background-image: url(images/user/person_2.jpg)"></div>
                <div class="person-info pl-md-3">
                  <span class="name">Gloria Ramirez</span>
                  <span class="position">Mig-31</span>
                </div>
              </div>

            </div>
          </div>


          <div class="item text-center">
            <div class="testimony-wrap p-4 pb-1">

              <div class="block-10 d-md-flex align-items-center" style="margin-bottom: 0px; !important">
                <div class="img" style="background-image: url(images/user/person_2.jpg)"></div>
                <div class="person-info pl-md-3">
                  <span class="name">xxxxx Pulido</span>
                  <span class="position">xxxxxx</span>
                </div>
              </div>

            </div>
          </div>
-->

        </div>
      </div>
    </div>
  </div>
</section>

@endsection