@extends('welcome')
@section('title','Blog - Iglesia Centro Refugio Hefzi-bá')
@section('content')

<section id="home" class="video-hero js-fullheight" style="height: 700px; background-image: url(/images/front/banner/blog.png);  background-size:cover; background-position: center center;background-attachment:fixed;" data-section="home">
  <div class="overlay js-fullheight"></div>
  <div class="container">
    <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
      <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
        <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span><a href="{{url('/')}}">Home</a></span> <span class="mr-2">Blog_Hefzi-bá</span></p>
        <h1 class="mb-3 mt-0 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Blog Hefzi-bá</h1>
      </div>
    </div>
  </div>
</section>

<!-- ******************************************************* MODULO DE ACTIVITY ************************************************* -->

@include('front.component.bible-study')

<!-- ******************************************************* MODULO DE ACTIVITY ************************************************* -->

<section class="ftco-section">
  <div class="container">
    <div class="row">
      
    @if ($posts -> isNotEmpty())
      @foreach ($posts as $post)
          
      
      <div class="col-md-4 ftco-animate">
        <div class="blog-entry">
            
          <a href="{{ route('blog.post', $post->slug) }}" class="block-20" style="background-image: url('/images/front/blog/{{ $post -> img }}');"></a>



          
          <div class="text p-4 d-block">
            <div class="meta mb-3">
              <div><a href="#">{{ date('d M Y', strtotime($post -> created_at)) }}</a></div>
              <!-- <div><a href="#">Admin</a></div>
              <div><a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a></div> -->
            </div>
            <h3 class="heading"><a href="{{ route('blog.post', $post->slug) }}">{!! substr($post['title'], 0, 63) !!}</a></h3>
          </div>
        </div>
      </div>

      @endforeach
      
      @else
        <h1>NO HAY RESULTADO</h1>
      @endif



    </div>
    <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          
          @if ($posts->hasPages())
            <nav class="blog-pagination justify-content-center d-flex">
              <ul class="pagination">
    
                @if ($posts->onFirstPage())
                  <li class="disabled"><span>Atrás</span></li>
                @else
                  <li><a href="{!! $posts->previousPageUrl() !!}">Atrás</a></li>
                @endif
      
                @if ($posts->onFirstPage())
      
                @else
                  <li ><a  href="{!! $posts->previousPageUrl() !!}">{!! $posts->currentPage()-1 !!}</a></li>
                @endif
                
                <li class="active">
                  <span >
                    {!! $posts->currentPage() !!}
                    <span class="sr-only">(current)</span>
                  </span>
                </li>
                
                @if ($posts -> hasMorePages())
                  <li ><a  href="{!! $posts->nextPageUrl() !!}">{!! $posts->currentPage()+1 !!}</a></li>
                @else
                  
                @endif

                @if ($posts -> hasMorePages())
                  <li ><a  href="{!! $posts->nextPageUrl() !!}">Sigs</a></li>
                @else
                  <li class=" disabled"><span>Sigs</span></li>
                @endif
              </ul>
            </nav>
          @endif 

        </div>
      </div>
    </div>
  </div>
</section>





@endsection