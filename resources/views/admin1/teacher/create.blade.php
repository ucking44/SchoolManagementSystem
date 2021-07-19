@extends('layouts.backend.app')

@section('title', 'Teacher')

@push('css')
    <!-- Date -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.css') }}">
@endpush

<style type="text/css">

    .teacher-image {
        height: 160px;
        padding-left: 1px;
        padding-right: 1px;
        border: 1px solid #ccc;
        background: #eee;
        width: 140px;
        margin: 0 auto;

        /* border-radius: 50%;
        vertical-align: middle;
        float: left; */
    }

    .image > input[type='file'] {
        display: none;
    }

    .image {
        vertical-align: middle;
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .student-id {
        background-repeat: repeat-x;
        border-color: #ccc;
        padding: 5px;
        text-align: center;
        background: #eee;
        border-bottom: 1px solid #ccc;
    }

    .btn-browse {
        border-color: #ccc;
        padding: 5px;
        text-align: center;
        background: #eee;
        border: none;
        border-top: 1px solid #ccc;
    }

    .fieldset {
        margin-top: 5px;
    }

    .fieldset legend {
        display: block;
        width: 100%;
        padding: 0;
        font-size: 15px;
        line-height: inherit;
        color: #797979;
        border: 0;
        border-bottom: 1px solid #e5e5e5;
    }

    .info {
        float: right;
    }
</style>

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
                <form action="{{ route('teacher.store') }}" id="company-form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">



                        <div class="row">

                            <div class="col-md-4 mt-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required="">
                            </div>

                            {{-- <div class="col-3 mt-3"> --}}
                            <div class="col-md-4 mt-3">
                                <label for="gender">Gender</label>
                                <select class="form-control" name="gender" required>
                                    {{-- <option>Select Gender</option> --}}
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                </select>
                            </div>

                            {{-- <div class="col-md-4 mt-3">
                                <label for="gender">Gender</label>
                                @if($teacher->gender == 0)
                                    <span> Male </span>
                                @else
                                    <span> Female </span>
                            </div> --}}

                            <div class="col-md-4 mt-3">
                                <div class="form-group form-group-login">
                                    <table style="margin: 0 auto;">
                                        <thead>
                                            <tr class="info">
                                                {{-- @foreach ($teachers as $teacher)
                                                <th class="student-id">{{ sprintf('%05d', $teacher->id + 1) }}</th>
                                                @endforeach --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="image">
                                                    {{-- <img class="img-responsive" src="{{ asset('uploads/teacher/' ) }}" style="height: 80px; width: 80px" alt=""> --}}
                                                    {!! Html::image('image/example.png', null, ['class' => 'teacher-image', 'id' => 'showImage']) !!}
                                                    <input type="file" name="image" id="image"
                                                        accept="image/x-png, image/png, image/jpg, image/jpeg"/>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; background: #ddd">
                                                    <input type="button" name="image" id="browse_file"
                                                        class="form-control btn-browse" value="Browse"/>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-5 mt-3">
                                <label for="email"> Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="col-md-3 mt-3">
                                <label for="dob">Date Of Birth</label>
                                <input type="date" name="dob" id="dob" class="form-control" required>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="phone">Phone</label>
                                <input type="number" name="phone" id="phone" class="form-control" required>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="nationality">Nationality</label>
                                <input type="text" name="nationality" id="nationality" class="form-control" required>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="passport">Passport</label>
                                <input type="text" name="passport" id="passport" class="form-control" required>
                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="dateregistered">Date Registered</label>
                                <input type="date" name="dateregistered" id="dateregistered" class="form-control" required>
                            </div>

                            <div class="col-md-12 mt-3">
                                <label for="address">Address</label>
                                <textarea class="form-control" name="address" id="address" rows="4" required></textarea>
                            </div>

                        </div>

                            {{-- <div class="col-lg-3 col-md-3 col-sm-3">
                                <div class="form-group form-group-login">
                                    <table style="margin:0 auto;">
                                        <thead>
                                            <tr class="info">
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="image">
                                                    {!! Html::image('teacher_images/profile.jpg',
                                                    null, ['class' => 'teacher-image', 'id' => 'showImage']) !!}
                                                    <input type="file" name="image" id="image"
                                                    accept="image/x-png, image/png, image/jpg, image/jpeg">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="text-align: center; background:#ddd; ">
                                                    <input type="button" name="browse_file" id="browse_file"
                                                    class="form-control text-capitalize btn-choose"
                                                    class="btn btn-outline-danger" value="Choose">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> --}}

                            {{-- <div class="col-lg-3 col-md-3 col-sm-3" mt-3> --}}


                            {{-- <div class="col-3 mt-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" required>
                            </div> --}}
                            {{-- <div class="col-sm-3">
                                <p> @if ($students->status == 0)
                                        Single
                                    @else
                                        Married
                                    @endif
                                </p>
                            </div> --}}

                        <div class="col-md-4 mt-3">
                            <label for="status" class="control-label">Status</label>
                            <br/>
                            <input type="checkbox" name="status" id="enable" value="Single">
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
    });


    $('#browse_file').on('click', function () {
            $('#image').click();
        });

        $('#image').on('change', function (e) {
            showFile(this, '#showImage');
        });

        function showFile(fileInput, img, showName) {

            if(fileInput.files[0]) {

                var reader = new FileReader();
                reader.onload = function (e) {
                    $(img).attr('src', e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
            $(showName).text(fileInput.files[0].name);
        }
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

