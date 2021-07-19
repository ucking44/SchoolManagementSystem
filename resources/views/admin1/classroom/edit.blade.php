@extends('layouts.backend.app')

@push('css')

@endpush

@section('title', 'Class Room')

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
            <h1 class="m-0 text-dark">Class Room</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item">Master</li>
            <li class="breadcrumb-item active"> Class Room</li>
            </ol>
        </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <div class="col-md-12">
            <div class="card card-primary card-outline">
                {{-- <div class="card-header card-header-primary">
                    <h4 class="card-title "><b>Add New Class Room Year</b></h4>
                </div> --}}
                <div class="card-header">
                    <h5 class="m-0" id="heading">
                        @include('layouts.backend.partials.msg')
                    </h5>
                </div>
                <form action="{{ route('classroom.update', $classroom->id) }}" id="company-form" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="row">
                            <div class="col-4">
                                <label for="classroom_name">Classroom Name</label>
                                <input type="text" name="classroom_name" id="classroom_name" class="form-control" value="{{ $classroom->classroom_name }}">
                            </div>

                            <div class="col-4">
                                <label for="classroom_code">Classroom Code</label>
                                <input type="text" name="classroom_code" id="classroom_code" class="form-control" value="{{ $classroom->classroom_code }}">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12">
                                <label for="classroom_description">Description</label>
                                <textarea class="form-control" name="classroom_description" id="classroom_description" rows="4">{{ $classroom->classroom_description }}</textarea>
                            </div>
                        </div>

                        {{-- <div class="col-3 mt-3">
                            <label for="status" class="control-label">Status</label>
                            <br/>
                            <input type="checkbox" name="status" id="enable" {{ $classroom->status == "enable" ? 'checked' : '' }}>
                        </div> --}}

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6 text-left">
                                <a href="{{ route('classroom.index') }}" class="btn btn-warning">Back</a>
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

