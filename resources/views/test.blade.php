@extends('layouts.app')
@section('content')
    {{--{{$slider}}--}}

    <header>
        <div id="myCarousel" class="carousel_slide" data-ride="carousel">
            <!-- Indicators -->

            <ol class="carousel-indicators">
                @foreach($slider as $slid)
                    @if($loop->index+1 == count($slider) )
                        <li data-target="#myCarousel" data-slide-to="{{$loop->index}}" class="active"></li>
                    @else
                        <li data-target="#myCarousel" data-slide-to="{{$loop->index}}"></li>

                    @endif
                @endforeach

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">


                @foreach($slider as $slid)
                    @if($loop->index+1 ==count($slider) )
                        <div class="item active ">
                            @else
                                <div class="item ">


                                    @endif

                                    <img src="/{{$slid->images[0]->path}}" alt="Chicago"
                                         style="width:100%; height: 100vh">
                                    <div class="carousel-caption slider_info">
                                        <h1>{{$slid->slider_translates[0]->title}}</h1>
                                        <p>
                                            {{$slid->slider_translates[0]->description}}
                                        </p>
                                    </div>
                                </div>
                                @endforeach

                        </div>
            </div>

        </div>
    </header>

    <section class="about">

        <div class="about-section">
            <div class="container">

                <div class="about-inner-section">
                    <div class="col-md-6  col-sm-6 about-right">
                        <img src="/images/fullsizeoutput_ef3.jpeg" alt=" ">
                    </div>
                    <div class="col-md-6 col-sm-6 about-inner-column">
                        <h4>About Us </h4>
                        <p>Takenpossession of lorem Ipsum is simply dummy text of the printing and typesetting
                            industry In sit amet sapien eros Integer in tincidunt labore et dolore magna aliqua
                            remaining essentially unchanged. It was popularised in the 1960s with the release of
                            Letraset
                            sheets containing Lorem Ipsum passages.</p>

                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="place-category">

        <div class="container">
            <div class="row place-category-header text-center">

                <h3>Category Name</h3>

            </div>
        </div>

        <div class="place-body">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="CarouselPlace" class="carousel slide">


                            <!-- Carousel items -->
                            <div class="carousel-inner carousel-place">

                                <div class="item active">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div><!--.row-->
                                </div><!--.item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div><!--.row-->
                                </div><!--.item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div><!--.row-->
                                </div><!--.item-->

                            </div><!--.carousel-inner-->
                            <a data-slide="prev" href="#CarouselPlace"
                               class="left carousel-control carouselCategory"></a>
                            <a data-slide="next" href="#CarouselPlace"
                               class="right carousel-control carouselCategory"></a>
                        </div><!--.Carousel-->

                    </div>
                </div>
            </div><!--.container-->
        </div>
    </section>

    <section class="place-category">

        <div class="container">
            <div class="row place-category-header text-center">

                <h3>Category Name1</h3>

            </div>
        </div>

        <div class="place-body">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="CarouselPlaceCategory" class="carousel slide">


                            <!-- Carousel items -->
                            <div class="carousel-inner carousel-place">

                                <div class="item active">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div><!--.row-->
                                </div><!--.item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div><!--.row-->
                                </div><!--.item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div><!--.row-->
                                </div><!--.item-->

                            </div><!--.carousel-inner-->
                            <a data-slide="prev" href="#CarouselPlaceCategory"
                               class="left carousel-control carouselCategory"></a>
                            <a data-slide="next" href="#CarouselPlaceCategory"
                               class="right carousel-control carouselCategory"></a>
                        </div><!--.Carousel-->

                    </div>
                </div>
            </div><!--.container-->
        </div>
    </section>


    <section class="place-category">

        <div class="container">
            <div class="row place-category-header text-center">

                <h3>Category Name2</h3>

            </div>
        </div>

        <div class="place-body">

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="CarouselPlaceCategory2" class="carousel slide">


                            <!-- Carousel items -->
                            <div class="carousel-inner carousel-place">

                                <div class="item active">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div><!--.row-->
                                </div><!--.item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div><!--.row-->
                                </div><!--.item-->

                                <div class="item">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        col-sm-6col-sm-6
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                    </div><!--.row-->
                                </div><!--.item-->

                            </div><!--.carousel-inner-->
                            <a data-slide="prev" href="#CarouselPlaceCategory2"
                               class="left carousel-control carouselCategory"></a>
                            <a data-slide="next" href="#CarouselPlaceCategory2"
                               class="right carousel-control carouselCategory"></a>
                        </div><!--.Carousel-->

                    </div>
                </div>
            </div><!--.container-->
        </div>
    </section>


    <section class="about_guide_section">
        <div class="about_guide"></div>
        <div class="container">
            <div class="col-md-4">
                <h3>adsads</h3>
                <p>Lorem Ipsum is simply dummy text of the printing and
                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                
                </p>
            </div>
            <div class="col-md-8">
                <div id="guideCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Carousel indicators -->

                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner guideCarouselInner">
                        <div class="item active">
                            <div class="col-md-4 text-center">
                                <img src="/images/1.jpg" alt="..." class="img-circle"
                                     style="width: 70%; height:150px ">
                            </div>
                            <div class="col-md-8">
                                <h5>name Surnam</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book.</p>
                                <button type="button" class="btn btn-primary btn-group-sm pull-right"> Information
                                </button>

                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-4 text-center">
                                <img src="/images/1.jpg" alt="..." class="img-circle"
                                     style="width: 70%; height:150px ">
                            </div>
                            <div class="col-md-8">
                                <h5>name Surnam</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book.</p>
                                <button type="button" class="btn btn-primary btn-group-sm pull-right"> Information
                                </button>

                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-4 text-center">
                                <img src="/images/1.jpg" alt="..." class="img-circle"
                                     style="width: 70%; height:150px ">
                            </div>
                            <div class="col-md-8">
                                <h5>name Surnam</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                                    when an unknown printer took a galley of type and scrambled it to make a type
                                    specimen book.</p>
                                <button type="button" class="btn btn-primary btn-group-sm pull-right"> Information
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel controls -->
                    <div class="col-md-12 guideCarouselIconse">
                            <a class="carousel-control left guideCarouselIcone" href="#guideCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>

                            <a class="carousel-control right guideCarouselIcone" href="#guideCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>


                    </div>
                </div>

            </div>
        </div>

    </section>
    <section class="placeSection">
        <div class="container-fluid">
            <div class="row place-header">
                <div class="col-md-2 selectPlace">
                    <select class="form-control" name="catgorySelect" id="catgorySelect">
                        <option>All</option>
                        @foreach($category as $cat)
                        <option>{{$cat->category_translates[0]->name}}</option>
                        @endforeach

                    </select>
                    {{--<div class="form-group has-feedback has-search">--}}
                    {{--<span class="glyphicon glyphicon-search form-control-feedback"></span>--}}
                    {{--<input type="text" class="form-control rounded-circle" placeholder="Search">--}}
                    {{--</div>--}}
                </div>
                <div class="col-md-8 text-center">
                    <h3>Place</h3>

                </div>
                <div class="col-md-2 selectPlace">
                    <select class="form-control" id="gend">
                        <option>All</option>
                        @foreach($states as $state)

                            <option> {{$state->state_translates[0]->name}}</option>

                        @endforeach
                    </select>
                </div>

                <div class="col-md-2 ">

                </div>

            </div>
        </div>

        <div class="place-body">
            <div class="container-fluid">
                <div class="row">

                    <div id="Carousel" class="carousel slide">

                        <ol class="carousel-indicators carusel-place">
                            <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#Carousel" data-slide-to="1"></li>
                            <li data-target="#Carousel" data-slide-to="2"></li>
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="item active">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>

                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>

                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>


                                    </div><!--.row-->
                                </div>

                            </div><!--.item-->

                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>

                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>

                                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>


                                    </div><!--.row-->
                                </div>

                            </div><!--.item-->


                            <div class="item">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>12
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>

                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>

                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>
                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                <img src="https://placeimg.com/300/300/people"
                                                     class="img-responsive">
                                                <figcaption>
                                                    <h1>Hello world</h1>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-info">View</button>
                                                    </div>
                                                </figcaption>
                                            </figure>
                                        </div>


                                    </div><!--.row-->
                                </div>

                            </div><!--.item-->


                        </div><!--.carousel-inner-->


                    </div><!--.Carousel-->

                </div>
            </div><!--.container-->
        </div>

    </section>
    <footer class="footer">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer_about">
                        <h3 class="text-center">More About Company</h3>
                        <p> Nemo enim ipsam voluptatem quia
                            voluptas sit aspernatur aut odit aut fugit,
                            sed quia consequuntur magni dolores eos qui
                            ratione voluptatem sequi nesciunt.</p>
                        <p class="adam">- Patrick Victoria, CEO</p>
                    </div>
                </div>
                <div class="col-md-2"></div>

                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4031.7583359838804!2d43.831458428437884!3d40.79707163131329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4041fc89f480e665%3A0xd91ab7dfb29390d!2sArmenia+Erevan!5e0!3m2!1sru!2s!4v1537447392816"
                            width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                {{--<div class="col-md-4 content_block">--}}
                {{--<h4 class="text-center">Content</h4>--}}
                {{--<ul>--}}
                {{--<li>Home</li>--}}
                {{--<li>About</li>--}}
                {{--<li>About</li>--}}
                {{--<li>About</li>--}}
                {{--<li><a href="mailto:info@example.com">contact@example.com</a> </li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--<div class="col-md-4 content_block">--}}
                {{--<h4 class="text-center">Contact Info</h4>--}}
                {{--<ul>--}}
                {{--<li>The company name</li>--}}
                {{--<li>1234567890</li>--}}
                {{--<li><a href="mailto:info@example.com">contact@example.com</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
            </div>
        </div>
    </footer>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>


    if ($('#myCarousel')) {
        console.log($('nav'));

        setTimeout(function () {
            $('nav').attr('hidden', 'hidden');

        }, 1)
        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $('nav').attr('hidden', false)
            } else {
                $('nav').attr('hidden', true)

            }
        });

    } else {

    }
</script>

