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
                                <th colspan="5">Classname</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>

                    <a href="{{ route('class.index') }}" class="btn btn-secondary">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection