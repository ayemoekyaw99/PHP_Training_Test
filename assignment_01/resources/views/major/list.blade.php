@extends('layout.app')

@section('Major List') @endsection

@section('content')
<div class="container mt-4">
    <div class="mb-2">
        <a href="{{route('major#create')}}" class="btn btn-primary btn-sm mb-3">Create</a>
    </div>
    <div class="card">
        <h3 class="card-header">
            Major Lists
        </h3>
        <div class="card-body">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($majors as $major)
                    <tr>
                        <th>{{ $major->id }}</th>
                        <td>{{ $major->name }}</td>
                        <td>
                            <a href="{{route('major#edit',$major->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{route('major#delete',$major->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
