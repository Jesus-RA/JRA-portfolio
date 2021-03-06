{{-- <div class="row mt-4 myAbout {{ Request::is('/') ? 'myAbout' : 'mt-5' }}"> --}}
<div class="row mt-4 myAbout">
    <div class="col-md-6 my-auto">
        
        <div class="col-md-12 text-white" data-aos="fade-up">
            <h2 class="mb-3">About me</h2>
            
            <p class="text-justify">
                {!! $profile->biography !!}
            </p>

        </div>

        <div class="col-md-12 text-white mt-5 mb-4 mb-md-0" data-aos="fade-up">
            <h4>Technologies:</h4>
            @if ( count($profile->technologies) > 0)
                <ul class="technologies">
                    @foreach ($profile->technologies as $technology)
                    <li class="technology">
                        <img src="{{ $technology->icon->path }}" alt="{{ $technology->name }}" loading="lazy" width="30" height="30">
                        <span class="ml-3 font-weigth-bold">{{ $technology->name }}</span>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>

    </div>

    <div class="col-md-6 my-auto" data-aos="zoom-in-up">
        <div class="col-10 col-lg-7 text-center mx-auto">
            <div class="card myPhoto">
                <img src="{{ secure_asset('img/me/me.jpg') }}" alt="Jesús Ramírez Alejandro" loading="lazy" width="300" height="300" class="card-img-top">
            </div>
        </div>
    </div>

</div>