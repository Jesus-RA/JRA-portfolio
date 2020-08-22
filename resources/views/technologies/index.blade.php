@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        @empty($technologies)
            <div class="alert alert-danger text-center col-sm-8 col-md-6 mx-auto">
                There is no technologies yet!
            </div>

        @else
            <div class="col-md-8 mx-auto">
                <table class="table text-white text-center table-hover table-dark ">
                    <thead>
                        <th>id</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        @foreach ($technologies as $technology)
                            <tr>
                                <td>{{ $technology->id }}</td>
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

        @endempty

    </div>
@endsection