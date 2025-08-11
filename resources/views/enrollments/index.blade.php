@extends('layouts.app')
@section('title','Enrollments')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Enrollments</h5>
                <a href="{{ route('enrollments.create') }}" class="btn btn-primary" >Add New</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover text-center w-100">
                        <thead>
                        <tr>
                            <th>Student</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($enrollments as $enrollment)
                            <tr>
                                <td>{{ $enrollment->student?->name }} ({{$enrollment->student?->student_id}})</td>
                                <td>{{ $enrollment->subject?->name }}</td>
                                <td>{{ $enrollment->status }}</td>
                                <td>
                                    <a href="{{ route('enrollments.edit',$enrollment->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit" ></i></a>
                                    <form action="{{ route('enrollments.destroy',$enrollment->id) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash" ></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $enrollments->links() !!}
            </div>
        </div>
    </div>

@endsection
