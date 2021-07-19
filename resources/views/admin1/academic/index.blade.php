@extends('layouts.backend.app')

@section('title', 'Academic')

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
                    <h1 class="m-0 text-dark">Academic Year</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Academic Year</li>
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
                    <a href="{{ route('academic.create') }}" class="btn btn-primary">Create Academic Year</a>
                    @include('layouts.backend.partials.msg')
                        <div class="card">
                            <div class="card-header card-header-primary">
                            <h4 class="card-title "><b>All Prospective Students</b></h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                                        <thead class=" text-primary">
                                            <th>ID</th>
                                            <th>Academic Year</th>
                                            <th style="text-align: center">Edit</th>
                                            <th style="text-align: center">Delete</th>
                                        </thead>
                                        <tbody>
                                            @foreach($academics as $key => $academic)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $academic->academic_year }}</td>
                                                    <td>
                                                        @if ($academic->status == 'enable')
                                                            <span class="badge bg-green">Active</span>
                                                        @else
                                                            <span class="badge bg-pink">In-active</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($academic->status == 'enable')
                                                        <a href="{{ URL::to('/unactive_academic/' . $academic->id)}}">
                                                            <span class="badge badge-warning">Inactive</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_academic/' . $academic->id)}}">
                                                            <span class="badge badge-success">Active</span>
                                                        </a>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        <button class="btn btn-info btn-sm">
                                                            <a href="{{ route('academic.edit', $academic->id)}}">
                                                                <span class="badge badge-info">Edit</span>
                                                            </a>
                                                        </button>
                                                    </td>
                                                    <td style="text-align: center">
                                                        <form id="delete-form-{{ $academic->id }}" method="POST" action="{{ route('academic.destroy', $academic->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <button style="margin-left: 35px; margin-bottom: 15px;" type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $academic->id }}').submit();
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
            {{ $academics->links() }}
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
