<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>My Portfolio</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- My Styles --}}
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('flaticon/flaticon.css') }}">

    @yield('styles')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark myNav shadow-lg {{auth()->user() == null ? 'fixed-top' : ''}}">
            <div class="container">
                {{-- <a class="navbar-brand" href="{{ url('/') }}"> --}}
                <a class="navbar-brand" href="{{ auth()->user() ? route('home') : '#top' }}" onclick="clean()">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto" id="menu">
                        {{-- <li class="nav-item">
                            <a href="{{route('panel')}}" class="nav-link">
                                Panel
                            </a>
                        </li> --}}
                        @if (Auth::user())
                            <li class="nav-item">
                                <a href="{{route('panel')}}" class="nav-link">Panel</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="/#about" class="nav-link myA" onclick="active()">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="/#portfolio" class="nav-link myA" onclick="active()">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a href="/#contact" class="nav-link myA" onclick="active()">Contact</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li> --}}
                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-dark" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item bg-dark text-white" href="{{ route('logout') }}"
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
                </div>
            </div>
        </nav>

        <main class="">
            {{-- @yield('image-hero') --}}
            @if (session('success'))
                <div class="container mt-5">
                    <div class="alert alert-success text-center col-md-8 mx-auto">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
    @include('components.footer')

    @yield('scripts')

    <script>

        function active(){
            links = document.querySelectorAll('ul li a');
            for(link of links){
                link.classList.remove('myActive');
            }
            if(event.target.classList.contains('myActive')){
                event.target.classList.remove('myActive');
            }else{
                event.target.classList.add('myActive');
            }
        }

        function clean(){
            links = document.querySelectorAll('ul li a');
            for(link of links){
                link.classList.remove('myActive');
            }
        }

    </script>
</body>
</html>
