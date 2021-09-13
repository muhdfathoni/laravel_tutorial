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

                    <br>
                    <br>
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($persons as $person)
                            <tr>
                                <td>{{ $person['name'] }}</td>
                                <td>{{ $person['email'] }}</td>
                                <td>{{ date('d M Y g:i A', strtotime($person['date'])) }}</td>
                                <td>
                                @if($person['status'] == 1)
                                    Valid
                                @else
                                    Invalid
                                @endif
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
