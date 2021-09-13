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

                    <a href="{{ route('blog.create') }}" class="btn btn-success float-left">Add New</a>
                    <br>
                    <br>
                    <table class="table table-bordered text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>Show Name</th>
                                <th>Genre</th>
                                <th>IMDB Rating</th>
                                <th>Lead Actor</th>
                                <th class="" colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td class="text-left">{{ $blog->show_name }}</td>
                                <td class="text-left">{{ $blog->genre }}</td>
                                <td class="text-left">{{ $blog->imdb_rating }}</td>
                                <td class="text-left">{{ $blog->lead_actor }}</td>
                                <td>
                                    <a href="{{ route('blog.show', $blog) }}" class="btn btn-info" type="submit"><i class="fas fa-eye"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('blog.edit', $blog) }}" class="btn btn-warning" type="submit"><i class="fas fa-edit"></i></a>
                                </td>
                                <td>
                                    <form action="{{ route('blog.delete', $blog) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure?')"><i class="fas fa-trash-alt"></i></button>
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
