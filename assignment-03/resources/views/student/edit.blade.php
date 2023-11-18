@extends('layout.app')

@section('Student Edit') @endsection

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
            Student Edit
        </h4>
        <div class="card-body">
            <form action="{{route('student#update',$student->id)}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="" placeholder="name" name="name" value="{{$student->name}}">
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
                        <option value="{{ $major->id }}" @if ($student->major_id==$major->id) selected @endif>{{ $major->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="" placeholder="09***********" name="phone" value="{{$student->phone}}">
                    @error('phone')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="" placeholder="name@example.com" name="email" value="{{$student->email}}">
                    @error('email')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="" name="address">{{$student->address}}</textarea>
                    @error('address')
                    <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{route('students#list')}}" type="submit" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
