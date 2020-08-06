<div class="card">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            @for ($i = 0, $image = $project->images; $i < sizeof($image); $i++)
                <div class="carousel-item {{$i==0 ? 'active': ''}}">
                    <img src="{{asset($image[$i]->path)}}" class="d-block w-100 card-img-top" alt="{{$image[$i]->path}}" style="max-height: 350px;">
                </div>                    
            @endfor
        </div>
        {{-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> --}}
            {{-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> --}}
            <span class="sr-only">Previous</span>
        {{-- </a> --}}
        {{-- <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> --}}
            {{-- <span class="carousel-control-next-icon" aria-hidden="true"></span> --}}
            <span class="sr-only">Next</span>
        {{-- </a> --}}
    </div>
    
    <div class="card-body">
        <h4>{{$project->name}}</h4>
        <p>
            <span>Description: </span>{{$project->description}}
        </p>
        <p>
            <span>Technologies: </span>
            @foreach ($project->technologies as $technology)
                {{$technology->name}}
            @endforeach
        </p>
    </div>
</div>