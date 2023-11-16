@extends('layout.app')

@section('Student Create') @endsection

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
            Student Create
        </h4>
        <div class="card-body">
            <form action="{{route('student#store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="name" name="name">
                    @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Major</label>
                    <select name="major_id" required class="form-control @error('major_id') is-invalid @enderror">
                        @error('major_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        @foreach($majors as $major)
                        <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="" placeholder="09***********" name="phone">
                    @error('phone')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="" placeholder="name@example.com" name="email">
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="" name="address"></textarea>
                    @error('address')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{route('students#list')}}" type="submit" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

