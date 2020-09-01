<div class="modal fade" id="exampleModal{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-dark text-white">
            {{-- Carousel --}}
            <div id="carousel{{$project->id}}" class="carousel slide carousel-fade hover touch" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($project->images as $image)
                        <div class="carousel-item {{$loop->first ? 'active' : ''}}" data-interval="3500">
                            <img 
                                src="{{ Storage::url($image->path) }}"
                                alt=""
                                class="d-block w-100 card-img-top projectImage"
                                height="300"
                            >                
                        </div>
                    @endforeach
                </div>
                @if (auth()->user())
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
            {{-- End Carousel --}}
            <div class="modal-body">
                <h2 class="card-title text-center">{{$project->name}}</h2>
                <p class="card-text" class="card-text">
                    {{$project->description}}
                </p>
                {{-- <p class="card-text">
                    <strong class="text-success">Github repository: </strong>{{$project->repository}}
                </p>
                <p class="card-text">
                    <strong class="text-success">URL: </strong>{{$project->url}}
                </p> --}}
                <p class="card-text">
                    <strong class="text-success">Technologies: </strong>
                    @foreach ($project->technologies as $technology)
                        <span class="badge badge-secondary">
                            {{$technology->name}}
                        </span>
                    @endforeach
                </p>
                <a href="{{$project->repository}}" class="flaticon-github mx-2" target="_blank"></a>
                @if ($project->url != null)
                    <a href="{{$project->url}}" class="flaticon-external-link-symbol mx-2" target="_blank"></a>
                @endif
                <button type="button" class="btn btn-secondary float-right" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>