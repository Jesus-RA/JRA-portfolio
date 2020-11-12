<div class="row my-5 mt-4">
    <h2 class="text-center mb-5 col-12" data-aos="fade-up">My portofolio</h2>
    @foreach ($projects as $project)
        @include('components.modal-project')
        <div class="col-sm-6 col-md-6 col-lg-4 my-3" data-aos="zoom-in-up">
            @include('components.card-project')
        </div>
    @endforeach
</div>