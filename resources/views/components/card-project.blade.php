<div class="card text-white bg-dark myProject">

    <div id="carousel{{$project->id}}" class="carousel slide carousel-fade hover touch" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($project->images as $image)
                <div class="carousel-item {{$loop->first ? 'active' : ''}}" data-interval="3500">
                    <img 
                        src="{{ Storage::url($image->path) }}"
                        alt=""
                        class="d-block w-100 card-img-top projectImage"
                        height="200"
                    >                
                </div>
            @endforeach
        </div>
        @if (!auth()->user())
            <a href="#carousel{{$project->id}}" class="carousel-control-prev" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                {{-- <span class="sr-only">Previous</span> --}}
            </a>
            <a href="#carousel{{$project->id}}" class="carousel-control-next" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                {{-- <span class="sr-only">Next</span> --}}
            </a>
        @endif
    </div>

    <div class="card-body">
        <h3 class="card-title text-center">{{$project->name}}</h3>
        <button type="button" class="btn btn-dark border-light btn-block" data-toggle="modal" data-target="#exampleModal{{$project->id}}">
            See project
        </button>
    </div>
</div>