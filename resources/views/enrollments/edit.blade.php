@extends('layouts.app')
@section('title','Edit Enrollment')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Enrollment</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('enrollments.update',$enrollment->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="student_id" class="col-md-4 col-form-label text-md-end" >{{ __('Student') }}</label>
                        <div class="col-md-6">
                            <select name="student_id" id="student_id" class="form-control @error('student_id') is-invalid @enderror" required autofocus >
                                <option value="">Select Student</option>
                                @foreach($students as $student)
                                    <option @selected($student->id == old('student_id', $enrollment->student_id)) value="{{ $student->id }}">{{ $student->name }} ({{ $student->student_id }})</option>
                                @endforeach
                            </select>
                            @error('student_id')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="subject_id" class="col-md-4 col-form-label text-md-end" >{{ __('Subject') }}</label>
                        <div class="col-md-6">
                            <select name="subject_id" id="subject_id" class="form-control @error('subject_id') is-invalid @enderror" required >
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option @selected($subject->id == old('subject_id',$enrollment->subject_id)) value="{{ $subject->id }}">{{ $subject->name }}</option>
                                @endforeach
                            </select>
                            @error('subject_id')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="status" class="col-md-4 col-form-label text-md-end" >{{ __('Status') }}</label>
                        <div class="col-md-6">
                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror" required >
                                <option value="">Select Status</option>
                                <option @selected("In Progress" == old('status',$enrollment->status)) >In Progress</option>
                                <option @selected("Completed" == old('status',$enrollment->status)) >Completed</option>
                            </select>
                            @error('status')
                            <span class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success" >Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
