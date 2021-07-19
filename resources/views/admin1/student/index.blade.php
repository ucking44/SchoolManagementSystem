@extends('layouts.backend.app')

@section('title', 'Student')

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
                    <h1 class="m-0 text-dark">Student</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">Master</li>
                    <li class="breadcrumb-item active">Student</li>
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
                    <a href="{{ route('student.create') }}" class="btn btn-primary">Create Student</a>
                    @include('layouts.backend.partials.msg')
                        <div class="card">
                            <div class="card-header card-header-primary">
                            <h4 class="card-title "><b>All Students</b></h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                                        <thead class=" text-primary">
                                            <th>ID</th>
                                            <th>Admission</th>
                                            <th>Fullname</th>
                                            <th>Username</th>
                                            <th>Phone</th>
                                            <th>Image</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th style="text-align: center">Edit</th>
                                            <th style="text-align: center">Delete</th>
                                        </thead>
                                        <tbody>
                                            @foreach($students as $key => $student)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $student->first_name }}</td>
                                                    <td>{{ $student->fullname }}</td>
                                                    <td>{{ $student->username }}</td>
                                                    <td>{{ $student->phone }}</td>
                                                    <td>
                                                        <img class="img-responsive img-thumbnail" src="{{ asset('uploads/students/' . $student->image) }}" style="height: 80px; width: 80px" alt="default.png">
                                                    </td>
                                                    <td>{{ $student->email }}</td>
                                                    <td>
                                                        @if ($student->status == 'Single')
                                                            <span class="badge bg-green">Single</span>
                                                        @else
                                                            <span class="badge bg-pink">Married</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($student->status == 'Single')
                                                        <a href="{{ URL::to('/unactive_student/' . $student->id)}}">
                                                            <span class="badge badge-warning">Married</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_student/' . $student->id)}}">
                                                            <span class="badge badge-success">Single</span>
                                                        </a>
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        @if($student->status == 'enable')
                                                            <span class="badge bg-blue">Enable</span>
                                                        @else
                                                            <span class="badge bg-pink">Disable</span>
                                                        @endif
                                                    </td> --}}
                                                    <td>
                                                        <a href="{{ route('student.edit', $student->id)}}" target="_blank" class="btn btn-info btn-sm">
                                                            <span class="badge badge-info">Edit</span>
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <form id="delete-form-{{ $student->id }}" method="POST" action="{{ route('student.destroy', $student->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>
                                                        <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $student->id }}').submit();
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
            {{ $students->links() }}
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
