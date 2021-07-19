@extends('layouts.backend.app')

@section('title', 'Course')

@section('content')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Course</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>

        <div class="section-body">
            <form class="needs-validation" novalidate="" action="{{ route('course.update', $course->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="col-4 mt-3">
                    <label for="level">Level</label>
                    <select class="form-control" name="level">
                        @foreach($levels as $level)
                            <option {{ $level->id == $course->level->id ? 'selected' : '' }} value="{{ $level->id }}">{{ $level->level }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b><h6>Course Name</h6></b></label>
                            <input type="text" name="course_name" id="inputEmail4" class="form-control" value="{{ $course->course_name }}">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b><h6>Course Code</h6></b></label>
                            <input type="text" name="course_code" id="inputEmail4" class="form-control" value="{{ $course->course_code }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description"><b><h6>Description</h6></b></label>
                        <textarea class="form-control" name="description" rows="4" required="">{{ $course->description }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{ route('course.index') }}" class="btn btn-warning">Back</a>
                            <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection


