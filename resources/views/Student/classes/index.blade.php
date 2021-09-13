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

                    <a href="{{ route('class.create') }}" class="btn btn-success float-left mr-1">Add Class</a>
                    <a href="{{ route('class.assign') }}" class="btn btn-primary float-left mr-1">Assign Class</a>
                    <br>
                    <br>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th>Class</th>
                                <th>Day</th>
                                <th>Start</th>
                                <th>End</th>
                                <th>Student List</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($classes as $class)
                            <tr>
                                <td>{{ $class->name }}</td>
                                <td>{{ $class->date }}</td>
                                <td>{{ $class->start }}</td>
                                <td>{{ $class->end }}</td>
                                <td class="text-center">
                                    <a href="{{ route('class.student.list') }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
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
