@extends('layout.app')

@section('Student List') @endsection
@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col">
            <div class="d-flex justify-content-between">
                <div>
                    <form action="{{ route('student#import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="file" name="file">

                        <br>
                        <button class="btn btn-primary">Import Data</button>
                    </form>
                </div>
                <div>
                    <a href="{{ route('student#export') }}" class="btn btn-primary">Export Data</a>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="mb-2">
        <a href="{{route('student#create')}}" class="btn btn-primary btn-sm mb-3">Create</a>
    </div>
    <div class="card">
        <h3 class="card-header">
            Student Lists
        </h3>
        <div class="card-body">
            <table class="table table-borderless table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Major</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>

                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>

                        @foreach ($majors as $major)
                        @if ($student->major_id == $major->id)
                        <td>
                            {{ $major->name }}
                        </td>
                        @endif
                        @endforeach

                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->address }}</td>>
                        <td>
                            <a href="{{route('student#edit',$student->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{route('student#delete',$student->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
