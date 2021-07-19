@extends('layouts.backend.app')

@section('title', 'Batch')

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
                    <h1 class="m-0 text-dark">Batch</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Batch</li>
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
                    <a href="{{ route('batch.create') }}" class="btn btn-primary">Create Batch</a>
                    @include('layouts.backend.partials.msg')
                        <div class="card">
                            <div class="card-header card-header-primary">
                            <h4 class="card-title "><b>All Batches</b></h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                                        <thead class=" text-primary">
                                            <th>ID</th>
                                            <th>Batch</th>
                                            <th style="text-align: center">Edit</th>
                                            <th style="text-align: center">Delete</th>
                                        </thead>
                                        <tbody>
                                            @foreach($batches as $key => $batch)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $batch->batch }}</td>
                                                    <td>
                                                        @if ($batch->status == 'enable')
                                                            <span class="badge bg-green">Active</span>
                                                        @else
                                                            <span class="badge bg-pink">In-active</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($batch->status == 'enable')
                                                        <a href="{{ URL::to('/unactive_batch/' . $batch->id)}}">
                                                            <span class="badge badge-warning">Inactive</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_batch/' . $batch->id)}}">
                                                            <span class="badge badge-success">Active</span>
                                                        </a>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        <button class="btn btn-info btn-sm"><a href="{{ route('batch.edit', $batch->id)}}">
                                                            <span class="badge badge-info">Edit</span>
                                                            {{-- <i class="halflings-icon white edit">edit</i> --}}
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
            {{ $batches->links() }}
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
