





    <div class="container-fluid">
        <div class="row">

            <div id="Carousel" class="carousel slide">

                <ol class="carousel-indicators carusel-place">
                    @for($i = 0;count($placeALl)/12 > $i; $i++)
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
                                        <form action="{{route('placeView', $placeItem->place->id )}}"
                                              method="Get" >

                                        <figure class="imghvr-shutter-in-out-diag-2">
                                            <img src="/{{$placeItem->place->images[0]->path}}"
                                                 class="img-responsive">
                                            <figcaption>
                                                <h3>{{$placeItem->place->place_translates[0]->title}}
                                                </h3>
                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-info"  style="width: auto;">View
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














