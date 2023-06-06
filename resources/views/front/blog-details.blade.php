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
                </div>

                @foreach($author as $authors)
                <div class="blog-author">
                   <div class="media align-items-center">
                      <img src="{{ asset('uniblock/img/gallery/'), $authors->img }}" alt="">
                      <div class="media-body">
                         <a href="#">
                            <h4>{!! $authors->name !!}</h4>
                         </a>
                         <p>{!! $authors->content !!}</p>
                      </div>
                   </div>
                </div>
                @endforeach


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
                <div class="comment-form">
                   <h4>Leave a Reply</h4>
                   <form class="form-contact comment_form" action="#" id="commentForm">
                      <div class="row">
                         <div class="col-12">
                            <div class="form-group">
                               <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                  placeholder="Write Comment"></textarea>
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                               <input class="form-control" name="name" id="name" type="text" placeholder="Name">
                            </div>
                         </div>
                         <div class="col-sm-6">
                            <div class="form-group">
                               <input class="form-control" name="email" id="email" type="email" placeholder="Email">
                            </div>
                         </div>
                         <div class="col-12">
                            <div class="form-group">
                               <input class="form-control" name="website" id="website" type="text" placeholder="Website">
                            </div>
                         </div>
                      </div>
                      <div class="form-group">
                         <button type="submit" class="button button-contactForm btn_1 boxed-btn">Post Comment</button>
                      </div>
                   </form>
                </div>
             </div>
             <div class="col-lg-4">
                <div class="blog_right_sidebar">
                   <aside class="single_sidebar_widget search_widget">
                      <form action="#">
                         <div class="form-group">
                            <div class="input-group mb-3">
                               <input type="text" class="form-control" placeholder='Search Keyword'
                                  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                               <div class="input-group-append">
                                  <button class="btns" type="button"><i class="ti-search"></i></button>
                               </div>
                            </div>
                         </div>
                         <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                            type="submit">Search</button>
                      </form>
                   </aside>
                   <aside class="single_sidebar_widget post_category_widget">
                      <h4 class="widget_title" style="color: #2d2d2d;">Category</h4>
                      <ul class="list cat-list">
                         <li>
                            <a href="#" class="d-flex">
                               <p>Resaurant food</p>
                               <p>(37)</p>
                            </a>
                         </li>
                         <li>
                            <a href="#" class="d-flex">
                               <p>Travel news</p>
                               <p>(10)</p>
                            </a>
                         </li>
                         <li>
                            <a href="#" class="d-flex">
                               <p>Modern technology</p>
                               <p>(03)</p>
                            </a>
                         </li>
                         <li>
                            <a href="#" class="d-flex">
                               <p>Product</p>
                               <p>(11)</p>
                            </a>
                         </li>
                         <li>
                            <a href="#" class="d-flex">
                               <p>Inspiration</p>
                               <p>(21)</p>
                            </a>
                         </li>
                         <li>
                            <a href="#" class="d-flex">
                               <p>Health Care</p>
                               <p>(21)</p>
                            </a>
                         </li>
                      </ul>
                   </aside>
                   <aside class="single_sidebar_widget popular_post_widget">
                      <h3 class="widget_title" style="color: #2d2d2d;">Recent Post</h3>
                      <div class="media post_item">
                         <img src="assets/img/post/post_1.png" alt="post">
                         <div class="media-body">
                            <a href="blog_details.html">
                               <h3 style="color: #2d2d2d;">From life was you fish...</h3>
                            </a>
                            <p>January 12, 2019</p>
                         </div>
                      </div>
                      <div class="media post_item">
                         <img src="assets/img/post/post_2.png" alt="post">
                         <div class="media-body">
                            <a href="blog_details.html">
                               <h3 style="color: #2d2d2d;">The Amazing Hubble</h3>
                            </a>
                            <p>02 Hours ago</p>
                         </div>
                      </div>
                      <div class="media post_item">
                         <img src="assets/img/post/post_3.png" alt="post">
                         <div class="media-body">
                            <a href="blog_details.html">
                               <h3 style="color: #2d2d2d;">Astronomy Or Astrology</h3>
                            </a>
                            <p>03 Hours ago</p>
                         </div>
                      </div>
                      <div class="media post_item">
                         <img src="assets/img/post/post_4.png" alt="post">
                         <div class="media-body">
                            <a href="blog_details.html">
                               <h3 style="color: #2d2d2d;">Asteroids telescope</h3>
                            </a>
                            <p>01 Hours ago</p>
                         </div>
                      </div>
                   </aside>
                   <aside class="single_sidebar_widget tag_cloud_widget">
                      <h4 class="widget_title" style="color: #2d2d2d;">Tag Clouds</h4>
                      <ul class="list">
                         <li>
                            <a href="#">project</a>
                         </li>
                         <li>
                            <a href="#">love</a>
                         </li>
                         <li>
                            <a href="#">technology</a>
                         </li>
                         <li>
                            <a href="#">travel</a>
                         </li>
                         <li>
                            <a href="#">restaurant</a>
                         </li>
                         <li>
                            <a href="#">life style</a>
                         </li>
                         <li>
                            <a href="#">design</a>
                         </li>
                         <li>
                            <a href="#">illustration</a>
                         </li>
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
                               onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                         </div>
                         <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                            type="submit">Subscribe</button>
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
