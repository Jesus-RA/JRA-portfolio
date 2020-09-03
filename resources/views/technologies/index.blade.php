@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        @if( count($technologies) <= 0 )
            <div class="alert alert-danger text-center col-sm-8 col-md-6 mx-auto">
                There is no technologies yet!
            </div>
            <a href="{{ route('technologies.create') }}" class="btn btn-link btn-block mb-3">Create the first one</a>

        @else
            <div class="col-md-8 mx-auto">
                <a href="{{ route('technologies.create') }}" class="btn btn-dark border border-secondary mb-3">Add Technology</a>
                <table class="table text-white text-center table-hover table-dark ">
                    <thead>
                        <th>id</th>
                        <th>Icon</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        @foreach ($technologies as $technology)
                            <tr>
                                <td>{{ $technology->id }}</td>
                                <td>
                                    <img src="{{ Storage::url($technology->icon->path) }}" alt="technology{{$technology->name}}" width="100">
                                </td>
                                <td>{{ $technology->name }}</td>
                                <td>
                                    <a
                                        href="{{ route('technologies.edit', $technology) }}"
                                        class="btn btn-warning"
                                    >Edit</a>
                                    <delete-technology
                                        technology="{{ $technology->id }}"
                                        name="{{ $technology->name }}"
                                    ></delete-technology>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif

    </div>
@endsection