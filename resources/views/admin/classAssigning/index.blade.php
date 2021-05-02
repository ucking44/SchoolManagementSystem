@extends('layouts.backend.app')

@section('title', 'Class Assigning')

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
                    <h1 class="m-0 text-dark">Class Assigning</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Class Assigning</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('classAssigning.create') }}" class="btn btn-primary">Create Class Scheduling</a>
                    @include('layouts.flash-message')
                        <div class="card">
                            <div class="card-header card-header-primary">
                            <h4 class="card-title "><b>All Class Scheduling</b></h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                            </div>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form action="{{ URL::to('insert' ) }}" method="POST">
                                                @csrf
                                                <div class="col-md-12">
                                                    <input type="hidden" name="class_assign_id" id="">
                                                    <select name="teacher_id" id="" class="form-control" style="width: 50%; margin-top: 10px; float: right">
                                                    <option value="0" selected="true" disabled="true">Select Teacher</option>
                                                        @foreach ($teacher as $teach)
                                                            <option value="{{$teach->teacher_id}}">
                                                                {{$teach->name}}
                                                                {{-- {{$teach->last_name}} --}}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <br>


                                                <div class="clearfix"></div>
                                                <br/>

                                                <div class="card-body">
                                                    <div class="table-responsive">
                                                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                                                            <thead class=" text-primary">
                                                                <th>ID</th>
                                                                <th>Course Name</th>
                                                                <th>Level</th>
                                                                <th>Shift</th>
                                                                <th>Class Name</th>
                                                                <th>Class Room</th>
                                                                <th>Batch</th>
                                                                <th>Day</th>
                                                                <th>Time</th>
                                                                <th>Semester</th>
                                                                <th>Start Time</th>
                                                                <th>End Time</th>
                                                                {{-- <th>Status</th>
                                                                <th style="text-align: center">Actions</th> --}}
                                                            </thead>
                                                            <tbody>
                                                                @foreach($classSchedules as $classSchedule)
                                                                    <tr>
                                                                        <td><input type="checkbox" name="multiclass[]" value="{{$classSchedule->id}}"></td>
                                                                        {{-- <td>{{ $key + 1 }}</td> --}}
                                                                        <td>{{ $classSchedule->course_name }}</td>
                                                                        <td>{{ $classSchedule->level }}</td>
                                                                        <td>{{ $classSchedule->shift }}</td>
                                                                        <td>{{ $classSchedule->class_name }}</td>
                                                                        <td>{{ $classSchedule->classroom_name }}</td>
                                                                        <td>{{ $classSchedule->batch }}</td>
                                                                        <td>{{ $classSchedule->name }}</td>
                                                                        <td>{{ $classSchedule->time }}</td>
                                                                        <td>{{ $classSchedule->semester_name }}</td>
                                                                        <td>{{ date('d-m-Y', strtotime($classSchedule->start_date)) }}</td>
                                                                        <td>{{ date('d-m-Y', strtotime($classSchedule->end_date)) }}</td>
                                                                        {{-- <td>{{ $classSchedule->start_time }}</td>
                                                                        <td>{{ $classSchedule->end_time }}</td> --}}
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        {{-- <button type="button" class="btn btn-warning">Close</button> --}}
                                                        <button type="submit" class="btn btn-success float-right">Generate Class Assign</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                                        <thead class=" text-primary">
                                            <tr>
                                                {{-- <th>ID</th> --}}
                                                <th>Teacher</th>
                                                <th>Semester</th>
                                                <th>Course</th>
                                                <th>Details</th>
                                                <th style="text-align: center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($classAssignings as $classAssigning)
                                                <tr>
                                                    {{-- <td>{{ $key + 1 }}</td> --}}
                                                    <td class="col-md-2">{{ $classAssigning->name }}</td>
                                                    <td class="col-md-2">{{ $classAssigning->semester_name }}</td>
                                                    <td class="col-md-3">{{ $classAssigning->course_name }}</td>
                                                    <td>
                                                        {{ $classAssigning->level }} | {{ $classAssigning->time }}
                                                        {{ $classAssigning->name }} | {{ $classAssigning->class_name }}
                                                        {{ $classAssigning->shift }} | {{ $classAssigning->batch }}
                                                        {{ $classAssigning->classroom_name }}
                                                    </td>
                                                    <td style="text-align: center">
                                                        <a href="{{ route('classAssigning.show', [$classAssigning->id]) }}" target="_blank" class='btn btn-warning btn-xs'>
                                                            <span class="badge badge-warning">Show</span>
                                                        </a>
                                                        <a href="{{ route('classAssigning.edit', $classAssigning->id)}}">
                                                            <span class="badge badge-info" style="margin-right: 35px; margin-top: 35px;">Edit</span>
                                                        </a>

                                                        <form id="delete-form-{{ $classAssigning->id }}" method="POST" action="{{ route('classAssigning.destroy', $classAssigning->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <button style="margin-left: 35px; margin-bottom: 15px;" type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $classAssigning->id }}').submit();
                                                        }
                                                        else {
                                                            event.preventDefault();
                                                        }">
                                                        <span class="badge badge-danger">Delete</span>
                                                        {{-- <i class="material-icons">delete</i></button> --}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            {{-- {{ $prosStudents->links() }} --}}
                            </div>
                        </div>
                    </div>
            </div>
            {{ $classAssignings->links() }}
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
