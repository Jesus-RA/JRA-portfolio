@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        @empty($projects)
            <div class="alert alert-dark text-center col-md-6">
                There is no projects yet.
            </div>
        @else            
            @foreach ($projects as $project)
                <div class="col-md-4">
                    @include('components.project')
                </div>
            @endforeach
        @endempty        
    </div>
@endsection