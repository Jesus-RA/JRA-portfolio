@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        <div class="row">
            <a href="{{ route('profiles.edit', $profile) }}" class="btn btn-outline-light">Edit profile</a>
        </div>
        
        @include('about')
    </div>
@endsection