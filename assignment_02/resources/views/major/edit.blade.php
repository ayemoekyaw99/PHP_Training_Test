@extends('layout.app')

@section('Major Edit') @endsection

@section('content')
<div class="container">
    <div class=" mt-3">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="text-center">{{session('success')}}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="card mt-5">
        <h4 class="card-header font-weight-bold">
            Major Edit
        </h4>
        <div class="card-body">
            <form action="{{route('major#update',$major->id)}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"  placeholder="name" name="name" value="{{$major->name}}">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{route('majors#list')}}" type="submit" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
