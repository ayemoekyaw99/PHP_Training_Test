@extends('layout.app')

@section('Student Create')
@endsection

@section('content')
    <div class="container">
        <div class=" mt-3">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="text-center">{{ session('success') }}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="card mt-5">
            <h4 class="card-header font-weight-bold">
                Student Create
            </h4>
            <div class="card-body">
                <form action="{{ route('student#store') }}" method="POST">
                    @csrf
                    @include('student.common')
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('students#list') }}" type="submit" class="btn btn-secondary">Back</a>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
