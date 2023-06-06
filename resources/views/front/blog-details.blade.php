@extends('welcome')
<?php $titleTag = htmlspecialchars($post->title); ?>
@section('title', "Uniblock | $titleTag")
@section('content')


<main>
    <!--? Hero Start -->
    <div class="slider-area2">
       <div class="slider-height2 d-flex align-items-center">
             <div class="container">
                <div class="row">
                   <div class="col-xl-12">
                         <div class="hero-cap hero-cap2 text-center">
                            <h2>{!! $titleTag !!}</h2>
                         </div>
                   </div>
                </div>
             </div>
       </div>
    </div>
    <!-- Hero End -->
    <!--================Blog Area =================-->
    <section class="blog_area single-post-area section-padding">
       <div class="container">
          <div class="row">
             <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <h2 style="color: blue; font-size: 175%"><b>{!! substr($post['title'], 0, 150) !!}</b></h2><br>

                @if ($post -> url_video == true)

                <div class="sermons2" style="margin-bottom: 0em">
                       <a type="button" class="img mb-3 d-flex justify-content-center align-items-center" style="background-image: url(/uniblock/img/blog/{{ $post->img }});" data-toggle="modal" data-target="#exampleModal2">
                           <div class="icon d-flex justify-content-center align-items-center">
                               <span class="icon-play"></span>
                           </div>
                       </a>
                   </div>

                @elseif ($post -> url_video == null)
                    <div class="feature-img">
                        <img class="img-fluid" src="/uniblock/img/blog/{{ $post->img }}" alt="">
                    </div>
                @else
                @endif


                   <div class="blog_details">
                      <h6 style="color: #2d2d2d;">{!! substr($post['excerpt'], 0, 250) !!}</h6>
                      <span class="blog-info-link mt-3 mb-4">
                         <li><a href="#"><i class="fa fa-user"></i> Admin</a></li>
                         <li><a href="#"><i class="fa fa-eye"></i>@if( $post->views >= 1 ) {!! $post->views !!} @else {!! $post->views !!}  @endif visualizaciones</a></li>
                         <li><a href="#"><i class="fa fa-calendar"></i> {!! date('d M Y', strtotime($post -> created_at)) !!}</a></li>
                         <li><a href="#"><i class="fa fa-comments"></i> {{ count($comment) }}</a></li>

                         <li><a @foreach($iplike as $value) @if($value->REMOTE_ADDR_like == true) style="color: #007bff !important" @else @endif @endforeach href="{{ route('blog.like', ['slug' => $post->slug]) }}">       <i class="fa fa-thumbs-up"></i> @if ($like -> isNotEmpty()) @foreach($like as $likes) {{ $likes->like }} @endforeach @else 0 @endif </a></li>
                         <li><a @foreach($iplike as $value) @if($value->REMOTE_ADDR_dislike == true) style="color: #007bff !important" @else @endif @endforeach href="{{ route('blog.dislike', ['slug' => $post->slug]) }}"><i class="fa fa-thumbs-down"></i> @if ($like -> isNotEmpty()) @foreach($like as $likes) {{ $likes->dislike }} @endforeach @else 0 @endif </a></li>
                        </span>
                        <hr>
                      <p class="excert" align="justify">
                         {!! $post->content !!}
                      </p>


                   </div>
                </div>
                <div class="navigation-top">
                   <div class="d-sm-flex justify-content-between text-center">
                      <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span> @if ($like -> isNotEmpty()) @foreach($like as $likes) {{ $likes->like }} @endforeach @else 0 @endif
                         like</p>
                      <div class="col-sm-4 text-center my-2 my-sm-0">
                         <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                      </div>
                      <ul class="social-icons">
                         <li><a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a></li>
                         <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                         <li><a href="#"><i class="fab fa-google"></i></a></li>
                         <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                      </ul>
                   </div>


                <!--
                   <div class="navigation-area">
                      <div class="row">
                         <div
                            class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                            <div class="thumb">
                               <a href="#">
                                  <img class="img-fluid" src="assets/img/post/preview.png" alt="">
                               </a>
                            </div>
                            <div class="arrow">
                               <a href="#">
                                  <span class="lnr text-white ti-arrow-left"></span>
                               </a>
                            </div>
                            <div class="detials">
                               <p>Prev Post</p>
                               <a href="#">
                                  <h4 style="color: #2d2d2d;">Space The Final Frontier</h4>
                               </a>
                            </div>
                         </div>
                         <div
                            class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                            <div class="detials">
                               <p>Next Post</p>
                               <a href="#">
                                  <h4 style="color: #2d2d2d;">Telescopes 101</h4>
                               </a>
                            </div>
                            <div class="arrow">
                               <a href="#">
                                  <span class="lnr text-white ti-arrow-right"></span>
                               </a>
                            </div>
                            <div class="thumb">
                               <a href="#">
                                  <img class="img-fluid" src="assets/img/post/next.png" alt="">
                               </a>
                            </div>
                         </div>
                      </div>
                   </div>
                -->


                </div>

                @foreach($author as $authors)
                <div class="blog-author">
                   <div class="media align-items-center">
                      <img src="{{ asset('/uniblock/img/gallery/',$authors->img)}}" alt="">
                      <div class="media-body">
                         <a href="#">
                            <h4>{!! $authors->name !!}</h4>
                         </a>
                         <p>{!! $authors->content !!}</p>
                      </div>
                   </div>
                </div>
                @endforeach



<!--
                <div class="comments-area">
                   <h4>05 Comments</h4>
                   <div class="comment-list">
                      <div class="single-comment justify-content-between d-flex">
                         <div class="user justify-content-between d-flex">
                            <div class="thumb">
                               <img src="assets/img/comment/comment_1.png" alt="">
                            </div>
                            <div class="desc">
                               <p class="comment">
                                  Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                  Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                               </p>
                               <div class="d-flex justify-content-between">
                                  <div class="d-flex align-items-center">
                                     <h5>
                                        <a href="#">Emilly Blunt</a>
                                     </h5>
                                     <p class="date">December 4, 2017 at 3:12 pm </p>
                                  </div>
                                  <div class="reply-btn">
                                     <a href="#" class="btn-reply text-uppercase">reply</a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="comment-list">
                      <div class="single-comment justify-content-between d-flex">
                         <div class="user justify-content-between d-flex">
                            <div class="thumb">
                               <img src="assets/img/comment/comment_2.png" alt="">
                            </div>
                            <div class="desc">
                               <p class="comment">
                                  Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                  Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                               </p>
                               <div class="d-flex justify-content-between">
                                  <div class="d-flex align-items-center">
                                     <h5>
                                        <a href="#">Emilly Blunt</a>
                                     </h5>
                                     <p class="date">December 4, 2017 at 3:12 pm </p>
                                  </div>
                                  <div class="reply-btn">
                                     <a href="#" class="btn-reply text-uppercase">reply</a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   <div class="comment-list">
                      <div class="single-comment justify-content-between d-flex">
                         <div class="user justify-content-between d-flex">
                            <div class="thumb">
                               <img src="assets/img/comment/comment_3.png" alt="">
                            </div>
                            <div class="desc">
                               <p class="comment">
                                  Multiply sea night grass fourth day sea lesser rule open subdue female fill which them
                                  Blessed, give fill lesser bearing multiply sea night grass fourth day sea lesser
                               </p>
                               <div class="d-flex justify-content-between">
                                  <div class="d-flex align-items-center">
                                     <h5>
                                        <a href="#">Emilly Blunt</a>
                                     </h5>
                                     <p class="date">December 4, 2017 at 3:12 pm </p>
                                  </div>
                                  <div class="reply-btn">
                                     <a href="#" class="btn-reply text-uppercase">reply</a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                </div>
            -->








                <div class="comment-form">
                   <h4>Deja un comentario</h4>
                   <form  class="form-contact comment_form"  action="{{ route('comment.submit', $post->id) }}" method="post" novalidate="novalidate" id="commentForm">
                    @csrf
                    <input class="form-control" name="_token" id="_token" type="hidden" value="{{csrf_token()}}">
                    <input class="form-control" name="user_id" id="user_id" type="hidden" value="{{ $post->user_id }}">
                      <div class="row">
                         <div class="col-12">
                            <div class="form-group">
                               <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="6" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ingrese su mensaje'" placeholder='Ingrese su mensaje' required></textarea>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                               <input type="text" class="form-control" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre'" placeholder='Nombre' required>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                               <input class="form-control" name="email" id="email" type="email" onfocus="this.placeholder = ''"
                onblur="this.placeholder = 'Correo Electronico'" placeholder='Correo Electronico' required>
                            </div>
                         </div>
                         <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" name="cell" id="cell" type="tel" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}-[0-9]{4}" onfocus="this.placeholder = ''"
                                onblur="this.placeholder = 'Teléfono Celular'" placeholder='Teléfono Celular'>
                            </div>
                         </div>
                         <div class="col-6">
                            <div class="form-group">
                                <input class="form-control" name="website" id="website" type="url" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Página Web'" placeholder='Página Web'>
                            </div>
                         </div>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Publicar Comentario</button>
                      </div>
                   </form>
                </div>






             </div>
             <div class="col-lg-4">
                <div class="blog_right_sidebar">
                   <aside class="single_sidebar_widget search_widget">
                    <form action="{{ URL::to('/blog') }}" method="GET" class="search-form">
                         <div class="form-group">
                            <div class="input-group mb-3">
                               <input type="text" name="search" id="search" class="form-control" placeholder='Buscar'
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Buscar'">
                                <div class="input-group-append">
                                  <button class="btns" type="button"><i class="ti-search"></i></button>
                               </div>
                            </div>
                         </div>
                         <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                            type="submit">Buscar</button>
                      </form>
                   </aside>




                   <aside class="single_sidebar_widget post_category_widget">
                      <h4 class="widget_title" style="color: #2d2d2d;">Categorias</h4>
                      <ul class="list cat-list">

                        @foreach ($categories as $category)
                        <li><a  class="d-flex" href="{{ route('blog.categories', ['slug' => $category->slug]) }}">{{ $category->title }}
                                <span>({{ count($category->posts) }})</span> </a></li>
                        @endforeach

                      </ul>
                   </aside>


                   <aside class="single_sidebar_widget popular_post_widget">
                      <h3 class="widget_title" style="color: #160f0f;">Post Recientes</h3>


                      @foreach ($recentpost as $recentposts)
                      <div class="media post_item">
                        <a href="{{ route('blog.post', ['slug' => $recentposts->slug]) }}">
                            <img src="/uniblock/img/post/post_1.png" alt="post">
                        </a>
                        <div class="media-body">
                            <a href="{{ route('blog.post', ['slug' => $recentposts->slug]) }}">
                                <h3 style="color: #2d2d2d;">{!! substr($recentposts['title'], 0, 100) !!} </h3>
                            </a>
                            <p>{{ date('d M Y', strtotime($recentposts->created_at)) }}</p>
                         </div>
                      </div>
                      @endforeach

                   </aside>
                   <aside class="single_sidebar_widget tag_cloud_widget">
                      <h4 class="widget_title" style="color: #2d2d2d;">Etiquetas</h4>
                      <ul class="list">

                        @foreach ($tags as $tag)
                        <a href="{{ route('blog.tags', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
                        @endforeach

                      </ul>
                   </aside>


                   <aside class="single_sidebar_widget instagram_feeds">
                      <h4 class="widget_title" style="color: #2d2d2d;">Instagram Feeds</h4>
                      <ul class="instagram_row flex-wrap">
                         <li>
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                            </a>
                         </li>
                         <li>
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                            </a>
                         </li>
                         <li>
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                            </a>
                         </li>
                         <li>
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                            </a>
                         </li>
                         <li>
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                            </a>
                         </li>
                         <li>
                            <a href="#">
                               <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                            </a>
                         </li>
                      </ul>
                   </aside>
                   <aside class="single_sidebar_widget newsletter_widget">
                      <h4 class="widget_title" style="color: #2d2d2d;">Newsletter</h4>
                      <form action="#">
                         <div class="form-group">
                            <input type="email" class="form-control" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Email'" placeholder='Enter email' required>
                         </div>
                         <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                            type="submit">Suscribir</button>
                      </form>
                   </aside>
                </div>
             </div>
          </div>
       </div>
    </section>
    <!--================ Blog Area end =================-->
 </main>



@endsection
