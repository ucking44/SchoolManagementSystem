@extends('layouts.backend.app')

@section('title', 'Fees')

@push('css')
   <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.css') }}">
@endpush

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Fee</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Fee</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="modal fade left" id="addFeeStructureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-lg modal-right" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Add New Fee</i></h5>
                    <button type="button" class="btn btn-warning float-right close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ URL::to('/save-fee-structure') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="semester_name" id="semester_id" class="form-control">
                                    <option value="">Select Semester</option>
                                    @foreach ($semesters as $semester)
                                        <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="course_name" id="course_id" class="form-control">
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <select name="level" id="level_id" class="form-control">
                                    <option value="">Select Level</option>
                                    @foreach ($levels as $level)
                                        <option value="{{ $level->id }}">{{ $level->level }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Name Field -->
                        <div class="col-md-12">
                            <div class="form-group">
                                {{-- <span class="input-group-addon">Day</span><br/> --}}
                                {{-- <label for="faculty_name">Faculty Name</label> --}}
                                {{-- {!! Form::label('fee', 'Fee:') !!} --}}

                                {!! Form::number('admissionFee', null, ['class' => 'form-control', 'placeholder' => 'Enter Admission Fee Here']) !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::number('semesterFee', null, ['class' => 'form-control', 'placeholder' => 'Enter Semester Fee Here']) !!}
                            </div>
                        </div>

                        <!-- Submit Field -->
                        {{-- <div class="form-group col-sm-12">
                            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                            <a href="#" class="btn btn-default">Cancel</a>
                        </div> --}}
                        <div class="form-group col-sm-6">
                            {!! Form::label('status', 'Status:') !!}
                            <label class="checkbox-inline">
                                {!! Form::hidden('status', 0) !!}
                                {!! Form::checkbox('status', '1', null) !!}
                            </label>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        {!! Form::submit('Create Fee Structure', ['class' => 'btn btn-success']) !!}
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- ---------------------------------------------------   EDIT MODAL FORM --------------------------------------------- --}}


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{-- <a href="{{ route('faculty.create') }}" class="btn btn-primary">Create Faculty</a> --}}
                    @include('layouts.backend.partials.msg')
                        <div class="card">
                            <section class="content-header">
                                {{-- <h1 class="pull-left"><i class="fa fa-sun-o" aria-hidden="true"> Fees</i></h1> --}}
                                <h1 class="pull-right">
                                   <a class="btn btn-warning float-right" style="margin-top: -10px;margin-bottom: 5px" data-toggle="modal" data-target="#addFeeStructureModal" ><i class="fa fa-sun-o" aria-hidden="true"> Add New Fee</i></a>
                                </h1>
                            </section>
                            <div class="card-header card-header-primary">
                                <div class="panel-heading">
                                    <h4 style="font-weight: bold; color: cyan;"><i class="fa fa-money"></i> STRUCTURE</h4>
                                </div>
                            {{-- <h4 class="card-title "><b>ALL FEE STRUCTURE</b></h4> --}}
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                            </div>
                            {{-- <h1 style="font-weight: bold">FEE STRUCTURE</h1> --}}
                            {{-- <div class="card-body"> --}}
                                <div class="table-responsive">
                                    <div class="panel-body">
                                        {{-- <div class="col-md-4">
                                            <input type="text" class="form-control">
                                        </div>

                                        <div class="col-md-4">
                                            <select name="" id="" class="form-control select_2_single">
                                                <option value=""></option>
                                            </select>
                                        </div>

                                        <div class="col-md-4">
                                            <select name="" id="" class="form-control select_2_single">
                                                <option value=""></option>
                                            </select>
                                        </div> --}}
                                    </div>
                                <div class="panel panel-default">
                                {{-- <div class="panel-heading">
                                    <h4 style="font-weight: bold; color: cyan;"><i class="fa fa-money"></i> STRUCTURE</h4>
                                </div> --}}
                                    <table id="table" class="table table-striped table-bordered table-hover" style="width:100%">
                                        <thead class=" text-primary">
                                            <tr>
                                                {{-- <th>ID</th> --}}
                                                <th>Semester</th>
                                                <th>Course</th>
                                                <th>Level</th>
                                                <th>Admission Fee</th>
                                                <th>Semester Fee</th>
                                                <th>Status</th>
                                                <th colspan="3"  style="text-align: center;">Action</th>
                                                {{-- <th style="text-align: center">Action</th> --}}
                                                {{-- <th style="text-align: center">Delete</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($feeStructures as $feeStructure)
                                                <tr>
                                                    {{-- <td>{{ $key + 1 }}</td> --}}
                                                    <td>{{ $feeStructure->semester_name }}</td>
                                                    <td>{{ $feeStructure->course_name }}</td>
                                                    <td>{{ $feeStructure->level }}</td>
                                                    <td><span>&#8358;</span>{{ number_format($feeStructure->admissionFee, 2) }}</td>
                                                    <td><span>&#8358;</span>{{ number_format($feeStructure->semesterFee, 2) }}</td>
                                                    <td>
                                                        @if ($feeStructure->status == 'enable')
                                                            <span class="badge bg-green">Active</span>
                                                        @else
                                                            <span class="badge bg-pink">In-active</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($feeStructure->status == 'enable')
                                                        <a href="{{ URL::to('/unactive_feestructure/' . $feeStructure->id)}}">
                                                            <span class="badge badge-warning">Inactive</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_feestructure/' . $feeStructure->id)}}">
                                                            <span class="badge badge-success">Active</span>
                                                        </a>
                                                        @endif
                                                        <a href="{{ URL::to('/edit-fee-structure/' . $feeStructure->id)}}">
                                                            <span class="badge badge-info">Edit</span>
                                                        </a>
                                                        <a href="{{ URL::to('/delete-fee-structure/' . $feeStructure->id)}}" id="delete">
                                                            <span class="badge badge-danger">Delete</span>
                                                        </a>
                                                    </td>
                                                    {{-- <td style="text-align: center">
                                                        <form id="delete-form-{{ $feeStructure->id }}" method="POST" action="{{ route('faculty.destroy', $feeStructure->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <button style="margin-left: 35px; margin-bottom: 15px;" type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $feeStructure->id }}').submit();
                                                        }
                                                        else {
                                                            event.preventDefault();
                                                        }">
                                                        <span class="badge badge-danger">Delete</span>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            {{ $feeStructures->links() }}
        </div>
    </div>
    <!-- /.content -->

@endsection

@push('js')
    <!-- DataTables -->
    <script src="{{ asset('asset/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.js') }}">


    <script>

        // $('#course_id').on('change', function(e) {
        //     var course_id = $(this).val();
        //     var level = $('#level_id')
        //         $(level).empty();
        //     $.get("{{ url('dynamicLevels') }}", {course_id:course_id}, function(data) {
        //         console.log(data);
        //         $.each(data, function(i, l) {
        //             $(level).append($('<option/>', {
        //                 value : l.level_id,
        //                 text : l.level
        //             }))
        //         })
        //     })
        // })

        $(function() {
            $('#startDate').datepicker({
                autoclose:true,
                dateFormat:'dd-mm-yy',
            });
            $('#endDate').datepicker({
                autoclose:true,
                dateFormat:'dd-mm-yy',
            });
        })
    </script>



@endpush
