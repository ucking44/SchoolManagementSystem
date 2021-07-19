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
                <form action="{{ route('classScheduling.update', $class_scheduling->id) }}" id="company-form" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="row">

                            <div class="col-4 mt-3">
                                <label for="course_name">Course Name</label>
                                <select class="form-control" name="course_name">
                                    @foreach($courses as $course)
                                        <option {{ $course->id == $class_scheduling->course->id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->course_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- <div class="form-group">
                                <label class="bmd-label-floating">Category</label>
                                <select class="form-control" name="category">
                                    @foreach($categories as $category)
                                        <option {{ $category->id == $item->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="col-4 mt-3">
                                <label for="level">Level</label>
                                <select class="form-control" name="level">
                                    @foreach($levels as $level)
                                        <option {{ $level->id == $class_scheduling->level->id ? 'selected' : '' }} value="{{ $level->id }}">{{ $level->level }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="shift">Shift</label>
                                <select class="form-control" name="shift">
                                    @foreach($shifts as $shift)
                                        <option {{ $shift->id == $class_scheduling->shift->id ? 'selected' : '' }} value="{{ $shift->id }}">{{ $shift->shift }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="class_name">Class Name</label>
                                <select class="form-control" name="class_name">
                                    @foreach($classes as $class)
                                        <option {{ $class->id == $class_scheduling->class->id ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="classroom_name">Class Room</label>
                                <select class="form-control" name="classroom_name">
                                    @foreach($classrooms as $classroom)
                                        <option {{ $classroom->id == $class_scheduling->classroom->id ? 'selected' : '' }} value="{{ $classroom->id }}">{{ $classroom->classroom_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="batch">Batch</label>
                                <select class="form-control" name="batch">
                                    @foreach($batches as $batch)
                                        <option {{ $batch->id == $class_scheduling->batch->id ? 'selected' : '' }} value="{{ $batch->id }}">{{ $batch->batch }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="name">Day</label>
                                <select class="form-control" name="name">
                                    @foreach($days as $day)
                                        <option {{ $day->id == $class_scheduling->day->id ? 'selected' : '' }} value="{{ $day->id }}">{{ $day->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="time">Time</label>
                                <select class="form-control" name="time">
                                    @foreach($times as $time)
                                        <option {{ $time->id == $class_scheduling->time->id ? 'selected' : '' }} value="{{ $time->id }}">{{ $time->time }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="semester_name">Semester</label>
                                <select class="form-control" name="semester_name">
                                    @foreach($semesters as $semester)
                                        <option {{ $semester->id == $class_scheduling->semester->id ? 'selected' : '' }} value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6 mt-3">
                                <label for="start_time">Start Time</label>
                                <input type="time" name="start_time" id="start_time" class="form-control" value="{{ $class_scheduling->start_time }}">
                            </div>

                            <div class="col-6 mt-3">
                                <label for="end_time">End Time</label>
                                <input type="time" name="end_time" id="end_time" class="form-control" value="{{ $class_scheduling->end_time }}">
                            </div>

                        </div>
                        {{-- <div class="col-3 mt-3">
                            <label for="status" class="control-label">Status</label>
                            <br/>
                            <input type="checkbox" name="status" id="enable" {{ $class_scheduling->status == "enable" ? 'checked' : '' }}>
                        </div> --}}
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

