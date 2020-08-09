<div class="card bg-dark text-white border border-secondary myPhoto">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @for ($i = 0, $image = $project->images; $i < sizeof($image); $i++)
                <div class="carousel-item {{$i==0 ? 'active': ''}}">
                    <img src="{{asset($image[$i]->path)}}" class="d-block w-100 card-img-top" alt="{{$image[$i]->path}}" height="200">
                </div>                    
            @endfor
        </div>
        <span class="sr-only">Previous</span>
        <span class="sr-only">Next</span>
    </div>
    
    <div class="card-body">
        <h4 class="card-title text-center">{{$project->name}}</h4>
        <button type="button" class="btn btn-outline-secondary text-white btn-block">See project</button>
        {{-- <p>
            <span>Technologies: </span>
            @foreach ($project->technologies as $technology)
                <span class="badge badge-pill badge-dark">
                    {{$technology->name}}
                </span>
            @endforeach
        </p> --}}
    </div>
</div>