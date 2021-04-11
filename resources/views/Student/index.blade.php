@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if ($message = Session::get('success'))
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-success">
                                    {{ $message }}
                                </div>
                            </div>
                        </div>
                    
                    <!-- alert for success -->
                    @elseif($message = Session::get('danger'))
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            </div>
                        </div>
                    @endif

                    <a href="{{ route('student.create') }}" class="btn btn-success float-left">Add New</a>
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>ID</th>
                                <th>Courses</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->courses }}</td>
                                <td>
                                    <form action="{{ route('student.delete', $student) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('student.show', $student) }}">Show</a>
                                        <a class="btn btn-warning" href="{{ route('student.edit', $student) }}">Edit</a>
                                        
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
