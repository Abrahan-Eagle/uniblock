@extends('welcome')
@section('title', 'Eventos - Iglesia Centro Refugio Hefzi-bá')
@section('content')


    <section id="home" class="video-hero js-fullheight"
        style="height: 700px; background-image: url(/images/front/banner/event.jpg);  background-size:cover; background-position: center center;background-attachment:fixed;"
        data-section="home">
        <div class="overlay js-fullheight"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center"
                data-scrollax-parent="true">
                <div class="col-md-10 ftco-animate text-center" data-scrollax=" properties: { translateY: '70%' }">
                    <p class="breadcrumbs mb-2" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span><a
                                href="{{ url('/') }}">Home</a></span> <span class="mr-2">Eventos</span></p>
                    <h1 class="mb-3 mt-0 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Eventos</h1>
                </div>
            </div>
        </div>
    </section>


<!-- ******************************************************* MODULO DE ACTIVITY ************************************************* -->

@include('front.component.bible-study')

<!-- ******************************************************* MODULO DE ACTIVITY ************************************************* -->




    <section class="ftco-section ftco-section-2">
        <div class="container">
            <div class="row">
                @if ($posts->isNotEmpty())
                    @foreach ($posts as $post)
                          <div class="col-md-6">
                            <div class="event-entry d-flex ftco-animate fadeInUp ftco-animated">
                                <div class="meta mr-4">
                                    <p>
                                        <span>{{ date('d', strtotime($post->date_activi)) }}</span>
                                        <span>{{ date('M Y', strtotime($post->date_activi)) }}</span>
                                    </p>
                                </div>
                                <div class="text">
                                    <h3 class="mb-2"><a href="{{ route('event.post', $post->slug) }}">{!!
                                            substr($post['title'], 0, 50) !!} </a></h3>
                                    <p class="mb-4"><span>{{ date('H:i A', strtotime($post->date_activi)) }} en
                                        {{$post -> countries_name}} Edo. {{$post -> states_name}} {{$post -> cities_name}} {{ $post->direccion }}</span></p>
                                    <a href="{{ route('event.post', $post->slug) }}" class="img mb-4"
                                        style="background-image: url(/images/front/event/{!! $post->img !!});"></a>
                                    <p>{!! substr($post['content'], 0, 95) !!} </p>
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
                                        <li><a href="{!!  $posts->previousPageUrl() !!}">Atrás</a></li>
                                    @endif

                                    @if ($posts->onFirstPage())

                                    @else
                                        <li><a href="{!!  $posts->previousPageUrl() !!}">{!! $posts->currentPage() - 1
                                                !!}</a></li>
                                    @endif

                                    <li class="active">
                                        <span>
                                            {!! $posts->currentPage() !!}
                                            <span class="sr-only">(current)</span>
                                        </span>
                                    </li>

                                    @if ($posts->hasMorePages())
                                        <li><a href="{!!  $posts->nextPageUrl() !!}">{!! $posts->currentPage() + 1 !!}</a>
                                        </li>
                                    @else

                                    @endif

                                    @if ($posts->hasMorePages())
                                        <li><a href="{!!  $posts->nextPageUrl() !!}">Sigs</a></li>
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
