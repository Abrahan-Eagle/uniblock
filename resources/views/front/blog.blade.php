@extends('welcome')
@section('title','Blog - Uniblock')
@section('content')
<main>
    <!--? Hero Start -->
    <div class="slider-area2">
        <div class="slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap hero-cap2 text-center">
                            <h2>Blog</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!--================Blog Area =================-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">


                        @if ($posts -> isNotEmpty())
                        @foreach ($posts as $post)
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <a href="{{ route('blog.post', $post->slug) }}">
                                    <img class="card-img rounded-0" src="uniblock/img/blog/{{ $post -> img }}" alt="">
                                </a>
                                <span class="blog_item_date">
                                    <h3>{{ date('d', strtotime($post -> created_at)) }}</h3>
                                    <p>{{ date('M', strtotime($post -> created_at)) }}</p>
                                </span>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="{{ route('blog.post', $post->slug) }}">
                                    <h2 class="blog-head" style="color: #2d2d2d;">{!! substr($post['title'], 0, 63) !!}</h2>

                                <a href="{{ route('blog.post', $post->slug) }}">
                                    <p>{!! substr($post['excerpt'], 0, 250) !!}</p>
                                </a>
                                <ul class="blog-info-link">
                                    <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article>

                        @endforeach

                        @else
                            <h1>NO HAY RESULTADO</h1>
                        @endif

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









                <div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Buscar'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Buscar'">
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
                            <h4 class="widget_title" style="color: #2d2d2d;">Categoria</h4>
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
                                        <p>21</p>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="d-flex">
                                        <p>Health Care (21)</p>
                                        <p>09</p>
                                    </a>
                                </li>
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget tag_cloud_widget">
                            <h4 class="widget_title" style="color: #2d2d2d;">Etiquetas</h4>
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
                                        <img class="img-fluid" src="uniblock/img/post/post_5.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="uniblock/img/post/post_6.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="uniblock/img/post/post_7.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="uniblock/img/post/post_8.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="uniblock/img/post/post_9.png" alt="">
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <img class="img-fluid" src="uniblock/img/post/post_10.png" alt="">
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
                                    type="submit">Suscribir</button>
                            </form>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================Blog Area =================-->
</main>
@endsection
