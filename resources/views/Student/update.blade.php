@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Edit</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('student.update', $student) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Student Name</strong>
                                    <input type="text" name="name" class="form-control" value="{{ $student->name }}">
                                </div>
                                <div class="form-group">
                                    <strong>Email</strong>
                                    <input type="text" name="email" class="form-control" value="{{ $student->email }}"></input>
                                </div>
                                <div class="form-group">
                                    <strong>Student ID</strong>
                                    <input type="text" name="student_id" class="form-control" value="{{ $student->student_id }}"></input>
                                </div>
                                <div class="form-group">
                                    <strong>Faculty</strong>
                                    <select name="faculty" class="form-control faculty_ajax" id="faculty">
                                        <option>--- Select Faculty ---</option>
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
                                <a class="btn btn-secondary" href="/student"> Back</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
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
