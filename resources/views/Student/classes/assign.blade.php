@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Assign Class for Students</div>

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

                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Add Class</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach($student as $stu)
                           
                                <td>{{ $stu->name }}</td>
                                <td>{{ implode(" ", $stu->class->pluck('name')->toArray()) }}
                                {{-- @foreach ($stu->class as $s)
                                    {{ $s->name }}
                                @endforeach --}}
                                </td>
                                <td>
                                    <a href="{{ route('class.student.class', $stu) }}" class="btn btn-info"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('class.index') }}" class="btn btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
