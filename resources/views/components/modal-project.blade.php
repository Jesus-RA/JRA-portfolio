<div class="card text-white bg-dark border border-secondary">

    <div id="carousel{{$project->id}}" class="carousel slide carousel-fade hover touch" data-ride="carousel">
        <div class="carousel-inner">
            @foreach ($project->images as $image)
                <div class="carousel-item {{$loop->first ? 'active' : ''}}" data-interval="3500">
                    <img 
                        src="{{ asset($image->path) }}"
                        alt=""
                        class="d-block w-100 card-img-top"
                        height="300"
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
        <h3 class="card-title">{{$project->name}}</h3>
        <p class="card-text" class="card-text">
            {{$project->description}}
        </p>
        <p class="card-text">
            <strong class="text-success">Github repository: </strong>{{$project->repository}}
        </p>
        <p class="card-text">
            <strong class="text-success">URL: </strong>{{$project->url}}
        </p>
        <p class="card-text">
            <strong class="text-success">Technologies: </strong>
            @foreach ($project->technologies as $technology)
                <span class="badge badge-secondary">
                    {{$technology->name}}
                </span>
            @endforeach
        </p>
        <a href="" class="btn btn-secondary">GitHub</a>
        <a href="" class="btn btn-secondary">Web</a>
        <button type="button" class="btn btn-secondary float-right">Close</button>
    </div>
</div>