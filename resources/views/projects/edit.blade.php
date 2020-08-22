@extends('layouts.app')

@section('content')
    <div class="container mt-5 ">
        <div class="row text-white">
            <div class="col-md-6 mx-auto text-center">
                <h1 class="mb-3">Edit project</h1>
                <form
                    action="{{route('projects.update', $project)}}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input 
                            type="text"
                            name="name" 
                            placeholder="Name"
                            class="myForm @error('name') errorForm @enderror"
                            value="{{ old('name') ? old('name') : $project->name }}"
                        >
                        @error('name')
                            <span class="invalid-feedback d-block errorSpan" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <textarea
                            name="description"
                            placeholder="Description"
                            class="myForm @error('description') errorForm @enderror"
                        >{{ old('description') ? old('description') : $project->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback d-block errorSpan">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <technologies
                            :technologies="{{ $technologies }}"
                            :project="{{ json_encode($project->technologies) }}"
                        ></technologies>
                        @error('technologies')
                            <span class="invalid-feedback d-block errorSpan">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input 
                            type="text"
                            name="repository"
                            placeholder="Repository"
                            class="myForm @error('repository') errorForm @enderror"
                            value="{{ old('repository') ? old('repository') : $project->repository }}"
                        >
                        @error('repository')
                            <span class="invalid-feedback d-block errorSpan">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input 
                            type="text"
                            name="url"
                            placeholder="URL"
                            class="myForm @error('url') errorForm @enderror"
                            value="{{ old('url') ? old('url') : $project->url }}"
                        >
                        @error('url')
                            <span class="invalid-feedback d-block erorSpan">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">                        
                        <span class="font-weight-bold mb-3 d-block @error('image') text-danger @enderror">Images</span>
                        
                        @foreach ($project->images as $image)
                            <img src="{{ Storage::url($image->path) }}" alt="Image{{$project->name}}" height="100" width="100">
                            
                        @endforeach

                        <input
                            type="file"
                            name="image"
                            class="myForm @error('image') errorForm @enderror"
                        >
                        @error('image')
                            <span class="invalid-feedback d-block">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-block">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection