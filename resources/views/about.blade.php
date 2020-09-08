<div class="row my-5 myAbout">
    <div class="col-md-6 my-auto">
        
        <div class="col-md-12 text-white  my-5">
            <h2 class="mb-3">About me</h2>
            
            <p class="text-justify">
                I'am a Computer Science student and self taught web developer,
                passionate for learn something new every day, I really enjoy learn
                what I like!
            </p>

            <p>
                
            </p>

        </div>

        <div class="col-md-12 text-white my-5">
            @if ( count($technologies) > 0)
                <h4>Technologies:</h4>
                <ul class="technologies">
                    @foreach ($technologies as $technology)
                    <li class="technology">
                        <img src="{{ $technology->icon->path }}" alt="{{ $technology->name }}" width="30" height="30">
                        <span class="ml-3 font-weigth-bold">{{ $technology->name }}</span>
                    </li>
                    @endforeach
                </ul>
            @endif
        </div>

    </div>

    <div class="col-md-6 my-auto">
        <div class="col-12 col-lg-8 text-center mx-auto">
            <div class="card myPhoto">
                <img src="{{ secure_asset('img/me/me.jpg') }}" alt="" width="300" height="300" class="card-img-top">
            </div>
        </div>
    </div>

</div>