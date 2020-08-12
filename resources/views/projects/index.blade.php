@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @empty($projects)
                <div class="alert alert-dark text-center col-md-6 mx-auto">
                    There is no projects yet.
                </div>
            @else
                <div class="col-md-10 mx-auto">

                    <a href="{{route('projects.create')}}" class="btn btn-dark border border-secondary mb-3">Add project</a>

                    <table class="table table-hover table-dark text-white">
                        <thead>
                            <tr>
                                <th class="text-center">Photo</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($projects as $project)
                                @include('components.modal-project')
                                <tr>
                                    <td>
                                        <img
                                            src="{{ asset($project->images->first()->path) }}"
                                            alt=""
                                            width="100"
                                            height="100"
                                            class="rounded"
                                        >
                                    </td>

                                    <td>
                                        {{-- <a href="{{route('projects.show', $project)}}">
                                            {{$project->name}}
                                        </a> --}}
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#exampleModal{{$project->id}}">
                                            {{$project->name}}
                                        </button>
                                    </td>

                                    <td>
                                        <p class="text-justify">
                                            {{$project->description}}
                                        </p>
                                    </td>
                                    
                                    <td>
                                        <a href="" class="btn btn-warning d-inline">Edit</a>
                                        <a href="" class="btn btn-danger d-inline">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endempty        
        </div>
    </div>
@endsection