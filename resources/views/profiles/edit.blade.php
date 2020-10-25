@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">

            <div class="col-sm-12 col-md-10 col-lg-6 col-xl-6 mx-auto text-center">
                <h1 class="mb-5">Edit Profile</h1>
                <form
                    action="{{route('profiles.update', auth()->user()->profile)}}"
                    method="POST"
                >
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <textarea
                            name="biography"
                            placeholder="Biography"
                            class="myForm @error('biography') errorForm @enderror"
                            style="min-height: 200px;"
                        >{{ old('biography') ?? $profile->biography }}</textarea>
                        @error('biography')
                            <span class="invalid-feedback d-block errorSpan">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <technologies
                            :technologies="{{ $technologies }}"
                            current-technologies="{{ old('technologies') ?? $profileTechnologies}}"
                        ></technologies>
                        @error('technologies')
                            <span class="invalid-feedback d-block errorSpan">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <button
                            type="submit"
                            class="btn btn-outline-light btn-block border border-secondary"
                            id="saveButton"
                            onclick="showLoading()"
                        >Save changes</button>

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