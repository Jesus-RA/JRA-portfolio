@extends('layouts.app')

@section('content')
    <div class="hero-image py-0 border-danger">
        <div class="text-hero">
            <h1>Jesús Ramírez Alejandro</h1>
            <h3>Web Developer</h3>
            <a href="/#portfolio" class="btn btn-outline-light btn-block">Check out my work!</a>
        </div>
    </div>
    <div class="container">
        <section id="about" class="pt-3">
            @include('about')            
        </section>
        {{-- <div id="about" class="py-5">
            @include('about')            
        </div> --}}
        <section id="portfolio" class="pt-3">
            @include('portfolio')
        </section>
        {{-- <div id="portfolio" class="py-5">
            @include('portfolio')
        </div> --}}
        <section id="contact" class="">
            <contact></contact>
            {{-- @include('contact') --}}
        </section>
        {{-- <div id="contact" class="py-5">
            @include('contact')
        </div> --}}
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