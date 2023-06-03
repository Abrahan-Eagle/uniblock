<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('uniblock/img/favicon.ico') }}" type="image/ico">

        <link rel="stylesheet" href="{{ asset('css/app_f.css')}}">
        <link rel="stylesheet" href="{{ asset('uniblock/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('uniblock/css/slicknav.css')}}">
        <link rel="stylesheet" href="{{ asset('uniblock/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{ asset('uniblock/css/gijgo.css')}}">
        <link rel="stylesheet" href="{{ asset('uniblock/css/animate.min.css')}}">
        <link rel="stylesheet" href="{{ asset('uniblock/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{ asset('uniblock/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{ asset('uniblock/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{ asset('uniblock/css/nice-select.css')}}">


        @toastr_css


        <style>
            .up-nav{
                top:-65px !important;
                left: 350px !important;
            }

            .up-nav2{
                top:-565px !important;
            }
        </style>

    </head>

    <body>
        <!-- ? Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <img src="{{ asset('uniblock/img/logo/loder.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Preloader Start -->
    <header>
        <!--? Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-1">
                            <div class="logo">
                                <a href="{{url('/')}}"><img src="{{ asset('uniblock/img/logo/logo.png') }} " alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <div class="menu-main d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                <div class="main-menu f-right d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <li class="{{Request::is('/')?'active':''}}"><a href="{{url('/')}}">Home</a></li>
                                            <li class="{{Request::is('about')?'active':''}}"><a href="{{url('/about')}}">Nosotros</a></li>
                                            <li class="{{Request::is('projects')?'active':''}}"><a href="{{url('/projects')}}">Proyectos</a></li>
                                            <li class="{{Request::is('events')?'active':''}}"><a href="{{url('/events')}}">Eventos</a></li>
                                            <li class="{{Request::is('blog')?'active':''}}"><a href="{{url('/blog')}}">Blog</a></li>
                                            <li class="{{Request::is('contact')?'active':''}}"><a href="{{url('/contact')}}" class="nav-link">Contactanos</a></li>


                                            @if (Route::has('login'))
                                            <li>
                                                @guest
                                                <a href="blog.html">
                                                    Login
                                                </a>
                                                @endguest
                                                @auth
                                                <a href="{{ url('/home') }}">Dashboard</a>
                                                @else
                                                <ul class="submenu">
                                                    <li><a href="{{ route('login') }}">Login</a></li>
                                                    @if (Route::has('register'))
                                                    <li><a href="{{ route('register') }}">Registrar</a></li>
                                                    @endif
                                                </ul>
                                                @endauth
                                            </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

  <!-- ***************************************************** END NAVBAR ***************************************************** -->
  <!-- *****************************************************   CENTER   ***************************************************** -->

  @yield('content')

  <!-- ***************************************************** END CENTER ***************************************************** -->
  <!-- *****************************************************  FOOTER ***************************************************** -->



        <footer>
            <!-- Footer Start-->
            <div class="footer-area footer-padding">
                <div class="container">
                    <div class="row d-flex justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                           <div class="single-footer-caption mb-50">
                             <div class="single-footer-caption mb-30">
                                 <div class="footer-tittle">
                                     <h4>Sobre nosotros</h4>
                                     <div class="footer-pera">
                                         <p>Descubre nuestra historia y pasión.</p>
                                    </div>
                                 </div>
                             </div>
                           </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Contactanos</h4>
                                    <ul>

                                        <li><a href="#">Telf : +58 555555</a></li>
                                        <li><a href="#">Whatsapp : +58 555555</a></li>
                                        <li><a href="#">Email : info@hackers.com</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Links</h4>
                                    <ul>
                                        <li class="{{Request::is('proyects')?'active':''}}"><a href="{{url('/proyects')}}">Nuestros Projectos</a></li>
                                        <li class="{{Request::is('contact')?'active':''}}"><a href="{{url('/contact')}}">Contactanos</a></li>
                                        <li class="{{Request::is('testimony')?'active':''}}"><a href="{{url('/contact')}}">Testimonio</a></li>
                                        <li class="{{Request::is('support')?'active':''}}"><a href="{{url('/support')}}">Suporte</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-5">
                            <div class="single-footer-caption mb-50">
                                <div class="footer-tittle">
                                    <h4>Newsletter</h4>
                                    <div class="footer-pera footer-pera2">
                                     <p>Recibe nuestro Newsletter con las últimas novedades tecnológicas.</p>
                                 </div>
                                 <!-- Form -->
                                 <div class="footer-form" >
                                     <div id="mc_embed_signup">
                                         <form target="_blank" action=""
                                         method="get" class="subscribe_form relative mail_part">
                                             <input type="email" name="email" id="newsletter-form-email" placeholder="Correo Electrónico"
                                             class="placeholder hide-on-focus" onfocus="this.placeholder = ''"
                                             onblur="this.placeholder = ' Email '">
                                             <div class="form-icon">
                                                 <button type="submit" name="submit" id="newsletter-submit"
                                                 class="email_icon newsletter-submit button-contactForm">
                                                 <img src="{{ asset('uniblock/img/gallery/form.png') }}" alt=""></button>
                                             </div>
                                             <div class="mt-10 info"></div>
                                         </form>
                                     </div>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <!--  -->
                   <div class="row footer-wejed justify-content-between">
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <!-- logo -->
                            <div class="footer-logo mb-20">
                            <a href="{{url('/')}}"><img src="{{ asset('uniblock/img/logo/logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                        <div class="footer-tittle-bottom">
                            <span>77</span>
                            <p>Clientes Satisfechos</p>
                        </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <div class="footer-tittle-bottom">
                                <span>50+</span>
                                <p>Trabajos Realizados</p>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-5">
                            <!-- Footer Bottom Tittle -->
                            <div class="footer-tittle-bottom">
                                <span>7</span>
                                <p>Patrocinantes</p>
                            </div>
                        </div>
                   </div>
                </div>
            </div>
            <!-- footer-bottom area -->
            <div class="footer-bottom-area footer-bg">
                <div class="container">
                    <div class="footer-border">
                         <div class="row d-flex justify-content-between align-items-center">
                             <div class="col-xl-10 col-lg-8 ">
                                 <div class="footer-copy-right">
                                     <p>
      Copyright &copy;<script>document.write(new Date().getFullYear());</script> Reservados todos los derechos | Tecnologia  <i class="fa fa-heart" aria-hidden="true"></i><a href="{{url('/')}}"> UniBlock </a></p>
                                 </div>
                             </div>
                             <div class="col-xl-2 col-lg-4">
                                 <div class="footer-social f-right">
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fas fa-globe"></i></a>
                                    <a href="#"><i class="fab fa-behance"></i></a>
                                 </div>
                             </div>
                         </div>
                    </div>
                </div>
            </div>
            <!-- Footer End-->
        </footer>
        <!-- Scroll Up -->
        <div id="back-top" >
            <a title="Arriba" href="#"> <i class="fas fa-level-up-alt"></i></a>
        </div>

    <!-- Preloader Start -->
  <script src="{{asset('js/app_f.js')}}" defer></script>
  </body>
    @jquery
    @toastr_js
    @toastr_render

</html>
