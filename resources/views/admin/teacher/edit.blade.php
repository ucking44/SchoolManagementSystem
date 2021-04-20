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
                {{-- <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>Add New Teacher</b></h4>
                </div> --}}
                <div class="card-header">
                    <h5 class="m-0" id="heading">
                        @include('layouts.backend.partials.msg')
                    </h5>
                </div>
                <form action="{{ route('teacher.update', $teacher->id) }}" id="company-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="row">

                            <div class="col-6 mt-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $teacher->name }}">
                            </div>

                            <div class="col-4 mt-3">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender" value="{{ $teacher->gender }}">
                                    {{-- <option>Select Gender</option> --}}
                                        <option value="male">Male</option>
                                        <option value="female">FeMale</option>
                                </select>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="email"> Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ $teacher->email }}">
                            </div>

                            <div class="col-4 mt-3">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" value="{{ $teacher->dob }}">
                            </div>

                            <div class="col-4 mt-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ $teacher->phone }}">
                            </div>

                            <div class="col-12 mt-3">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="4">{{ $teacher->address }}</textarea>
                            </div>

                            <div class="col-12 mt-3">
                                <label for="nationality">Nationality</label>
                                <input type="text" name="nationality" id="nationality" class="form-control" value="{{ $teacher->nationality }}">
                            </div>

                            <div class="col-3 mt-3">
                                <label for="passport">Passport</label>
                                <input type="text" name="passport" id="passport" class="form-control" value="{{ $teacher->passport }}">
                            </div>

                            <div class="col-3 mt-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="col-3 mt-3">
                                <label for="dateregistered">Date Registered</label>
                                <input type="date" name="dateregistered" id="dateregistered" class="form-control" value="{{ $teacher->dateregistered }}">
                            </div>

                        </div>
                        <div class="col-3 mt-3">
                            <label for="status" class="control-label">Status</label>
                            <br/>
                            {{-- <div class="controls"> --}}
                            <input type="checkbox" name="status" id="enable" {{ $teacher->status == "enable" ? 'checked' : '' }}>
                            {{-- </div> --}}
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6 text-left">
                                <a href="{{ route('teacher.index') }}" class="btn btn-warning">Back</a>
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

