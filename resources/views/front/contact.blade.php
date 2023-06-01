@extends('welcome')
@section('title','Contactanos - Iglesia Centro Refugio Hefzi-bá')
@section('content')

<section id="home" class="video-hero js-fullheight" style="height: 700px; background-image: url(images/front/banner/contact.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
  <div class="overlay js-fullheight"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
        <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span><a href="{{url('/')}}">Home</a></span> <span class="mr-2">Contactanos</span></p>
        <h1 class="mb-3 mt-0 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Contactanos</h1>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section contact-section ftco-degree-bg">
  <div class="container bg-light">
    <div class="row d-flex mb-5 contact-info">
      <div class="col-md-12 mb-4">
        <h2 class="h4">Contactanos Información</h2>
      </div>
      
      <div class="w-100"></div>
      <div class="col-md-4">
        <p><span>Dirección:</span></p>
        <p>Valencia, Edo Carabobo, Venezuela. Urb. Pop. El Socorro, Av. Bella Vista, entre calles Cesar giron y Las Torres.</p>
      </div>
      <div class="col-md-4">
        <p><span>Telefono:</span></p>
        <p><span></span> <a href="tel://+582418360829" target="_blank">+58 241-8360829</a></p>
        <p><span></span> <a href="tel://+582416140728" target="_blank">+58 241-6140728</a></p>
      </div>
      <div class="col-md-4">
        <p><span>Email:</span> <a href="mailto:contact@centrorefugiohefzi-ba.com" target="_blank">contact@centrorefugiohefzi-ba.com</a></p>
        <p><span>Email:</span> <a href="mailto:centrorefugiohefziba@gmail.com" target="_blank">centrorefugiohefziba@gmail.com</a></p>
        <p><span>Website:</span> <a href="https://centrorefugiohefzi-ba.com" target="_blank">Centro Refugio Hefzi-bá</a></p>
      </div>
      
    </div>
    <div class="row block-9">
      <div class="col-md-6 pr-md-5">
       
       
        <form  class="form-contact contact_form"  action="{{ route('contact.submit') }}" method="POST" id="contactForm" novalidate="novalidate">
          @csrf

          <div class="form-group">
            <input class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''"
            onblur="this.placeholder = 'Nombre y Apellido'" placeholder='Nombre y Apellido'>
          </div>
          <div class="form-group">
            <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Correo Electronico'" placeholder='Correo Electronico'>
          </div>
          <div class="form-group">
            <input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Objeto del mensaje'" placeholder='Objeto del mensaje'>
          </div>
          <div class="form-group">
            <textarea class="form-control w-100" name="message" id="message" cols="30" rows="7"
            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mensaje'"
            placeholder='Mensaje'></textarea>
            <input class="form-control" name="_token" id="_token" type="hidden" value="{{csrf_token()}}">
          </div>
          <div class="form-group">
  
            <button type="submit" class="btn btn-primary py-3 px-5">Enviar Mensaje</button>
          </div>
        </form>
      
      </div>

      <div class="col-md-6">
          <!-- <div class="col-md-6" id="map"> -->
          <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6605.523576919703!2d-68.05500268130226!3d10.126252891199558!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e80615252311007%3A0x16aaf450ce8f7058!2sParcelas%20del%20Socorro%20Local%20Evang%C3%A9lico!5e0!3m2!1ses!2sve!4v1569702592198!5m2!1ses!2sve" width="100%" height="650" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
      </div>
    </div>
  </div>
</section>


@endsection


  