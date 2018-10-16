@extends('layouts.app')
@section('content')
    <header>
        <div id="myCarousel" class="carousel slide placeView" data-ride="carousel">


            <!-- Wrapper for slides -->
            <div class="carousel-inner ">
                @foreach($place[0]->images as $images)
                    @if($images->type === 0)
                        <div class="item carouseltem active" id="carouseltem">
                        <img src="/{{$images->path}}" alt="Los Angeles" style="width:100%; height: 100vh;">
                        </div>
                        @else
                        <div class="item carouseltem">
                        <img src="/{{$images->path}}" alt="Chicago" style=" width:100%; height: 100vh;">
                        </div>
@endif
                @endforeach




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
    <section class="place-info">
        <div class="container-fluid">
        <div class="row">
<div class="col-md-4 ">
            <h4>{{$place[0]->place_translates[0]->title}}</h4>
</div>
            <div class="col-md-8 text-right ratingBlock">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <div class="col-md-12 place_desc">

                <p>{{$place[0]->place_translates[0]->description}}</p>
            </div>


        </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <iframe src="{{$place[0]->location}}"
                            width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>
            </div>
        </div>

    </section>
    <footer class="footer">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer_about">
                        <h3 class="text-center">{{$about->title}}
                        </h3>
                        <p> {{$about->description}}
                            .</p>
                    </div>
                </div>
                <div class="col-md-2"></div>

                <div class="col-md-6">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4031.7583359838804!2d43.831458428437884!3d40.79707163131329!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4041fc89f480e665%3A0xd91ab7dfb29390d!2sArmenia+Erevan!5e0!3m2!1sru!2s!4v1537447392816"
                            width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div>
        </div>
    </footer>
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
@endsection