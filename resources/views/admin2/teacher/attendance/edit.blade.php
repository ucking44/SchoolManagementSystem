@extends('layouts.backend.app')

@php
    $class_name
@endphp

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
                <h1>
                    Attendance
                @if (isset($class_name))
                <a href="{{ URL::to('AttendanceList', $class_name->teacher_id) }}">
                    <button class="pull-right" title="Back to attendance list">Back</button>
                </a>
                @endif
                </h1>

                {{-- <h3 style="font-weight: bold; text-transform: uppercase; text-align: left">
                    <i class="fa fa-calendar"></i> mark <b style="color: red"> attendance </b>
                </h3> --}}
            </div>
        </div>
    <div class="panel-body">

        <div class="content">
            <div class="box box-primary">
                <div class="row">
                    @include('admin.teacher.attendance.edit_attendance')
                </div>
            </div>
        </div>

    </div>

@endsection

