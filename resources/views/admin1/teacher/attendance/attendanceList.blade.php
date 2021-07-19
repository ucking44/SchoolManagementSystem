@extends('layouts.backend.app')

@section('title', 'Teacher')

@push('css')
   <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.css') }}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Attendance</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Mark Attendance</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content-header">
        <h1 class="pull-left"><i class="fa fa-calendar"> Attendance</i></h1>
        <h1 class="pull-right">
            <a href="#" onclick="$('#markAttendance').modal({'backdrop': 'static'});" class="btn btn-success pull-right" style="margin-top: -10px; margin-bottom: 5px"><i class="fa fa-pencil"> Mark Attendance</i></a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('layouts.backend.partials.msg')
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">

<style>
    .btn-block {
        height: 28px;
        text-emphasis: center;
        text-anchor: top;
    }
</style>

@php
    $date = date('d-m-Y');
@endphp

            </div>
        </div>
    </div>

    <div class="panel-default">
        <div class="panel-heading">
            <a href=""> <button class="btn bg-navy pull-right" data-toggle="modal" data-target="#ReportList">Attendance Report</button></a>
            <h3 style="font-weight: bold; text-transform: uppercase; text-align: left">
                <i class="fa fa-calendar"></i> attendance <sup>s</sup> <b style="color: red"> list</b>
            </h3>
        </div>

        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ URL::to('/search/attendance/by/roll_no') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" name="roll_no" id="roll_no" class="form-control" placeholder="Roll No.">
                                <span class="input-group-btn">
                                    <button id="filter" class="btn btn-primary btn-block" onclick="searchStationTable();">
                                        <span class="glyphicon glyphicon-search">Search</span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <form action="{{ URL::to('/search/attendance/by/class') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group">
                                <select name="class_id" id="class_id" class="form-control select_2_single">
                                    <option value="" selected disabled>select class</option>
                                    @foreach ($classes as $class)
                                    <option value="{{ $class->class_code }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>

                                <span class="input-group-btn">
                                    <button id="filter" class="btn btn-primary btn-block" onclick="searchStationTable();">
                                        <span class="glyphicon glyphicon-search">Search</span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <form action="{{ URL::to('/search/attendance/by/date') }}" method="GET">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" name="attendance_date" id="attendance_date" class="form-control" placeholder="Date" autocomplete="off">
                                <span class="input-group-btn">
                                    <button id="filter" class="btn btn-primary btn-block" onclick="searchStationTable();">
                                        <span class="glyphicon glyphicon-search">Search</span>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    @if($attendances != $date)
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 style="font-weight: bold; text-transform: uppercase; text-align: left">
                <i class="fa fa-calendar"></i> today' <sup>s</sup> attendance<b style="color: red"> Already Taken</b>
            </h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="student">
                    <thead>
                        <tr>
                            <th>Roll No.</th>
                            <th>Student Name</th>
                            <th>Status</th>
                            <th>Class</th>
                            <th>Course</th>
                            <th>Semester</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @if($attendances->where('attendance_date', $date)->where('teacher_id', $class_name->teacher_id))
                        @foreach ($attendances as $key => $item)
                        <tr>
                            <td><img src="{{ asset('student_images/' .$item->image) }}" alt="" class="rounded-circle" width="50" height="50" style="border-radius: 50%; vertical-align: middle;"></td>
                            <td>{{ $item->roll_no }}</td>
                            <td>{{ $item->student_first_name ." ". $item->student_last_name }}</td>
                            <td>
                                @if($item->attendance_status == 'present')
                                <div style="background-color: #27AE60; color: #fff;">Present</div>
                                @elseif($item->attendance_status == 'absent')
                                <div style="background-color: #E74C3C; color: #fff;">Absent</div>
                                @elseif($item->attendance_status == 'late')
                                <div style="background-color: #3498D8; color: #fff;">Late</div>
                                @else
                                <div style="background-color: #A569BD; color: #fff;">Sick</div>
                                @endif
                            </td>
                            <td> {{ $item->class_name }}</td>
                            <td> {{ $item->course_name }}</td>
                            <td> {{ $item->semester_name }}</td>
                            <td> {{ $item->attendance_date }}</td>
                            <td colspan="3">
                                <a href="{{ url('teacher/edit/attendance/' . $item->attendance_date. '/' . $item->class_code . '/' . $item->semester_id . '/' . $class_name->teacher_id) }}">
                                    <button name="edit_date" type="submit"><i class="fa fa-edit"></i></button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="10">
                                <h1 align='center' class="alert alert-danger">No Attendance Found Under This Date! Please, Try Another Date.</h1>
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
</div>
</div>
<div class="text-center">

</div>


@endsection

@include('admin.teacher.attendance.day_attendance')

@section('scripts')
<script type="text/javascript">

    $('#semester_id').on('change', function(e) {
        var semester_id = $('#semester_id').val();
        getStudentByclass()
        $('#department_id').empty();
        $('#class_id').empty();
        $('#course_id').empty();
    });

    $('#faculty_id').on('change', function(e) {
        var faculty_id = $('#faculty_id').val()
        getByfaculty()
        $('#class_id').empty();
        $('#course_id').empty();
    });

    $('#department_id').on('change', function(e) {
        var department_id = $('#department_id').val()
        getBydepartment()
        $('#course_id').empty();
    });

    $('#class_id').on('change', function(e) {
        var class_id = $('#class_id').val()
        getBycourse()
    });

    function getStudentByclass()
    {
        var semester_id = $('#semester_id').val()
        //var degree_id = $('#degree_id').val()
        var faculty_id = $('#faculty_id')
        $(faculty_id).empty();
        $('#faculty_id').append($('<option>').text("--Select Faculty--").attr('value', ""));
            $.get("{{ url('class-attendance') }}",
            {'semester_id' : semester_id}, function(data) {
                console.log(data);
                $.each(data, function(i, f) {
                    $(faculty_id).append($('<option/>', {
                        value : f.faculty_id,
                        text : f.faculty_name
                    }))
                })
            })
    }

    function getByfaculty()
    {
        var faculty_id = $('#faculty_id').val()
        var department_id = $('#department_id')
        $(department_id).empty();
        $('#department_id').append($('<option>').text("--Select Department--").attr('value', ""));
            $.get("{{ url('dynamic-by-faculty') }}",
            {'faculty_id' : faculty_id}, function(data) {
                console.log(data);
                $.each(data, function(i, d) {
                    $(department_id).append($('<option/>', {
                        value : d.department_id,
                        text : d.department_name
                    }))
                })
            })
    }

    function getBydepartment()
    {
        var department_id = $('#department_id').val()
        var class_id = $('#class_id')
        $(class_id).empty();
        $('#class_id').append($('<option>').text("--Select Class--").attr('value', ""));
            $.get("{{ url('dynamic-by-class') }}",
            {'department_id' : department_id}, function(data) {
                console.log(data);
                $.each(data, function(i, c) {
                    $(class_id).append($('<option/>', {
                        value : c.class_id,
                        text : c.class_name
                    }))
                })
            })
    }

    function getBycourse()
    {
        var class_id = $('#class_id').val()
        var course_id = $('course_id')
        $(course_id).empty();
        $('#course_id').append($('<option>').text("--Select Course--").attr('value', ""));
            $.get("{{ url('dynamic-by-course') }}",
            {'class_id' : class_id}, function(data) {
                console.log(data);
                $.each(data, function(i, c) {
                    $(course_id).append($('<option/>', {
                        value : c.id,
                        text : c.id
                    }))
                })
            })
    }

    $('#attendance_date').datetimepicker({
        format: 'DD-MM-YYYY',
        useCurrent: false
    });

    $('#attendance_date').on('click', function() {

    });

    $(document).ready(function() {
        if($('#class_id').val() == '')
        {
            $('#addAttendance').hide();
        }
        else
        {
            $('#addAttendance').show();
        }

        alert(1);
    })

    $("#class").on('change', function() {
        var classid = $("#class").val();

        if($('#class').val() == '')
        {
            $('#addAttendance').hide();
        }
        else
        {
            $('#addAttendance').show();
        }

        $.ajax({
            type: 'get',
            dataType: 'html',
            url: '{{ url("/get/attendance/class")}}',
            data: {'class_id': classid},

            success: function(data) {
                console.log(data);
                $("#student").html(data);
            }
        });
    });

    $('#attendance_date').datetimepicker({
        format: 'DD-MM-YYYY',
        useCurrent: false
    });

    function attendance_date(val) {
        document.getElementById('attendance_date1').value = val;
    }

</script>
@endsection

{{--  @push('js')

    <script src="{{ asset('asset/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.js') }}">


    <script>
        $(function() {
            $('#startDate').datepicker({
                autoclose:true,
                dateFormat:'dd-mm-yy',
            });
            $('#endDate').datepicker({
                autoclose:true,
                dateFormat:'dd-mm-yy',
            });
        })
    </script>



@endpush  --}}
