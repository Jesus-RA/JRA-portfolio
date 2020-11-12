@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 mt-5 mx-auto p-5">
            <h1 class="text-center mb-5">{{ __('Welcome back chief') }}</h1>

            <form
                method="POST"
                action="{{ route('login') }}"
                {{-- class="justify-content-center" --}}
            >
                @csrf

                <div class="form-group">
                    {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label> --}}

                    <input id="email" type="email" placeholder="Username" class="myForm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group">
                    {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                    <input id="password" type="password" placeholder="Password" class="myForm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                <div class="form-group">
                    <button type="submit" class="btn btn-outline-light border border-secondary btn-block"
                        id="saveButton"
                        onclick="showLoading()"
                    >
                        {{ __('Login') }}
                    </button>

                    <button class="d-none btn btn-outline-light btn-block" type="button" disabled id="loadingButton">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                    {{-- @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif --}}
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