@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <h1 class="text-center mb-5">Edit {{ $technology->name }}</h1>
                <form
                    action="{{ route('technologies.update', $technology) }}"
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
                            value="{{ old('name') ?? $technology->name }}"
                            class="myForm @error('name') errorForm @enderror"
                        >
                        @error('name')
                            <span class="invalid-feedback d-block spanError">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <img
                            src="{{ $technology->icon->path }}"
                            alt="technology{{ $technology->name }}"
                            width="100"
                        >
                    </div>

                    <div class="form-group">
                        <input type="file" name="icon" class="myForm @error('icon') errorForm @enderror">
                        @error('icon')
                            <span class="invalid-feedback d-block errorSpan">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button
                            type="submit"
                            class="btn btn-outline-light btn-block"
                            id="saveButton"
                            onclick="showLoading()"
                        >Save Changes</button>

                        <button class="d-none btn btn-outline-light btn-block" type="button" disabled id="loadingButton">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        
        function showLoading(){

            let saveButton = document.getElementById('saveButton')
            let loadingButton = document.getElementById('loadingButton')

            saveButton.classList.add('d-none');
            loadingButton.classList.remove('d-none');

        }
    </script>
@endsection