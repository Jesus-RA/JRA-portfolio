<div class="modal fade" id="exampleModal{{$project->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content text-white myModal">
            {{-- Carousel --}}
            <div id="carousel{{$project->id}}" class="carousel slide carousel-fade hover touch" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($project->images as $image)
                        <div class="carousel-item {{$loop->first ? 'active' : ''}}" data-interval="3500">
                            <img 
                                src="{{ $image->path }}"
                                alt=""
                                class="d-block w-100 card-img-top projectImage"
                                height="300"
                            >                
                        </div>
                    @endforeach
                </div>
                {{-- @if (auth()->user()) --}}
                    <a href="#carousel{{$project->id}}" class="carousel-control-prev" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        {{-- <span class="sr-only">Previous</span> --}}
                    </a>
                    <a href="#carousel{{$project->id}}" class="carousel-control-next" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        {{-- <span class="sr-only">Next</span> --}}
                    </a>
                {{-- @endif --}}
            </div>
            {{-- End Carousel --}}
            <div class="modal-body">
                <h2 class="card-title text-center">{{$project->name}}</h2>
                <p class="card-text" class="card-text text-justify">
                    {{$project->description}}
                </p>
                <p class="card-text">
                    <strong class="text-success">Technologies: </strong>
                    @foreach ($project->technologies as $technology)
                        <span class="text-sm border border-light rounded  text-center mr-1">
                            <small class="px-2">{{$technology->name}}</small>
                        </span>
                    @endforeach
                </p>
                @if ($project->repository)
                    <a href="{{$project->repository}}" class="flaticon-github mx-2" target="_blank"></a>
                @endif
                @if ($project->url)
                    <a href="{{$project->url}}" class="flaticon-external-link-symbol mx-2" target="_blank"></a>
                @endif
                <button type="button" class="btn btn-outline-light float-right" data-dismiss="modal" aria-label="Close">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>