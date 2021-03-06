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

                    <a href="{{ route('student.create') }}" class="btn btn-success float-left mr-1">Add New Student</a>
                    <a href="{{ route('store.faculty') }}" class="btn btn-info float-left mr-1 float-right">Add Faculty</a>
                    <a href="{{ route('store.course') }}" class="btn btn-info float-left mr-1 float-right">Add Course</a>
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Student ID</th>
                                <th>Faculty</th>
                                <th>Course</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($students as $student)
                            <tr>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->faculty->name }}</td>
                                <td>{{ $student->course->name }}</td>  
                                <td>
                                    <form action="{{ route('student.delete', $student) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('student.show', $student) }}">Show</a>
                                        <a class="btn btn-warning" href="{{ route('student.edit', $student) }}">Edit</a> 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick=" return confirm('Are you sure?') ">Delete</button>
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

@push('js')
    @include('Student.js.js')
@endpush
