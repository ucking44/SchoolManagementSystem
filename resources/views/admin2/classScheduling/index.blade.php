@extends('layouts.backend.app')

@section('title', 'Class Scheduling')

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
                    <h1 class="m-0 text-dark">Class Scheduling</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Class Scheduling</li>
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
                <div class="btn btn-group" style="margin-top: 20px; float: left; margin-right: 25px;">
                    <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o" style="color: white"></i>PDF</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="munu" id="export-menu">
                        <li id="export-to-pdf">
                            <a href="{{ URL::to('pdf-download-class-schedule') }}" class="btn btn">Download PDF</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li id="import-to-pdf">
                            <a href="" class="btn btn">Import PDF</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <a href="{{ route('classScheduling.create') }}" class="btn btn-primary">Create Class Scheduling</a>
                    @include('layouts.backend.partials.msg')
                        <div class="card">
                            <div class="card-header card-header-primary">
                            <h4 class="card-title "><b>All Admission</b></h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                            </div>
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
                                            <th>Status</th>
                                            <th style="text-align: center">Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach($class_schedulings as $key => $class_scheduling)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $class_scheduling->course->course_name }}</td>
                                                    <td>{{ $class_scheduling->level->level }}</td>
                                                    <td>{{ $class_scheduling->shift->shift }}</td>
                                                    <td>{{ $class_scheduling->class->class_name }}</td>
                                                    <td>{{ $class_scheduling->classroom->classroom_name }}</td>
                                                    <td>{{ $class_scheduling->batch->batch }}</td>
                                                    <td>{{ $class_scheduling->day->day_name }}</td>
                                                    <td>{{ $class_scheduling->time->time }}</td>
                                                    <td>{{ $class_scheduling->semester->semester_name }}</td>
                                                    <td>{{ $class_scheduling->start_time }}</td>
                                                    <td>{{ $class_scheduling->end_time }}</td>
                                                    <td>
                                                        @if ($class_scheduling->status == 'enable')
                                                            <span class="badge bg-green">Active</span>
                                                        @else
                                                            <span class="badge bg-pink">In-active</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($class_scheduling->status == 'enable')
                                                        <a href="{{ URL::to('/unactive_class_scheduling/' . $class_scheduling->id)}}">
                                                            <span class="badge badge-warning">Inactive</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_class_scheduling/' . $class_scheduling->id)}}">
                                                            <span class="badge badge-success">Active</span>
                                                        </a>
                                                        @endif
                                                    </td>

                                                    {{-- <td>
                                                        @if($class_scheduling->status == 'enable')
                                                            <span class="badge bg-blue">Enable</span>
                                                        @else
                                                            <span class="badge bg-pink">Disable</span>
                                                        @endif
                                                    </td> --}}
                                                    <td style="text-align: center">
                                                        <a href="{{ route('classScheduling.edit', $class_scheduling->id)}}" class="btn btn-info btn-sm">
                                                            <span class="badge badge-info">Edit</span>
                                                        </a>

                                                        <form id="delete-form-{{ $class_scheduling->id }}" method="POST" action="{{ route('classScheduling.destroy', $class_scheduling->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $class_scheduling->id }}').submit();
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
            {{ $class_schedulings->links() }}
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
