@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Update Show</div>

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

                    <form action="{{ route('blog.update', $blog) }}" method="POST">
                        @csrf
                        @method ('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Show Name</strong>
                                    <input type="text" name="show_name" class="form-control" value="{{ $blog->show_name }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Show Genre</strong>
                                    <input type="text" name="genre" class="form-control" value="{{ $blog->genre }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Show IMDB Rating</strong>
                                    <input type="text" name="imdb_rating" class="form-control" value="{{ $blog->imdb_rating }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Show Lead Actor</strong>
                                    <input type="text" name="lead_actor" class="form-control" value="{{ $blog->lead_actor }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <a class="btn btn-secondary" href="{{ route('blog.index') }}">Back</a>
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
