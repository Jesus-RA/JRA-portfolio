@extends('layouts.app')

@section('content')
    <div class="hero-image py-0 border-danger">
        {{-- Si quiero el nav sobre la imagen, debo dejar éste y quitar el de app.blade.php --}}
        {{-- <nav class="navbar navbar-expand-md navbar-dark bg-transparent fixed-top shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler bg-dark" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a href="{{route('projects.index')}}" class="nav-link">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a href="#about" class="nav-link">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#contact" class="nav-link">Contact</a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
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
                </div>
            </div>
        </nav> --}}
        <div class="text-hero">
            <h1>Jesús Ramírez Alejandro</h1>
            <h3>Web Developer</h3>
            <button class="btn btn-outline-light btn-block">Hire me!</button>
        </div>
    </div>
    <div class="container">
        <div id="about">
            @include('about')            
        </div>
        <div id="portfolio">
            @include('portfolio')
        </div>
        <div id="contact">
            @include('contact')
        </div>
    </div>
@endsection

<style>
    .hero-image{
        background-image: url('https://images.unsplash.com/photo-1510519138101-570d1dca3d66?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1631&q=80');
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        /* To make a parallax effect I have to write the below line */
        background-attachment: fixed;
        position: relative;
        width: 100%;
        height: 100vh;
        color: white;
    }

    .text-hero{
        position: absolute;
        text-align: center;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        /* color: white; */
    }
</style>