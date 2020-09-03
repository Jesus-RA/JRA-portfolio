@extends('layouts.app')

@section('content')
    <div class="hero-image">
        <div class="d-flex align-items-center h-100 ">
            <div class="col-12 col-md-7 offset-md-1">
                <span class="d-block mb-1 text-md-left ml-2 ml-md-0"> <strong>Hello, my name is</strong> </span>
                <h1 class="name text-md-left text-center">Jesús Ramírez Alejandro</h1>
                <h3 class="name mb-4 text-md-left text-center">I am a Web Developer</h3>
                <p class="col-md-8 col-xl-6 text-justify pl-md-0 mt-5 mb-4 mb-md-3">
                    Look at my work and get convince yourself you finally found you was looking for!
                </p>
                <a href="/#portfolio" class="btn btn-outline-light col-10 offset-1 offset-md-0 col-md-6 col-xl-4">Check my work!</a>
            </div>
        </div>
        {{-- <div class="text-hero">
            <span class="ml-auto"> <strong>Hello, my name is</strong> </span>
            <h1>Jesús Ramírez Alejandro</h1>
            <h3>I am a web Developer</h3>
            <a href="/#portfolio" class="btn btn-outline-light btn-block">Check out my work!</a>
        </div> --}}
    </div>
    <div class="container">
        <section id="about" class="pt-3">
            @include('about')            
        </section>

        <section id="portfolio" class="pt-3">
            @if (count($projects) > 0)
                @include('portfolio')
            @endif
        </section>

        <section id="contact" class="">
            <contact></contact>
        </section>

    </div>
@endsection

<style>
    .hero-image{
        /* background-image: url('https://images.unsplash.com/photo-1510519138101-570d1dca3d66?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1631&q=80'); */
        background-image: url('../img/background/large.jpg');
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

    @media (max-width: 576px){
        .hero-image{
            background-image: url('../img/background/small.jpg');
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    }
</style>