@extends('layouts.app')
@section('title','Subjects')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title">Subjects</h5>
                <a href="{{ route('subjects.create') }}" class="btn btn-primary">Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center w-100">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Credit Hours</th>
                            <th>Instructor</th>
                            <th>Department</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subjects as $subject)
                            <tr>
                                <td>{{ $subject->name }}</td>
                                <td>{{ $subject->credit_hours }}</td>
                                <td>{{ $subject->instructor }}</td>
                                <td>{{ $subject->department }}</td>
                                <td>
                                    <a href="{{ route('subjects.edit',$subject->id) }}" class="btn btn-primary btn-sm" ><i class="fa fa-edit" ></i></a>
                                    <form action="{{ route('subjects.destroy',$subject->id) }}" method="post" class="d-inline" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash" ></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $subjects->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
