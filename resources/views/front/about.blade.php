@extends('welcome')
@section('title','Sobre Nosotros - Uniblock')
@section('content')


<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Sobre Nosotros</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--? About Law Start-->
    <section class="about-low-area section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-caption mb-50">
                        <!-- Section Tittle -->
                        <div class="section-tittle mb-35">
                            <h2>Descubre UNI<b>BLOCK.</b></h2>
                        </div>
                        <p>En Uniblock, ofrecemos soluciones tecnológicas de vanguardia, adaptadas a las necesidades únicas de nuestros clientes. Con experiencia en desarrollo de software, IA y servicios digitales, impulsamos tu éxito empresarial.</p>
                        <p>Enfocados en la calidad y la innovación, nuestro equipo de expertos en tecnología entrega proyectos sobresalientes. Destacamos en IA, desarrollo de software y servicios informáticos, superando expectativas y potenciando tu negocio. Confía en nosotros para dar el siguiente paso tecnológico.</p>
                    </div>
                    <br><br><br><br><br><br><br><br><br><br><br><br>
                </div>
                <div class="col-lg-6 col-md-12">
                    <!-- about-img -->
                    <div class="about-img ">
                        <div class="about-font-img d-none d-lg-block">
                            <img src="{{ asset('uniblock/img/gallery/about2.png') }}" alt="">
                        </div>
                        <div class="about-back-img ">
                            <img src="{{ asset('uniblock/img/gallery/about1.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Law End-->
    <!-- accordion End -->
    <!--? gallery Products Start -->
    <div class="gallery-area fix">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(uniblock/img/gallery/gallery1.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(uniblock/img/gallery/gallery2.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(uniblock/img/gallery/gallery3.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(uniblock/img/gallery/gallery4.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                             <div class="gallery-img " style="background-image: url(uniblock/img/gallery/gallery5.png);"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="gallery-box">
                        <div class="single-gallery">
                            <div class="gallery-img " style="background-image: url(uniblock/img/gallery/gallery6.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- gallery Products End -->



        <!--? accordion -->
        <section class="accordion fix section-padding">
            <div class="container">
                <!-- Nav Card -->
                <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                       <div class="row">
                            <div class="col-md-12">
                                <div class="accordion-wrapper">
                                    <div class="accordion" id="accordionExample">
                                        <!-- single-one -->
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h2 class="mb-0">
                                                    <a href="#" class="btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                        <h1><span style="font-size: 100%;"> MISION</span> - <span style="font-size: 100%;">UNI</span><b>BLOCK</b></h1>
                                                    </a>
                                                </h2>
                                            </div>
                                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    En Uniblock, somos un equipo apasionado y comprometido en ofrecer soluciones tecnológicas de vanguardia. Con años de experiencia en el desarrollo de software, inteligencia artificial y servicios digitales, nos enorgullece brindar resultados excepcionales a nuestros clientes. Nuestro enfoque se centra en comprender las necesidades únicas de cada cliente y proporcionar soluciones personalizadas que impulsen su éxito empresarial. Ya sea que representes a una gran empresa o seas un emprendedor con grandes sueños, estamos aquí para ayudarte a alcanzar tus objetivos tecnológicos.
                                                </div>
                                            </div>
                                        </div>
                                        <!-- single-two -->
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h2 class="mb-0">
                                                    <a href="#" class="btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                        <h1><span style="font-size: 100%;"> VISION</span> - <span style="font-size: 100%;">UNI</span><b>BLOCK</b></h1>
                                                    </a>
                                                </h2>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    There arge many variations ohf passages of sorem gpsum ilable, but the majority have suffered alteration in some form, by ected humour, or randomised words whi.rere arge many variations ohf passages of sorem gpsum ilable.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
                <!-- End Nav Card -->
            </div>
        </section>
        <!-- accordion End -->


    <!--? Brand Area Start -->
      <section class="team-area pb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-6 col-md-6">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <h1 style="font-size: 400%;"> NUESTRO <b> EQUIPO</b></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ asset('uniblock/img/gallery/team1.png') }}" alt="">
                        </div>
                        <div class="team-caption team-caption2">
                            <h3><a href="#">RENNY FURNERI</a></h3>
                            <p>SEO Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ asset('uniblock/img/gallery/team2.png') }}" alt="">
                        </div>
                        <div class="team-caption team-caption2">
                            <h3><a href="#">GUILLERMO CERCEAU</a></h3>
                            <p> Co Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ asset('uniblock/img/gallery/team3.png') }}" alt="">
                        </div>
                        <div class="team-caption team-caption2">
                            <h3><a href="#">ABRAHAN PULIDO</a></h3>
                            <p> Full-Stack Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ asset('uniblock/img/gallery/team4.png') }}" alt="">
                        </div>
                        <div class="team-caption team-caption2">
                            <h3><a href="#">WILFREDO ZAPATA</a></h3>
                            <p> Developer Frontend</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ asset('uniblock/img/gallery/team7.png') }}" alt="">
                        </div>
                        <div class="team-caption team-caption2">
                            <h3><a href="#">ARNALDO MUJICA</a></h3>
                            <p> Developer Frontend</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ asset('uniblock/img/gallery/team5.png') }}" alt="">
                        </div>
                        <div class="team-caption team-caption2">
                            <h3><a href="#">JOHAN ROJAS</a></h3>
                            <p> Developer Frontend</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ asset('uniblock/img/gallery/team2.png') }}" alt="">
                        </div>
                        <div class="team-caption team-caption2">
                            <h3><a href="#"> HACKER MAN</a></h3>
                            <p> Co Founder</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="single-team mb-30">
                        <div class="team-img">
                            <img src="{{ asset('uniblock/img/gallery/team6.png') }}" alt="">
                        </div>
                        <div class="team-caption team-caption2">
                            <h3><a href="#">PEPSI MAN</a></h3>
                            <p> Co Founder</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Brand Area End -->

    </main>


@endsection
