@extends('layouts.app')

@section('content')
{{--<h4>asdasdasdasd</h4>--}}

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="carousel-item">
            <img class="d-block w-100" src="https://images.unsplash.com/photo-1432958576632-8a39f6b97dc7?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=6ecedc1e639d8a4b77aa8e85f4962f03" data-color="lightblue" alt="First Image">
            <div class="carousel-caption d-md-block">
                <h5>First Image</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://images.unsplash.com/photo-1504736038806-94bd1115084e?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=3d045bbf1ecc01c4c9ec011ce5c8977d" data-color="firebrick" alt="Second Image">
            <div class="carousel-caption d-md-block">
                <h5>Second Image</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="https://images.unsplash.com/photo-1419064642531-e575728395f2?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=400&fit=max&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=76d5c793e4f8d02d7a9be27bc71256f7" data-color="violet" alt="Third Image">
            <div class="carousel-caption d-md-block">
                <h5>Third Image</h5>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
    {{--<div class="container">--}}
        {{--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
            {{--<ol class="carousel-indicators">--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
                {{--<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
            {{--</ol>--}}
            {{--<div class="carousel-inner" role="listbox">--}}
                {{--<!-- Slide One - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item active" style="background-image: url('http://placehold.it/1900x1080')">--}}
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h3>First Slide</h3>--}}
                        {{--<p>This is a description for the first slide.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Slide Two - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item" style="background-image: url('img/1534861256.jpg')">--}}
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h3>Second Slide</h3>--}}
                        {{--<p>This is a description for the second slide.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<!-- Slide Three - Set the background image for this slide in the line below -->--}}
                {{--<div class="carousel-item" style="background-image: url('http://placehold.it/1900x1080')">--}}
                    {{--<div class="carousel-caption d-none d-md-block">--}}
                        {{--<h3>Third Slide</h3>--}}
                        {{--<p>This is a description for the third slide.</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
                {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                {{--<span class="sr-only">Previous</span>--}}
            {{--</a>--}}
            {{--<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
                {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                {{--<span class="sr-only">Next</span>--}}
            {{--</a>--}}
        {{--</div>--}}
        {{--@if (session('status'))--}}
            {{--<div class="alert alert-success" role="alert">--}}
                {{--{{ session('status') }}--}}
            {{--</div>--}}
        {{--@endif--}}
    {{--</div>--}}
@endsection