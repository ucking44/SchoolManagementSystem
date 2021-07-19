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
                <form action="{{ route('department.update', $department->id) }}" id="company-form" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <label for="faculty_name">Faculty Name</label>
                                <select class="form-control" name="faculty_name">
                                    @foreach($faculties as $faculty)
                                        <option {{ $faculty->id == $department->faculty_id ? 'selected' : '' }} value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="department_name">Department Name</label>
                                <input type="text" name="department_name" id="department_name" class="form-control" value="{{ $department->department_name }}">
                            </div>

                            <div class="col-6">
                                <label for="department_code">Department Code</label>
                                <input type="text" name="department_code" id="department_code" class="form-control" value="{{ $department->department_code }}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label for="department_description">Description</label>
                                <textarea class="form-control" name="department_description" id="department_description" rows="4">{{ $department->department_description }}</textarea>
                            </div>
                        </div>

                        {{-- <div class="col-3 mt-3">
                            <label for="department_status" class="control-label">Status</label>
                            <br/>
                              <input type="checkbox" name="department_status" id="department_status" {{ $department->department_status == "enable" ? 'checked' : '' }}>
                        </div> --}}


                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6 text-left">
                                <a href="{{ route('department.index') }}" class="btn btn-warning">Back</a>
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

