@extends('layouts.backend.app')

@section('title', 'Student')

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
            <h1 class="m-0 text-dark">Student</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active"> Student</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <div class="col-md-12">
            <div class="card card-primary card-outline">
                {{-- <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>Add New Student</b></h4>
                </div> --}}
                <div class="card-header">
                    <h5 class="m-0" id="heading">
                        @include('layouts.backend.partials.msg')
                    </h5>
                </div>
                <form action="{{ route('student.store') }}" id="company-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <label for="first_name">Admission Name</label>
                                <select class="form-control" name="first_name" required="">
                                    @foreach($admissions as $admission)
                                        <option value="{{ $admission->id }}">{{ $admission->first_name }} {{ $admission->last_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="fullname">Fullname</label>
                                <input type="text" name="fullname" id="fullname" class="form-control">
                            </div>

                            <div class="col-12">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>

                            <div class="col-12 mt-3">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="4"></textarea>
                            </div>

                            <div class="col-4 mt-3">
                                <label for="phone">Phone</label>
                                <input type="text" name="phone" id="phone" class="form-control">
                            </div>

                            <div class="col-3 mt-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>

                            <div class="col-3 mt-3">
                                <label for="email"> Email</label>
                                <input type="email" name="email" id="email" class="form-control">
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
                                <a href="{{ route('student.index') }}" class="btn btn-warning">Back</a>
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

