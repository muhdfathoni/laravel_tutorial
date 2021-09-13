@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Add New Student</div>

                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <p><strong>Warning!</strong> Please check your input field</p>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('student.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Student Name</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <strong>Email</strong>
                                    <input type="text" name="email" class="form-control" placeholder="Email"></input>
                                </div>
                                <div class="form-group">
                                    <strong>Student ID</strong>
                                    <input type="number" name="student_id" class="form-control" placeholder="Student ID"></input>
                                </div>
                                <div class="form-group">
                                    <strong>Faculty</strong>
                                    <select name="faculty" class="form-control faculty_ajax" id="faculty">
                                        <option>-- Select Faculty --</option>
                                        @foreach ($faculty as $f)
                                            <option value="{{ $f->id }}">{{ $f->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Courses</strong>
                                    <select name="course" class="form-control course_ajax" id="course">
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <a class="btn btn-secondary" href="{{ route('student.index') }}"> Back</a>
                                <button type="submit" class="btn btn-primary float-right">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    @include('Student.js.js')
@endpush
