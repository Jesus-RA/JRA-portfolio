@extends('layouts.app')

@section('content')
    <div class="hero-image">
        <div class="d-flex align-items-center h-100">
            <div class="col-12 col-md-7 offset-md-1 fade-in-bottom">
                <span class="d-block mb-1 text-md-left ml-2 ml-md-0"> <strong>Hello, my name is</strong> </span>
                <h1 class="name text-md-left text-center">Jesús Ramírez Alejandro</h1>
                <h3 class="name mb-4 text-md-left text-center">I am a Web Developer</h3>
                <p class="col-md-8 col-xl-6 text-justify pl-md-0 mt-5 mb-4 mb-md-3">
                    Look at my work and get convince yourself you finally found you was looking for!
                </p>
                <a href="/#portfolio" class="btn btn-outline-light col-10 offset-1 offset-md-0 col-md-6 col-xl-4 my-work-btn">Check my work!</a>
            </div>
        </div>

    </div>
    <div class="container">
        <section id="about" class="pt-5 pt-md-0">
            @include('about')            
        </section>

        <section id="portfolio" class="pt-4">
            @if (count($projects) > 0)
                @include('portfolio')
            @endif
        </section>

        <section id="contact" class="pt-4 pt-md-0">
            <contact></contact>
        </section>

    </div>
@endsection