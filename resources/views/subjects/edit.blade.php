@extends('layouts.app')
@section('title','Edit Subject')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Subject</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('subjects.update',$subject->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $subject->name) }}" required autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="credit_hours" class="col-md-4 col-form-label text-md-end">{{ __('Credit Hours') }}</label>
                        <div class="col-md-6">
                            <input id="credit_hours" type="number" step="1" min="1" max="5" class="form-control @error('credit_hours') is-invalid @enderror" name="credit_hours" value="{{ old('credit_hours', $subject->credit_hours) }}" required>
                            @error('credit_hours')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="instructor" class="col-md-4 col-form-label text-md-end">{{ __('Instructor') }}</label>
                        <div class="col-md-6">
                            <input id="instructor" type="text" class="form-control @error('instructor') is-invalid @enderror" name="instructor" value="{{ old('instructor', $subject->instructor) }}" required >
                            @error('instructor')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="department" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>
                        <div class="col-md-6">
                            <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department', $subject->department) }}" required >
                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                        <div class="col-md-6">
                            <textarea name="description" id="description @error('description') is-invalid @enderror" class="form-control" required>{{ old('description', $subject->description) }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
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
