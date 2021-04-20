@extends('layouts.backend.app')

@section('title', 'Class')

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
                    <h1 class="m-0 text-dark">Class</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Class</li>
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
                    <a href="{{ route('class.create') }}" class="btn btn-primary">Create Class</a>
                    <div class="card-header">
                        <h5 class="m-0" id="heading">
                            @include('layouts.backend.partials.msg')
                        </h5>
                    </div>
                    {{-- @include('layouts.backend.partials.msg') --}}
                        <div class="card">
                            <div class="card-header card-header-primary">
                            <h4 class="card-title "><b>All Classes</b></h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                                        <thead class=" text-primary">
                                            <th>ID</th>
                                            <th>Class Name</th>
                                            <th>Class Code</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th style="text-align: center">Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach($classes as $key => $class)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $class->class_name }}</td>
                                                    <td>{{ $class->class_code }}</td>
                                                    <td>{{ $class->created_at }}</td>
                                                    <td>{{ $class->updated_at }}</td>
                                                    <td style="text-align: center">
                                                        <button class="btn btn-info btn-sm"><a href="{{ route('class.edit', $class->id)}}">
                                                            <span class="badge badge-info">Edit</span>
                                                            {{-- <i class="halflings-icon white edit">edit</i> --}}
                                                            </a>
                                                        </button>

                                                        <form id="delete-form-{{ $class->id }}" method="POST" action="{{ route('class.destroy', $class->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                                event.preventDefault();
                                                                document.getElementById('delete-form-{{ $class->id }}').submit();
                                                            }
                                                            else {
                                                                event.preventDefault();
                                                            }">
                                                            <span class="badge badge-danger">Delete</span>
                                                        </button>
                                                        {{-- <i class="material-icons">delete</i></button> --}}
                                                        {{-- <button class="btn btn-info btn-sm"><a href="">
                                                            <span class="badge badge-info">Show</span> --}}
                                                            {{-- <i class="halflings-icon white edit">edit</i> --}}
                                                            {{-- </a>
                                                        </button> --}}
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
            {{ $classes->links() }}
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
