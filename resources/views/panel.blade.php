@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row border border-success">
            <div class="col-md-6 mx-auto">
                <div class="card-body">
                    <div class="list-group">
                        <a href="{{ route('projects.index') }}" class="list-group-item bg-dark text-white mb-1">Manage Projects</a>
                        <a href="{{ route('technologies.index') }}" class="list-group-item bg-dark text-white mb-1">Manage technologies</a>
                        <a href="" class="list-group-item bg-dark text-white mb-1">Algo</a>
                        <a href="" class="list-group-item bg-dark text-white mb-1">Algo</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection