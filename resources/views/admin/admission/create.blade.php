@extends('layouts.backend.app')

@section('title', 'Admission')

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
            <h1 class="m-0 text-dark">Admission</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active"> Admission</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <div class="col-md-12">
            <div class="card card-primary card-outline">
                {{-- <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>Add New Admission</b></h4>
                </div> --}}
                <div class="card-header">
                    <h5 class="m-0" id="heading">
                        @include('layouts.backend.partials.msg')
                    </h5>
                </div>
                <form action="{{ route('admission.store') }}" id="company-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                            <input type="text" name="username" id="username" value="{{ $rand_username_password }}" class="form-control">
                            <input type="text" name="password" id="password" value="{{ $rand_username_password }}" class="form-control">
                            {{-- <input type="hidden" name="user_id" id="user_id" value="{{ Auth::id() }}" class="form-control"> --}}
                            {{-- <input type="hidden" name="dateregistered" id="dateregistered" value="{{ $date('Y-m-d') }}" class="form-control"> --}}

                        <div class="row">

                            <div class="col-6 mt-3">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" required="">
                            </div>

                            <div class="col-6 mt-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" required>
                            </div>

                            <div class="col-6 mt-3">
                                <label for="father_name">Father Name</label>
                                <input type="text" name="father_name" id="father_name" class="form-control" required>
                            </div>

                            <div class="col-6 mt-3">
                                <label for="mother_name">Mother Name</label>
                                <input type="text" name="mother_name" id="mother_name" class="form-control" required>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="fullname">Prospective Student</label>
                                <select class="form-control" name="fullname" required>
                                    @foreach($prosStudents as $prosStudent)
                                        <option value="{{ $prosStudent->id }}">{{ $prosStudent->fullname }}</option>
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
                                <label for="department_name">Department Name</label>
                                <select class="form-control" name="department_name" required>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="faculty_name">Faculty Name</label>
                                <select class="form-control" name="faculty_name" required>
                                    @foreach($faculties as $faculty)
                                        <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="batch">Batch Name</label>
                                <select class="form-control" name="batch" required>
                                    @foreach($batches as $batch)
                                        <option value="{{ $batch->batch }}">{{ $batch->batch }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" required>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender" required>
                                    {{-- <option>Select Gender</option> --}}
                                        <option value="male">Male</option>
                                        <option value="female">FeMale</option>
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="email"> Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" required>
                            </div>

                            <div class="col-12 mt-3">
                                <label for="current_address">Current Address</label>
                                <textarea class="form-control" name="current_address" id="current_address" rows="4" required></textarea>
                            </div>

                            <div class="col-3 mt-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div>

                            <div class="col-3 mt-3">
                                <label for="passport">Passport</label>
                                <input type="text" name="passport" id="passport" class="form-control" required>
                            </div>

                            <div class="col-3 mt-3">
                                <label for="dateregistered">Date Registered</label>
                                <input type="date" name="dateregistered" id="dateregistered" class="form-control" required>
                            </div>

                            <div class="col-3 mt-3">
                                <label for="roll_no">Roll No</label>
                                <input type="text" name="roll_no" id="roll_no" class="form-control" required>
                            </div>

                            <div class="col-12 mt-3">
                                <label for="nationality">Nationality</label>
                                <input type="text" name="nationality" id="nationality" class="form-control" required>
                            </div>

                        </div>
                        <div class="col-3 mt-3">
                            <label for="status" class="control-label">Status</label>
                            <br/>
                            {{-- <div class="controls"> --}}
                            <input type="checkbox" name="status" id="enable" value="enable">
                            {{-- </div> --}}
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6 text-left">
                                <a href="{{ route('admission.index') }}" class="btn btn-warning">Back</a>
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

