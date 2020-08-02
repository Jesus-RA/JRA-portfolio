@extends('layouts.app')

@section('content')
    <div class="row">
        @empty($projects)
            <div class="alert alert-dark text-center col-md-6">
                There is no projects yet.
            </div>
        @else            
            @foreach ($projects as $project)
                <div class="col-sm-12 col-md-4 mb-3">
                    @include('components.project')
                </div>
            @endforeach
        @endempty        
    </div>
@endsection