@extends('layouts.app')
@section('title', 'Student Details')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Student Details</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <strong class="d-block text-md-end" >Student ID:</strong>
                    </div>
                    <div class="col-6">
                        <span>{{ $student->student_id }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <strong class="d-block text-md-end" >Name:</strong>
                    </div>
                    <div class="col-6">
                        <span>{{ $student->name }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <strong class="d-block text-md-end" >Email:</strong>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-wrap gap-2">
                            <span>{{ $student->email }}</span>
                            <a href="mailto:{{$student->email}}" target="_blank" >Send Email</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <strong class="d-block text-md-end" >Phone:</strong>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-wrap gap-2">
                            <span>{{ $student->phone }}</span>
                            <a href="tel:{{$student->phone}}" target="_blank" >Call</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <strong class="d-block text-md-end" >Enrollments:</strong>
                    </div>
                    <div class="col-6">
                        <span>{{ count($student->enrollments) }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">
                <h5 class="card-title">Enrollments</h5>
            </div>
            <div class="card-body">
                @if(count($student->enrollments) > 0)
                    <ul class="list-group" >
                        @foreach($student->enrollments as $enrollment)
                            <li class="list-group-item" >{{ $enrollment->subject?->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <h6 class="text-center" >No Enrollment Founds</h6>
                @endif
            </div>
        </div>
    </div>
@endsection
