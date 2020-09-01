<div class="row my-5">
    <h2 class="text-center mb-5 col-12">My portofolio</h2>
    @foreach ($projects as $project)
        @include('components.modal-project')
        <div class="col-sm-6 col-md-6 col-lg-4 my-3 ">
            @include('components.card-project')
        </div>
    @endforeach
</div>