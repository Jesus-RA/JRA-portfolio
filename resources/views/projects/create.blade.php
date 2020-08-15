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
                    <div class="form-group">
                        <input 
                            type="text"
                            name="name" 
                            placeholder="Name"
                            class="myForm @error('name') errorForm @enderror"
                            value="{{ old('name') }}"
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
                        >{{ old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback d-block errorSpan">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        {{-- Aquí insertas las technologías a elegir para crear un proyecto --}}
                    </div>

                    <div class="form-group">
                        <input 
                            type="text"
                            name="repository"
                            placeholder="Repository"
                            class="myForm @error('repository') errorForm @enderror"
                            value="{{ old('repository') }}"
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
                            value="{{ old('url') }}"
                        >
                        @error('url')
                            <span class="invalid-feedback d-block erorSpan">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <span class="font-weight-bold mr-5 @error('image') text-danger @enderror">Image</span>
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
                        <button type="submit" class="btn btn-dark btn-block">Add project</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection