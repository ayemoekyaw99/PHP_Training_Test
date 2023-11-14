@extends('layout.app')

@section('Student List') @endsection
@section('content')
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
                    <?php foreach($students as $student): ?>

                    <tr>

                        <th>
                            <?php echo $student->id; ?>
                        </th>
                        <td>
                            <?php echo $student->name; ?>
                        </td>

                        @foreach($majors as $major)
                        @if ($student->major_id==$major->id)
                        <td>
                            <?php echo $major->name; ?>
                        </td>
                        @endif
                        @endforeach

                        <td>
                            <?php echo $student->phone; ?>
                        </td>
                        <td>
                            <?php echo $student->email; ?>
                        </td>
                        <td>
                            <?php echo $student->address; ?>
                        </td>
                        <td>
                            <a href="{{route('student#edit',$student->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{route('student#delete',$student->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
