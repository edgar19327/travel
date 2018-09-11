@extends('layouts.app')
@section('content')

    <header>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">


            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item carouseltem active" id="carouseltem">
                    <img src="img/php4943.tmp1534841378.jpeg" alt="Los Angeles" style="width:100%; height: 100vh;">
                </div>

                <div class="item carouseltem">
                    <img src="img/php4943.tmp1534841378.jpeg" alt="Chicago" style=" width:100%; height: 100vh;">
                </div>

                <div class="item carouseltem">
                    <img src="img/php4943.tmp1534841378.jpeg" alt="New york" style=" width:100%; height: 100vh;">
                </div>
                <div class="background-carusel"></div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>


    <section class="placeSection">
        <div class="container-fluid">
            <div class="row place-header">

                <div class="col-md-2">
                    <div class="form-group has-feedback has-search">
                        <span class="glyphicon glyphicon-search form-control-feedback"></span>
                        <input type="text" class="form-control rounded-circle" placeholder="Search">
                    </div>
                </div>
                <div class="col-md-8 text-center">
                    <h3>Place</h3>

                </div>
                <div class="col-md-2 selectPlace">
                    <select class="form-control" id="gender1">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                </div>

                <div class="col-md-2 ">

                </div>

            </div>
        </div>

        <div class="place-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="Carousel" class="carousel slide">

                            <ol class="carousel-indicators">
                                <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                                <li data-target="#Carousel" data-slide-to="1"></li>
                                <li data-target="#Carousel" data-slide-to="2"></li>
                            </ol>

                            <!-- Carousel items -->
                            <div class="carousel-inner">

                                <div class="item active">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        </div><!--.row-->
                                    </div>

                                </div><!--.item-->

                                <div class="item">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
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
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                            <div class="col-md-3">
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="https://placeimg.com/300/300/people"
                                                         class="img-responsive">
                                                    <figcaption>
                                                        <h1>Hello world</h1>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-success">View</button>
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
                </div>
            </div><!--.container-->
        </div>

    </section>


    <section>

    </section>
    <footer class="footer">
        <div class="container ">
            <div class="row">
                <div class="col-md-4">
                    <h3>More About Company</h3>
                    <p> Nemo enim ipsam voluptatem quia
                        voluptas sit aspernatur aut odit aut fugit,
                        sed quia consequuntur magni dolores eos qui
                        ratione voluptatem sequi nesciunt.</p>
                    <p class="adam">- Patrick Victoria, CEO</p>
                </div>
                <div class="col-md-4 content_block">
                    <h4 class="text-center">Content</h4>
                    <ul>
                        <li>Home</li>
                        <li>About</li>
                        <li>About</li>
                        <li>About</li>
                        {{--<li><a href="mailto:info@example.com">contact@example.com</a> </li>--}}
                    </ul>
                </div>
                <div class="col-md-4 content_block">
                    <h4 class="text-center">Contact Info</h4>
                    <ul>
                        <li>The company name</li>
                        <li>1234567890</li>
                        <li><a href="mailto:info@example.com">contact@example.com</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    if ($('#myCarousel')) {
        $('nav').attr('hidden', true);
        $(window).scroll(function () {
            if ($(window).scrollTop() > 100) {
                $('nav').attr('hidden', false)
            } else {
                $('nav').attr('hidden', true)

            }
        })
    } else {

    }


</script>