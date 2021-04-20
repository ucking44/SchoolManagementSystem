@extends('layouts.backend.app')

@section('title', 'Teacher')

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
                    <h1 class="m-0 text-dark">Teacher</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Teacher</li>
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
                    <a href="{{ route('teacher.create') }}" class="btn btn-primary">Create Teacher</a>
                    @include('layouts.backend.partials.msg')
                        <div class="card">
                            <div class="card-header card-header-primary">
                            <h4 class="card-title "><b>All Teachers</b></h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                                        <thead class=" text-primary">
                                            <th>ID</th>
                                            <th>Name</th>
                                            {{-- <th>Gender</th> --}}
                                            <th>Email</th>
                                            <th>Phone</th>
                                            {{-- <th>Date Of Birth</th>
                                            <th>Address</th>
                                            <th>Nationality</th>
                                            <th>Passport</th> --}}
                                            <th>Image</th>
                                            {{-- <th>Date Registered</th> --}}
                                            <th>Status</th>
                                            <th style="text-align: center">Show</th>
                                            <th style="text-align: center">Edit</th>
                                            <th style="text-align: center">Delete</th>
                                        </thead>
                                        <tbody>
                                            @foreach($teachers as $key => $teacher)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $teacher->name }}</td>
                                                    {{-- <td>{{ $teacher->gender }}</td> --}}
                                                    <td>{{ $teacher->email }}</td>
                                                    <td>{{ $teacher->phone }}</td>
                                                    {{-- <td>{{ $teacher->dob }}</td>
                                                    <td>{{ $teacher->address }}</td>
                                                    <td>{{ $teacher->nationality }}</td>
                                                    <td>{{ $teacher->passport }}</td>
                                                    <td>{{ $teacher->dateregistered }}</td> --}}

                                                    <td>
                                                        <img class="img-responsive img-thumbnail" src="{{ asset('uploads/teacher/' . $teacher->image) }}" style="height: 80px; width: 80px" alt="">
                                                    </td>

                                                    <td>
                                                        @if($teacher->status == 'Single')
                                                            <span class="badge bg-blue">Single</span>
                                                        @else
                                                            <span class="badge bg-pink">Married</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center">
                                                        <a href="{{ route('teacher.show', [$teacher->id]) }}" target="_blank" class='btn btn-warning btn-xs'>
                                                            <span class="badge badge-warning">Show</span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('teacher.edit', $teacher->id)}}" target="_blank" class="btn btn-info btn-sm">
                                                            <span class="badge badge-info">Edit</span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form id="delete-form-{{ $teacher->id }}" method="POST" action="{{ route('teacher.destroy', $teacher->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $teacher->id }}').submit();
                                                        }
                                                        else {
                                                            event.preventDefault();
                                                        }">
                                                        {{-- <i class="glyphicon glyphicon-trash">delete</i> --}}
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
            {{ $teachers->links() }}
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
