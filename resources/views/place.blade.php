@extends('layouts.app')
@section('content')
    <header>
        <div id="myCarousel" class="carousel slide placeView" data-ride="carousel">


            <!-- Wrapper for slides -->
            <div class="carousel-inner ">
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
    <section class="place-info">
        <div class="container-fluid">
        <div class="row">
<div class="col-md-4 ">
            <h4>Description</h4>
</div>
            <div class="col-md-8 text-right ratingBlock">
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star checked"></span>
                <span class="fa fa-star"></span>
                <span class="fa fa-star"></span>
            </div>
            <div class="col-md-12 place_desc">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                    when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    It has survived not only five centuries, but also the leap into electronic typesetting, remaining
                    essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                    containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                    PageMaker including versions of Lorem Ipsum.</p>
            </div>


        </div>
        </div>
    </section>
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1745.1383148319076!2d43.84146598725721!3d40.784850703011074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4041fb8b00fddc81%3A0xc2cb0f874c517e92!2sVardanants+statue!5e0!3m2!1sru!2s!4v1536651865556"
                            width="100%" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>

                </div>
            </div>
        </div>

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