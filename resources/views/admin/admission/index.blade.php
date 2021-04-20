@extends('layouts.backend.app')

@section('title', 'Admission')

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
                    <h1 class="m-0 text-dark">Admission</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Admission</li>
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
                    <a href="{{ route('admission.create') }}" class="btn btn-primary">Create Admission</a>
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
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>ProsStudent</th>
                                            <th>Class Name</th>
                                            <th>Gender</th>
                                            <th>Batch</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th style="text-align: center">Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach($admissions as $key => $admission)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $admission->first_name }}</td>
                                                    <td>{{ $admission->last_name }}</td>
                                                    <td>{{ $admission->prospective_student_id }}</td>
                                                    <td>{{ $admission->class->class_name }}</td>
                                                    <td>{{ $admission->gender }}</td>
                                                    <td>{{ $admission->batch_id }}</td>
                                                    <td>{{ $admission->phone }}</td>
                                                    <td>
                                                        <img class="img-responsive img-thumbnail" src="{{ asset('uploads/admission/' . $admission->image) }}" style="height: 80px; width: 80px" alt="">
                                                    </td>
                                                    <td>{{ $admission->email }}</td>
                                                    <td>
                                                        @if($admission->status == 'enable')
                                                            <span class="badge bg-blue">Enable</span>
                                                        @else
                                                            <span class="badge bg-pink">Disable</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        <a href="{{ route('admission.edit', $admission->id)}}">
                                                            <span class="badge badge-info" style="margin-right: 35px; margin-top: 35px;">Edit</span>
                                                        </a>

                                                        <form id="delete-form-{{ $admission->id }}" method="POST" action="{{ route('admission.destroy', $admission->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <button style="margin-left: 35px; margin-bottom: 15px;" type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $admission->id }}').submit();
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
            {{ $admissions->links() }}
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
