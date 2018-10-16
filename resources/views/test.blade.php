@extends('layouts.app')
@section('content')
    {{--{{$slider}}--}}

    <header>
        <div id="myCarousel" class="carousel_slide" data-ride="carousel">
            <!-- Indicators -->

            <ol class="carousel-indicators">
                @foreach($slider as $slid)
                    @if($loop->index === 0 )
                        <li data-target="#myCarousel" data-slide-to="{{$loop->index}}"
                            class="active"></li>
                    @else
                        <li data-target="#myCarousel" data-slide-to="{{$loop->index}}"></li>

                    @endif
                @endforeach

            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">


                @foreach($slider as $slid)
                    @if($loop->index ===0 )
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
                        <img src="/{{$about->about->images[0]->path}}
                                " alt=" ">
                    </div>
                    <div class="col-md-6 col-sm-6 about-inner-column">
                        <h4>{{$about->title}}</h4>
                        <p>{{$about->description}}</p>

                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </section>

    @foreach($categoryArray as $key => $value )
        <section class="category{{$key}}">

            <div class="container">
                <div class="row place-category-header text-center">

                    <h3>{{$key}} </h3>

                </div>
            </div>
            <div class="place-body1">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="Carousel{{$key}}" class="carousel slide">


                                <!-- Carousel items -->
                                <div class="carousel-inner carousel-{{$key}}">

                                    @foreach($value as $placeInfo)
                                        @if($loop->iteration ==1 )

                                            <div class="item @if($loop->iteration == 1)active @endif">
                                                <div class="row">
                                                    @endif

                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                        <form action="{{route('placeView', $placeInfo->place_translates[0]->place_id )}}"
                                                              method="Get" >
                                                            {{ csrf_field() }}
                                                            {{ method_field('Get') }}
                                                            <figure class="imghvr-shutter-in-out-diag-2">
                                                                <img src="/{{$placeInfo->images[0]->path}}"
                                                                     class="img-responsive">
                                                                <figcaption>

                                                                    <h3>{{$placeInfo->place_translates[0]->title}}
                                                                    </h3>
                                                                    <div class="btn-group">
                                                                        <button type="submit"
                                                                                class="btn btn-info btn-md"
                                                                                style="width: auto;">Views
                                                                        </button>
                                                                    </div>
                                                                </figcaption>
                                                            </figure>
                                                            </form>

                                                    </div>
                                                    @if($loop->iteration %4===0 )
                                                </div>
                                            </div>


                                            <div class="item">
                                                <div class="row">

                                                    @endif

                                                    @endforeach

                                                </div>

                                            </div>


                                </div><!--.carousel-inner-->
                                <a data-slide="prev" href="#Carousel{{$key}}"
                                   class="left carousel-control carouselCategory"></a>
                                <a data-slide="next" href="#Carousel{{$key}}"
                                   class="right carousel-control carouselCategory"></a>
                            </div><!--.Carousel-->

                        </div>
                    </div>
                </div><!--.container-->
            </div>
        </section>
    @endforeach

    <section class="about_guide_section">
        <div class="about_guide"></div>
        <div class="container">
            <div class="col-md-4">
                <h3>{{$guide->title}}</h3>
                <p>{{$guide->description}}

                </p>
            </div>
            <div class="col-md-8">
                <div id="guideCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Carousel indicators -->

                    <!-- Wrapper for carousel items -->
                    <div class="carousel-inner guideCarouselInner">


                        @foreach($usersGuid as $guideUser)
                            @if($loop->iteration ==1 )
                                <div class="item active">
                                    @else
                                        <div class="item ">
                                            @endif
                                            <div class="col-md-4 text-center">
                                                <img src="/{{$guideUser->images[0]->path}}" alt="..." class="img-circle"
                                                     style="width: 80%; height:150px ">
                                            </div>
                                            <div class="col-md-8">
                                                <h5>{{$guideUser->name}} {{$guideUser->surname}}</h5>
                                                <p>{{$guideUser->user_translates[0]->description}}</p>
                                                <button type="button" class="btn btn-primary btn-group-sm pull-right">
                                                    Information
                                                </button>

                                            </div>
                                        </div>


                                        @endforeach
                                </div>
                                <!-- Carousel controls -->
                                <div class="col-md-12 guideCarouselIconse">
                                    <a class="carousel-control left guideCarouselIcone" href="#guideCarousel"
                                       data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"></span>
                                    </a>

                                    <a class="carousel-control right guideCarouselIcone" href="#guideCarousel"
                                       data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"></span>
                                    </a>


                                </div>
                    </div>

                </div>
            </div>

    </section>
    <section class="placeSliderSection">
        <div class="container-fluid">
            <div class="row place-header">
                <div class="col-md-2 selectPlace">
                    <select class="form-control" name="catgorySelect" id="catgorySelect">
                        @if(session()->exists('hhh'))
                            <option>{{session()->get('hhh')['category']}}</option>

                        @else
                            <option>All</option>

                        @endif
                        @foreach($category as $cat)
                            <option value="{{$cat->id}}">{{$cat->category_translates[0]->name}}</option>
                        @endforeach

                    </select>

                </div>
                <div class="col-md-8 text-center">
                    <h3>Place</h3>

                </div>
                <div class="col-md-2 selectPlace">
                    <select class="form-control" id="selectState">
                        <option>All</option>
                        @foreach($states as $state)

                            <option value="{{$state->id}}"> {{$state->state_translates[0]->name}}</option>

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

                    <div id="Carousel" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators carusel-place">
                            @for($i = 0;count($placeALl)/12 >= $i; $i++)
                                @if($i == 0)
                                    <li data-target="#Carousel" data-slide-to="{{$i}}"
                                        class="active"></li>
                                @else
                                    <li data-target="#Carousel" data-slide-to="{{$i}}"></li>

                                @endif
                            @endfor

                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner" id="placeAll">


                            @foreach($placeALl as $placeItem)
                                @if($loop->iteration ==1 )

                                    <div class="item @if($loop->iteration == 1)active @endif">
                                        <div class="row">
                                            @endif
                                            <div class="col-md-3 col-sm-6 col-xs-12">
                                                <form action="{{route('placeView', $placeInfo->place_translates[0]->place_id )}}"
                                                      method="Get" >
                                                <figure class="imghvr-shutter-in-out-diag-2">
                                                    <img src="/{{$placeItem->images[0]->path}}"
                                                         class="img-responsive" style="width: 100%; ">
                                                    <figcaption>
                                                        <h3>{{$placeItem->place_translates[0]->title}}
                                                        </h3>
                                                        <div class="btn-group">
                                                            <button type="submit" class="btn btn-info btn-md"
                                                                    style="width: auto;">View
                                                            </button>
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                                </form>
                                            </div>
                                            @if($loop->iteration %12==0 )
                                        </div>
                                    </div>


                                    <div class="item">
                                        <div class="row">

                                            @endif

                                            @endforeach

                                        </div>

                                    </div>


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


@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    $('.carousel-indicators li').click(function (e) {
        e.stopPropagation();
        var goTo = $(this).data('slide-to');
        $('.carousel-inner .item').each(function (index) {
            if ($(this).data('id') == goTo) {
                goTo = index;
                return false;
            }
        });

        $('#myCarousel').carousel(goTo);
    });

    window.onload = function () {
        $('#catgorySelect, #selectState').change(function () {
            var category = $('#catgorySelect').val();
            var state = $('#selectState').val();
            $.ajax({
                type: 'get',
                url: "{{route('index')}}/" + category + '/' + state,
                success: function (data) {
                    $('.place-body').empty();
                    $('.place-body').append(data['html']);

                }
            });
        });
    }


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

