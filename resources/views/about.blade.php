<div class="row {{ Request::is('/') ? 'myAbout' : 'mt-5' }}">
    <div class="col-md-6 my-auto">
        
        <div class="col-md-12 text-white">
            <h2 class="mb-3">About me</h2>
            
            <p class="text-justify">
                {{ $profile->biography }}
            </p>

        </div>

        <div class="col-md-12 text-white mt-5">
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

    <div class="col-md-6 my-auto">
        <div class="col-11 col-lg-7 text-center mx-auto">
            <div class="card myPhoto">
                <img src="{{ asset('img/me/me.jpg') }}" alt="me" loading="lazy" width="300" height="300" class="card-img-top">
            </div>
        </div>
    </div>

</div>