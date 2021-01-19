<!doctype html>
{{-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> --}}
<html lang="es">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-0BC4VD6VBP"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-0BC4VD6VBP');
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="robots" content="noindex,nofollow"> --}}

    <title>{{ config('app.name', 'Jesús Ramírez Alejandro') }}</title>
    <meta name="author" content="Jesús Ramírez Alejandro">
    <meta name="owner" content="Jesús Ramírez Alejandro" />
    <meta name="description" 
        content="I am a Computer Science Engineering student and self-taught web developer, I'm passionate to learn every day new things and get better my knowledge.
        I think being better, I can contribute to the developers community and help to improve my environment." 
    />

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="JesúsRA Web Developer">
    <meta itemprop="description" 
        content="I am a Computer Science Engineering student and self-taught web developer, I'm passionate to learn every day new things and get better my knowledge.
        I think being better, I can contribute to the developers community and help to improve my environment."
    >
    <meta itemprop="image" content="https://res.cloudinary.com/hkzhuqcgm/image/upload/v1601007305/myportfolio_k0cgcx.png">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="JesúsRA Web Developer">
    <meta name="twitter:description" 
        content="I am a Computer Science Engineering student and self-taught web developer, I'm passionate to learn every day new things and get better my knowledge.
        I think being better, I can contribute to the developers community and help to improve my environment."
    >
    <meta name="twitter:creator" content="@JesusRA1P">
    <!-- Twitter summary card with large image. Al menos estas medidas 280x150px -->
    <meta name="twitter:image:src" content="https://res.cloudinary.com/hkzhuqcgm/image/upload/v1601007305/myportfolio_k0cgcx.png">

    <!-- Open Graph data -->
    <meta property="og:title" content="JesúsRA Web Developer" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://www.jesusra.com/" />
    <meta property="og:image" itemprop="image" content="https://res.cloudinary.com/hkzhuqcgm/image/upload/v1601007305/myportfolio_k0cgcx.png" />
    <meta property="og:image:secure_url" itemprop="image" content="https://res.cloudinary.com/hkzhuqcgm/image/upload/v1601007305/myportfolio_k0cgcx.png" />
    <meta property="og:image:width" content="1015">
    <meta property="og:image:height" content="1080">
    <meta property="og:description" 
        content="I am a Computer Science Engineering student and self-taught web developer, I'm passionate to learn every day new things and get better my knowledge.
        I think being better, I can contribute to the developers community and help to improve my environment."
    />
    <meta property="og:site_name" content="JesúsRA Web Developer" />
    <meta property="fb:app_id" content="794563961346061">

    {{-- <meta property="og:image:secure_url" content="https://res.cloudinary.com/hkzhuqcgm/image/upload/v1601007305/myportfolio_k0cgcx.png">
    <meta property="og:image:width" content="1015">
    <meta property="og:image:height" content="1080"> --}}

    <!-- Linkedin -->
    <meta property="og:type" content="[Website]" />
    <meta name="image" property="og:image" content="[https://res.cloudinary.com/hkzhuqcgm/image/upload/v1601007305/myportfolio_k0cgcx.png]">

    <link rel="canonical" href="https://www.jesusra.com/" />
    <link rel='shortlink' href='https://www.jesusra.com/' />
    <link rel="icon" href="{{ secure_asset('img/me/me270x270.jpg') }}" sizes="192x192" />
    <meta name="msapplication-TileImage" content="{{ asset('img/me/me270x270.jpg') }}" />
    <meta name="thumbnail" content="{{ asset('img/me/me270x270.jpg') }}" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts -->
    <script src="{{ secure_asset('js/app.js') }}" defer></script>

    <!-- Fonts -->

    <!-- Styles -->
    <link href="{{ secure_asset('css/app.css') }}" rel="stylesheet">
    
    {{-- My Styles --}}
    <link rel="stylesheet" href="{{ secure_asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('flaticon/flaticon.css') }}">

    @yield('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark myNav shadow-lg  {{auth()->user() == null ? 'sticky-top' : ''}}">
            <div class="container">
                
                <a id="titulo" class="navbar-brand" href="{{ auth()->user() ? route('home') : '#top' }}" onclick="clean()">
                    JesúsRA
                    {{-- {{ config('app.name', 'Laravel') }} --}}
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
                        @auth

                            <li class="nav-item">
                                <a href="{{route('panel')}}" class="nav-link">Panel</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('profiles.show', auth()->user()->profile)}}" class="nav-link">Profile</a>
                            </li>

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
                            
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>

        <main class="">
            @if (session('success'))
                <div class="container mt-5">
                    <div class="alert alert-success text-center col-md-8 mx-auto fade show" role="alert">
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
            const links = document.querySelectorAll('ul li a');
            for(link of links){
                link.classList.remove('myActive');
            }
            if(event.target.classList.contains('myActive')){
                event.target.classList.remove('myActive');
            }else{
                event.target.classList.add('myActive');
            }
            document.querySelector('#navbarSupportedContent').classList.remove('show');
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
