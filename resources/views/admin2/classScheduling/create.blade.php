@extends('layouts.backend.app')

@section('title', 'Class Scheduling')

@push('css')
    <!-- Date -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.css') }}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Class Scheduling</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active"> Class Scheduling</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <div class="col-md-12">
            <div class="card card-primary card-outline">
                {{-- <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>Add New Class Scheduling</b></h4>
                </div> --}}
                <div class="card-header">
                    <h5 class="m-0" id="heading">
                        @include('layouts.backend.partials.msg')
                    </h5>
                </div>
                <form action="{{ route('classScheduling.store') }}" id="company-form" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="row">

                            <div class="col-4 mt-3">
                                <label for="course_name">Course Name</label>
                                <select class="form-control" name="course_name" required>
                                    @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="level">Level</label>
                                <select class="form-control" name="level" required>
                                    @foreach($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->level }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="shift">Shift</label>
                                <select class="form-control" name="shift" required>
                                    @foreach($shifts as $shift)
                                        <option value="{{ $shift->id }}">{{ $shift->shift }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="class_name">Class Name</label>
                                <select class="form-control" name="class_name" required>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="classroom_name">Class Room</label>
                                <select class="form-control" name="classroom_name" required>
                                    @foreach($classrooms as $classroom)
                                        <option value="{{ $classroom->id }}">{{ $classroom->classroom_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="batch">Batch</label>
                                <select class="form-control" name="batch" required>
                                    @foreach($batches as $batch)
                                        <option value="{{ $batch->id }}">{{ $batch->batch }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="day_name">Day</label>
                                <select class="form-control" name="day_name" required>
                                    @foreach($days as $day)
                                        <option value="{{ $day->id }}">{{ $day->day_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="time">Time</label>
                                <select class="form-control" name="time" required>
                                    @foreach($times as $time)
                                        <option value="{{ $time->id }}">{{ $time->time }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="semester_name">Semester Name</label>
                                <select class="form-control" name="semester_name" required>
                                    @foreach($semesters as $semester)
                                        <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 mt-3">
                                <label for="start_time">Start Time</label>
                                <input type="time" name="start_time" id="start_time" class="form-control" required>
                            </div>

                            <div class="col-6 mt-3">
                                <label for="end_time">End Time</label>
                                <input type="time" name="end_time" id="end_time" class="form-control" required>
                            </div>

                        </div>
                        <div class="col-3 mt-3">
                            <label for="status" class="control-label">Status</label>
                            <br/>
                            <input type="checkbox" name="status" id="enable" value="enable">
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6 text-left">
                                <a href="{{ route('classScheduling.index') }}" class="btn btn-warning">Back</a>
                            </div>

                            <div class="col-6 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection

@push('js')

<link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.js') }}">

<script>
    //$(function() {
        //     $('#dob').datepicker({
        //         autoclose:true,
        //         dateFormat:'dd-mm-yy',
        //     });
        // })
    $(function() {
        $('#dob').datepicker({
            changeMonth: true,
            changeYear: true,
            //format: 'YYYY-MM-DD HH:mm:ss',
            //dateFormat:'dd-mm-yy',
            dateFormat: 'yy-mm-dd'
        });
    })
    // function companyFormSubmit()
    // {
    //     var heading = $('#heading').val();
    //     if (heading == 'Add new Company')
    //     {
    //         $('#company-form').attr('action', '').submit();
    //     }
    //     else
    //     {
    //         $('#company-form').attr('action', '').submit();
    //     }
    // }
</script>

@endpush

