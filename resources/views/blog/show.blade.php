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
                    <table class="table table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>Show Name</th>
                                <th>Genre</th>
                                <th>IMDB Rating</th>
                                <th>Lead Actor</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-left">{{ $blog->show_name }}</td>
                                <td class="text-left">{{ $blog->genre }}</td>
                                <td class="text-left">{{ $blog->imdb_rating }}</td>
                                <td class="text-left">{{ $blog->lead_actor }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('blog.index') }}" class="btn btn-secondary" type="submit">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
