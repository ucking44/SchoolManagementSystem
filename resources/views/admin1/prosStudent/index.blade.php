@extends('layouts.backend.app')

@section('title', 'Prospective Student')

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
                    <h1 class="m-0 text-dark">Prospective Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Prospective Student</li>
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
                    <a href="{{ route('prosstudent.create') }}" class="btn btn-primary">Create Prospective Student</a>
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
                                            <th>Fullname</th>
                                            <th>Address</th>
                                            <th>Gender</th>
                                            {{-- <th>Date Of Birth</th> --}}
                                            <th>Phone</th>
                                            <th>Image</th>
                                            {{-- <th>Local Govt. State Of Origin</th>
                                            <th>State Of Origin</th> --}}
                                            <th>Email</th>
                                            {{-- <th>Country</th> --}}
                                            <th>Status</th>
                                            <th style="text-align: center">Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach($prosStudents as $key => $prosStudent)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $prosStudent->fullname }}</td>
                                                    <td>{{ $prosStudent->address }}</td>
                                                    <td>{{ $prosStudent->gender }}</td>
                                                    {{-- <td><span>&#8358;</span>{{ number_format($prosStudent->product_price, 2) }}</td> --}}
                                                    {{-- <td>{{ $prosStudent->dob }}</td> --}}
                                                    <td>{{ $prosStudent->phone }}</td>
                                                    <td>
                                                        <img class="img-responsive img-thumbnail" src="{{ asset('uploads/images/' . $prosStudent->image) }}" style="height: 80px; width: 80px" alt="">
                                                    </td>
                                                    {{-- <td>{{ $prosStudent->localOfOrigin }}</td>
                                                    <td>{{ $prosStudent->stateOfOrigin }}</td> --}}
                                                    <td>{{ $prosStudent->email }}</td>
                                                    {{-- <td>{{ $prosStudent->country }}</td> --}}
                                                    <td>
                                                        @if($prosStudent->status == 'enable')
                                                            <span class="badge bg-blue">Enable</span>
                                                        @else
                                                            <span class="badge bg-pink">Disable</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('prosstudent.edit', $prosStudent->id)}}">
                                                            <span class="badge badge-info" style="margin-right: 35px; margin-top: 35px;">Edit</span>
                                                            {{-- <i class="halflings-icon white edit">edit</i> --}}
                                                        </a>

                                                        <form id="delete-form-{{ $prosStudent->id }}" method="POST" action="{{ route('prosstudent.destroy', $prosStudent->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <button style="margin-left: 35px; margin-bottom: 15px;" type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $prosStudent->id }}').submit();
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
            {{ $prosStudents->links() }}
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
