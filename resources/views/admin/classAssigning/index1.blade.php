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
                <div class="btn btn-group" style="margin-top: 20px; float: left; margin-right: 25px;">
                    <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o" style="color: white"></i>PDF</button>
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu" role="munu" id="export-menu">
                        <li id="export-to-pdf">
                            <a href="{{ URL::to('pdf-download-class-assign') }}" class="btn btn">Download PDF</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li id="import-to-pdf">
                            <a href="" class="btn btn">Import PDF</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <a href="{{ URL::to('classAssigning/create') }}" class="btn btn-primary">Create Class Scheduling</a>
                    @include('layouts.flash-message')
                        <div class="card">
                            <div class="card-header card-header-primary">
                            <h4 class="card-title "><b>All Batches</b></h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}

                            </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="table" class="table table-striped table-bordered" style="width:100%">
                                            <thead class=" text-primary">
                                            {{-- <th>ID</th> --}}
                                            <th>Teacher</th>
                                            <th>Semester</th>
                                            <th>Course</th>
                                            <th style="text-align: center">Details</th>
                                            {{-- <th style="text-align: center">Edit</th>
                                            <th style="text-align: center">Delete</th> --}}
                                        </thead>
                                        <tbody>
                                            {{-- @foreach($classAssignings as $key => $classAssigning) --}}
                                            @foreach($classAssignings as $classAssigning)
                                                <tr>
                                                    {{-- <td>{{ $key + 1 }}</td> --}}
                                                    <td>{{ $classAssigning->first_name }}</td>
                                                    <td>{{ $classAssigning->last_name }}</td>
                                                    <td>{{ $classAssigning->semester_name }}</td>
                                                    <td>{{ $classAssigning->course_name }}</td>
                                                    <td>{{ $classAssigning->class_name }} | {{ $classAssigning->batch }} |
                                                        {{ $classAssigning->day_name }} | {{ $classAssigning->level }} |
                                                        {{ $classAssigning->shift }} | {{ $classAssigning->time }} |
                                                        {{ $classAssigning->classroom_name }}
                                                    </td>
                                                    <td>
                                                        @if ($classAssigning->status == 'Single')
                                                            <span class="badge bg-green">Single</span>
                                                        @else
                                                            <span class="badge bg-pink">Married</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($classAssigning->status == 'Single')
                                                        <a href="{{ URL::to('/unactive_classAssigning/' . $classAssigning->id)}}">
                                                            <span class="badge badge-warning">Married</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_classAssigning/' . $classAssigning->id)}}">
                                                            <span class="badge badge-success">Single</span>
                                                        </a>
                                                        @endif
                                                    </td>
                                                    {{-- <td style="text-align: center">
                                                        <button class="btn btn-info btn-sm"><a href="{{ route('batch.edit', $batch->id)}}">
                                                            <span class="badge badge-info">Edit</span>
                                                            <i class="halflings-icon white edit">edit</i>
                                                            </a>
                                                        </button>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <form id="delete-form-{{ $batch->id }}" method="POST" action="{{ route('batch.destroy', $batch->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <button style="margin-left: 35px; margin-bottom: 15px;" type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $batch->id }}').submit();
                                                        }
                                                        else {
                                                            event.preventDefault();
                                                        }">
                                                        <span class="badge badge-danger">Delete</span>
                                                        <i class="material-icons">delete</i></button>
                                                    </td> --}}
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
