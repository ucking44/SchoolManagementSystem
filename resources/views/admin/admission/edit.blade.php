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
                <form action="{{ route('admission.update', $admission->id) }}" id="company-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="row">

                            <div class="col-6 mt-3">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ $admission->first_name }}">
                            </div>

                            <div class="col-6 mt-3">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ $admission->last_name }}">
                            </div>

                            <div class="col-6 mt-3">
                                <label for="father_name">Father Name</label>
                                <input type="text" name="father_name" id="father_name" class="form-control" value="{{ $admission->father_name }}">
                            </div>

                            <div class="col-6 mt-3">
                                <label for="mother_name">Mother Name</label>
                                <input type="text" name="mother_name" id="mother_name" class="form-control" value="{{ $admission->mother_name }}">
                            </div>

                            {{-- <div class="col-4 mt-3">
                                <label for="fullname">Prospective Student</label>
                                <select class="form-control" name="fullname">
                                    @foreach($prosStudents as $prosStudent)
                                        <option {{ $prosStudent->id == $admission->prosStudent->id ? 'selected' : '' }} value="{{ $prosStudent->id }}">{{ $prosStudent->fullname }}</option>
                                    @endforeach
                                </select>
                            </div> --}}

                            <div class="col-4 mt-3">
                                <label for="class_name">Class Name</label>
                                <select class="form-control" name="class_name">
                                    @foreach($classes as $class)
                                        <option {{ $class->id == $admission->class->id ? 'selected' : '' }} value="{{ $class->class_id }}">{{ $class->class_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $admission->phone }}">
                            </div>

                            <div class="col-4 mt-3">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender" value="{{ $admission->gender }}">
                                    {{-- <option>Select Gender</option> --}}
                                        <option value="male">Male</option>
                                        <option value="female">FeMale</option>
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="email"> Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $admission->email }}">
                            </div>

                            <div class="col-4 mt-3">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" value="{{ $admission->dob }}">
                            </div>

                            <div class="col-12 mt-3">
                                <label for="current_address">Current Address</label>
                                <textarea class="form-control" name="current_address" id="current_address" rows="4">{{ $admission->current_address }}</textarea>
                            </div>

                            <div class="col-3 mt-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="col-3 mt-3">
                                <label for="passport">Passport</label>
                                <input type="text" name="passport" id="passport" class="form-control" value="{{ $admission->passport }}">
                            </div>

                            <div class="col-3 mt-3">
                                <label for="dateregistered">Date Registered</label>
                                <input type="date" name="dateregistered" id="dateregistered" class="form-control" value="{{ $admission->dateregistered }}">
                            </div>

                            <div class="col-3 mt-3">
                                <label for="roll_no">Roll No</label>
                                <input type="text" name="roll_no" id="roll_no" class="form-control" value="{{ $admission->roll_no }}">
                            </div>

                            <div class="col-12 mt-3">
                                <label for="nationality">Nationality</label>
                                <input type="text" name="nationality" id="nationality" class="form-control" value="{{ $admission->nationality }}">
                            </div>

                        </div>
                        <div class="col-3 mt-3">
                            <label for="status" class="control-label">Status</label>
                            <br/>
                            {{-- <div class="controls"> --}}
                            <input type="checkbox" name="status" id="enable" {{ $admission->status == "enable" ? 'checked' : '' }}>
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

