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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
          integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <!-- Styles -->

    <link href="{{ asset('css/contentStyle.css') }}" rel="stylesheet">

</head>
<body>
<div id="app">


    <nav class="navbar  navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle  collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand ">Travel</a>
            </div>
            <div id="navbar" class="navbar-collapse  ">

                <ul class="nav navbar-nav navbar-center ">
                    @foreach($menu as $param)
                        <li><a href="{{$param->menu_parents[0]->url}}">{{$param->menu_parents[0]->name}}</a></li>


                    @endforeach

                </ul>



                    @guest
                    <ul class="nav navbar-nav navbar-right">

                    <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Log In') }}</a>
                        </li>

                </ul>

                <form onsubmit="changeLanguage(this)" action="{{route('language')}}" method="Post">
                    <div class="col-sm-1 pull-right">
                        <select onchange="$(this).parent().parent().submit();" class="form-control" name="languageSelect" id="languageSelect" >
                            @foreach($lang as $language)
                                    <option  value="{{$language->id}}" {{ $language->status == 1 ? 'selected' : '' }}>{{$language->translation}}</option>
                            @endforeach
                        </select>

                    </div>
                </form>

                @else

                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item ">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class=" dropdown-menu  dropdown-menu-right" aria-labelledby="dropdownMenuButton">
<a class="dropdown-item"  href="{{ route('profileView', Auth::user()->id)  }} " class="profile"  >Profile</a>

                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    <form onsubmit="changeLanguage(this)" action="{{route('language')}}" method="Post">
                        <div class="col-sm-1 pull-right ">
                            <select onchange="$(this).parent().parent().submit();" class="form-control" name="languageSelect" id="languageSelect" >
                                @foreach($lang as $language)
                                    <option  value="{{$language->id}}" {{ $language->status == 1 ? 'selected' : '' }}>{{$language->translation}}</option>
                                @endforeach
                            </select>

                        </div>
                    </form>
                @endguest

            </div><!--/.nav-collapse -->
        </div>
    </nav>


    <main class="py-4">
        @yield('content')
    </main>
</div>
<script>
    function changeLanguage(e) {
        var data = new FormData($(e)[0]);
        console.log(data);

        $.ajax({
            type: 'post',
            url: $(e).attr('action'),
            date:data,
            success: function (data) {
            }
        })
    }

</script>
</body>
</html>
