@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 col-lg-6 mx-auto">
                <h1 class="text-center mb-5">Create Technology</h1>
                <form
                    action="{{ route('technologies.store') }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf
                    <div class="form-group">
                        <input 
                            type="text"
                            name="name"
                            placeholder="Name"
                            value="{{ old('name') }}"
                            class="myForm @error('name') errorForm @enderror"
                        >
                        @error('name')
                            <span class="invalid-feedback d-block spanError">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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
                        <button type="submit" class="btn btn-dark btn-block border border-secondary">Add Technology</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection