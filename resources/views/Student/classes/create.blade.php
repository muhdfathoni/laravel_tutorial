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
                    <form action="{{ route('class.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Class Name</strong>
                                    <input type="text" name="name" class="form-control" placeholder="Name Class">
                                </div>
                                <div class="form-group">
                                    <strong>Day</strong>
                                    <select class="form-control" name="date">
                                        <option disabled selected>-- Select Day--</option>
                                        <option value="Monday">Monday</option>
                                        <option value="Tuesday">Tuesday</option>
                                        <option value="Wednesday">Wednesday</option>
                                        <option value="Thursday">Thursday</option>
                                        <option value="Friday">Friday</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <strong>Start</strong>
                                    <input type="time" name="start" class="form-control" min="08:30" max="17:30"></input>
                                    <small>Class hours are 8:30am to 5:30pm</small>
                                </div>
                                <div class="form-group">
                                    <strong>End</strong>
                                    <input type="time" name="end" class="form-control" min="08:30" max="17:30"></input>
                                    <small>Class hours are 8:30am to 5:30pm</small>
                                </div>
                            </div>
                            <br>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <a class="btn btn-secondary" href="{{ route('class.index') }}"> Back</a>
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