@extends('layouts.backend.app')

@section('title', 'Fee Structure')

@section('content')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Fee Structure</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>

        <div class="section-body">
            <form class="needs-validation" novalidate="" action="{{ URL::to('/update-fee-structure/' . $feeStructure->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="card-body">
                    <label for="semester_name"><b><h6>Semester</h6></b></label>
                    <select class="form-control col-md-6" name="semester_name">
                        <option value="">Select Semester</option>
                        @foreach ($semesters as $semester)
                            <option {{ $semester->id == $feeStructure->semester->id ? 'selected' : '' }} value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-body">
                    <label for="course_name"><b><h6>Course</h6></b></label>
                    <select class="form-control col-md-6" name="course_name">
                        <option value="">Select Course</option>
                        @foreach ($courses as $course)
                            <option {{ $course->id == $feeStructure->course_id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-body">
                    <label for="level"><b><h6>Level</h6></b></label>
                    <select class="form-control col-md-6" name="level">
                        <option value="">Select Level</option>
                        @foreach ($levels as $level)
                            <option {{ $level->id == $feeStructure->level_id ? 'selected' : '' }} value="{{ $level->id }}">{{ $level->level }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b><h6>Admission Fee</h6></b></label>
                            <input type="number" name="admissionFee" id="inputEmail4" class="form-control" value="{{ $feeStructure->admissionFee }}">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b><h6>Semester Fee</h6></b></label>
                            <input type="number" name="semesterFee" id="inputEmail4" class="form-control" value="{{ $feeStructure->semesterFee }}">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{ URL::to('feestructure') }}" class="btn btn-warning">Back</a>
                            <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection


