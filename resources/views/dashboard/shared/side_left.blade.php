@guest
@else

<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
  <div class="c-sidebar-brand d-lg-down-none">
    <a href="{{ url('/') }}">
      <svg class="c-sidebar-brand-full" width="250" height="46" alt="Centro Refugio Hefzi-bá Logo">
        <a href="{{ url('/') }}">
          <text x="17" y="30" fill="#055e94" style="font-size: 20px">Centro Refugio Hefzi-bá</text>
      </svg>

      <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="Centro Refugio Hefzi-bá Logo">
        <text x="0" y="30" fill="#055e94" style="font-size: 20px">CRH</text>
      </svg>
    </a>
  </div>





  <ul class="c-sidebar-nav" data-drodpown-accordion="true">
    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{url('/home')}}">
        <svg class="c-sidebar-nav-icon">

          <use xlink:href="{{asset('icons/sprites/free.svg#cil-bank')}}"></use>

        </svg>Dashboard
        <!--<span class="badge badge-info">HACKER NEW</span>--></a></li>

    <li class="c-sidebar-nav-title">Menu</li>

<!--

          
            <li class="c-sidebar-nav-item">
              <a class="c-sidebar-nav-link" href="">
              <svg class="c-sidebar-nav-icon">
                <use xlink:href="{{asset('icons/sprites/free.svg#cil-address-book')}}"></use>
              </svg>Guia para el promotor</a>
            </li>
          

          -->

          <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href=""></use>
            </svg> Patrocinantes y Autores</a>
            <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('authors.index') }}"> Autor</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('sponsors.index') }}"> Patrocinante</a></li>
            </ul>
            </li>


            <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
              <svg class="c-sidebar-nav-icon">
              <use xlink:href=""></use>
              </svg> Event</a>
              <ul class="c-sidebar-nav-dropdown-items">
              <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('categories-event.index', ['level' => 'event']) }}"> Categorias</a></li>
              <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('tags-event.index', ['level' => 'event']) }}"> Etiquetas</a></li>
              <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('posts-event.index', ['level' => 'event']) }}"> Post</a></li>
              </ul>
              </li> 


          <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href=""></use>
            </svg> Sermon</a>
            <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('categories-sermon.index', ['level' => 'sermon']) }}"> Categorias</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('tags-sermon.index', ['level' => 'sermon']) }}"> Etiquetas</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('posts-sermon.index', ['level' => 'sermon']) }}"> Post</a></li>
            </ul>
            </li>



          <li class="c-sidebar-nav-dropdown"><a class="c-sidebar-nav-dropdown-toggle" href="#">
            <svg class="c-sidebar-nav-icon">
            <use xlink:href=""></use>
            </svg> Blog</a>
            <ul class="c-sidebar-nav-dropdown-items">
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('categories.index', ['level' => 'blog']) }}"> Categorias</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('tags.index', ['level' => 'blog']) }}"> Etiquetas</a></li>
            <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('posts.index', ['level' => 'blog']) }}"> Post</a></li>
            </ul>
            </li>





  </ul>





  <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent"
    data-class="c-sidebar-minimized"></button>
</div>

@endguest