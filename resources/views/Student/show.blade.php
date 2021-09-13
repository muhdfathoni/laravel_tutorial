@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">View</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Student Name</strong>
                                <input type="text" class="form-control" value="{{ $student->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <strong>Email</strong>
                                <input type="text" class="form-control" value="{{ $student->email }}" readonly>
                            </div>
                            <div class="form-group">
                                <strong>Student ID</strong>
                                <input type="text" class="form-control"  value="{{ $student->student_id }}" readonly>
                            </div>
                            <div class="form-group">
                                <strong>Faculty</strong>
                                <input type="text" class="form-control"  value="{{ $student->faculty->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <strong>Courses</strong>
                                <input type="text" class="form-control"  value="{{ $student->course->name }}" readonly>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <a class="btn btn-secondary" href="{{ route('student.index') }}">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
