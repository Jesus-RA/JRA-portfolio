@extends('layouts.app')

@section('content')
    <div class="container mt-5 ">
        <div class="row text-white">
            <div class="col-md-6 mx-auto text-center">
                <h1 class="mb-3">Create project</h1>
                <form
                    action="{{route('projects.store')}}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <input type="text" name="name" placeholder="Name" class="myForm">
                    <textarea name="description" placeholder="Description" class="myForm"></textarea>
                    <input type="text" name="repository" placeholder="Repository" class="myForm">
                    <input type="text" name="url" placeholder="URL" class="myForm">
                    <label for=""></label>
                    <input type="file" name="image">                    
                    <button type="submit" class="btn btn-dark">Upload</button>
                </form>
                @if (session('success'))
                    <h4 class="mt-3">You uploaded this image</h4>
                    <div class="card">
                        <img src="{{ Storage::url(session('success')) }}" alt="" class="card-img-top">
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection