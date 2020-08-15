<div class="row my-5">
    @foreach ($projects as $project)
        @include('components.modal-project')
        <div class="col-sm-6 col-md-6 col-lg-4 my-3">
            @include('components.card-project')
        </div>
    @endforeach
</div>