@extends('layouts.app')
@section('content')
    <div class="container mt-3">
        <div class="col-6 offset-4">
            <div class=" mt-3">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <span class="text-center">{{session('status')}}</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
            </div>
            <div class="card">
                <div class="card-header">
                    New Task
                </div>
                <div class="card-body">
                    <form action="{{ route('tasks#create')}}" method="POST" class="">
                        @csrf
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Task</label>
                            <div class="col-12">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-light">
                                    <i class="fa fa-btn fa-plus"></i>Add Task
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if (count($tasks) > 0)
            <div class="card mt-3">
                <div class="card-header">
                    Current Tasks
                </div>
                <div class="card-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <!-- Task Delete Button -->
                                <td>
                                    <form action="{{route('task#delete',$task->id)}}" method="">
                                    @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-btn fa-trash"></i>Delete
                                        </button>
                                    </form>
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
