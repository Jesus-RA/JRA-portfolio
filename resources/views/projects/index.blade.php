@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            @if( count($projects) <= 0)
                <div class="alert alert-dark text-center col-md-6 mx-auto">
                    There is no projects yet.
                </div>
                <a href="{{route('projects.create')}}" class="btn btn-link btn-block mb-3">Create the first one</a>
            @else
                <div class="col-md-10 mx-auto">

                    <a href="{{route('projects.create')}}" class="btn btn-dark border border-secondary mb-3">Add project</a>

                    <div class="table-responsive">
                        <table class="table table-hover table-dark text-white">
                            <thead>
                                <tr>
                                    <th class="text-center">Photo</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Description</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
        
                            <tbody>
                                @foreach ($projects as $project)
                                    @include('components.modal-project')
                                    <tr class="text-center">
                                        <td>
                                            <img
                                                src="{{ $project->images->first()->path }}"
                                                alt=""
                                                width="100"
                                                height="100"
                                                class="rounded"
                                            >
                                        </td>
    
                                        <td>
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
                                            <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">
                                                <img src="{{ secure_asset('img/icons/pluma.svg') }}" alt="" height="25" width="15">
                                            </a>
                                            <delete-project
                                                project="{{ $project->id }}"
                                                project-name="{{ $project->name }}"
                                            ></delete-project>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif        
        </div>
    </div>
@endsection