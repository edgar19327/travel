<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- Styles -->

    <link href="{{ asset('css/contentStyle.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar  navbar-inverse navbar-fixed-top" >
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle  collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand ">Travel</a>
                </div>
                <div id="navbar" class="navbar-collapse  ">

                    <ul class="nav navbar-nav navbar-center ">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#contact">Contact</a></li>

                    </ul>


                    <ul class="nav navbar-nav navbar-right">

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Log In') }}</a>
                            </li>


                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> <span id="lanNavSel">ITA</span> <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a id="navIta" href="#" class="language">  <span id="lanNavIta">Italiano</span></a></li>
                                    <li><a id="navDeu" href="#" class="language">   <span id="lanNavDeu">Deutsch</span></a></li>
                                    <li><a id="navFra" href="#" class="language"> <span id="lanNavFra">Francais</span></a></li>
                                    <li><a id="navEng" href="#" class="language">  <span id="lanNavEng">English</span></a></li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <select class="selectpicker" data-width="fit">
                                    <option data-ontent='English'>English</option>
                                    <option  data-content='<span class="flag-icon flag-icon-mx"></span> Español'>Español</option>
                                </select>
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                </div><!--/.nav-collapse -->
            </div>
        </nav>
        {{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
            {{--<div class="container">--}}
                {{--<h4 class="navbar-brand" >--}}
               {{--Travel--}}
                {{--</h4>--}}
                {{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
                    {{--<span class="navbar-toggler-icon"></span>--}}
                {{--</button>--}}

                {{--<div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
                    {{--<!-- Left Side Of Navbar -->--}}
                    {{--<ul class="navbar-nav mr-auto">--}}

                    {{--</ul>--}}

                    {{--<!-- Right Side Of Navbar -->--}}
                    {{--<ul class="navbar-nav ml-auto">--}}
                        {{--<!-- Authentication Links -->--}}

                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</nav>--}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>

</body>
</html>
