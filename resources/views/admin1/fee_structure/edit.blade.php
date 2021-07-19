@extends('layouts.backend.app')

@push('css')

@endpush

@section('title', 'Department')

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
            <h1 class="m-0 text-dark">Department</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active"> Department</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <div class="col-md-12">
            <div class="card card-primary card-outline">
                {{-- <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>Add New Department Year</b></h4>
                </div> --}}
                <div class="card-header">
                    <h5 class="m-0" id="heading">
                        @include('layouts.backend.partials.msg')
                    </h5>
                </div>
                <form action="{{ URL::to('/update-fee-structure/' . $feeStructure->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">

                        {{-- <select class="form-control" name="faculty_name">
                            @foreach($faculties as $faculty)
                                <option {{ $faculty->id == $department->faculty_id ? 'selected' : '' }} value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                            @endforeach
                        </select>

                        @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                    @endforeach --}}

                    {{-- <select class="form-control" name="course_name">
                        @foreach($courses as $course)
                            <option {{ $course->id == $class_scheduling->course->id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->course_name }}</option>
                        @endforeach
                    </select> --}}

                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="semester_name" id="semester_id" class="form-control">
                                    <option value="">Select Semester</option>
                                    @foreach ($semesters as $semester)
                                        <option {{ $semester->id == $feeStructure->semester->id ? 'selected' : '' }} value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="course_name" id="course_id" class="form-control">
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                        <option {{ $course->id == $feeStructure->course_id ? 'selected' : '' }} value="{{ $course->id }}">{{ $course->course_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="level" id="level_id" class="form-control">
                                    <option value="">Select Level</option>
                                    @foreach ($levels as $level)
                                        <option {{ $level->id == $feeStructure->level_id ? 'selected' : '' }} value="{{ $level->id }}">{{ $level->level }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Name Field -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" name="admissionFee" id="admissionFee" class="form-control" value="{{ $feeStructure->admissionFee }}">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="number" name="semesterFee" id="semesterFee" class="form-control" value="{{ $feeStructure->semesterFee }}">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <a href="{{ url('/feestructure') }}" class="btn btn-secondary">Back</a>
                        {!! Form::submit('Update Fee Structure', ['class' => 'btn btn-success']) !!}
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

