@extends('layouts.backend.app')

@section('title', 'Teacher')

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
            <h1 class="m-0 text-dark">Teacher</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active"> Teacher</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <a href="#" onclick="$('#markAttendance').modal({'backdrop': 'static'});" class="btn btn-success pull-right"></a>
                <div class="card-header">
                    <h5 class="m-0" id="heading">
                        @include('layouts.backend.partials.msg')
                    </h5>
                </div>
            </div>
        </div>

        <div class="panel-default">
            <div class="panel-heading">
                <a href="#"><button class="btn bg-navy pull-right" data-toggle="modal" data-target="#ReportList">Attendance Report</button></a>
                @isset($class_name)
                <a href="{{ URL::to('AttendanceList', $class_name->teacher_id) }}" style="margin-right: 10px;">
                    <button class="btn bg-navy pull-right">Attendance List</button>
                </a>
                @endisset
                <h3 style="font-weight: bold; text-transform: uppercase; text-align: left">
                    <i class="fa fa-calendar"></i> mark <b style="color: red"> attendance </b>
                </h3>
            </div>
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

    </div>

    @if($attendances != $date)
    <form action="{{ URL::to('MarkAttendanceClass') }}" method="POST">
        @csrf
        @isset($students)
        @include('admin.teacher.attendance.mark_attendance')
        @endisset

        <button id="addAttendance" class="btn bg-navy pull-right"><i class="fa fa-pencil"></i> Mark Attendance</button>
    </form>
    @endif

@endsection

{{-- @push('js') --}}
{{-- @endpush --}}

<link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.js') }}">

@include('admin.teacher.attendance.day_attendance')
@section('scripts')

<script type="text/javascript">

    $('#semester_id').on('change', function(e) {
        var semester_id = $('#semester_id').val();
        getStudentsByclass()
        $('#department_id').empty();
        $('#class_id').empty();
        $('#course_id').empty();
    });

    $(function() {
        $('#dob').datepicker({
            changeMonth: true,
            changeYear: true,
            //format: 'YYYY-MM-DD HH:mm:ss',
            //dateFormat:'dd-mm-yy',
            dateFormat: 'yy-mm-dd'
        });
    });

</script>



