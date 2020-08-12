<div class="row my-5">
    @foreach ($projects as $project)
        @include('components.modal-project')
        <div class="col-sm-6 col-md-6 col-lg-4 my-3">
            <div class="card bg-dark text-white myProject">
                <img src="https://images.unsplash.com/photo-1488590528505-98d2b5aba04b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1650&q=80" alt="" class="card-img-top" height="200">
                <div class="card-body">
                    <h4 class="card-title text-center">
                        {{$project->name}}
                    </h4>
                    {{-- <button type="button" class="btn btn-dark border-light btn-block">
                        See project
                    </button> --}}
                    <button type="button" class="btn btn-dark border-light btn-block" data-toggle="modal" data-target="#exampleModal{{$project->id}}">
                        See project
                    </button>
                </div>
            </div>
        </div>
    @endforeach
</div>