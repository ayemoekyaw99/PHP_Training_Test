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
                <tbody id="majorsList">
                    @foreach($majors as $major)
                    <tr>
                        <th>{{$major->id}}</th>
                        <td>{{$major->name}}</td>
                        <td>
                            <a href="{{route('major#edit',$major->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <button class="deleteMajor btn btn-danger btn-sm" data-id="{{ $major->id }}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form id="createMajorForm" class="mt-3">
        <input type="text" id="majorName" placeholder="Major Name" class="form-control" value="">
        <button type="submit" class="btn btn-secondary mt-2">Create Major</button>
    </form>
</div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/major.js') }}"></script>
