<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('asset/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.css') }}">
    <title>Password Reset</title>
</head>
<body>
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    {{-- <a href="{{ route('time.create') }}" class="btn btn-primary">Create Time</a> --}}
                    {{-- @include('layouts.backend.partials.msg') --}}
                    @include('layouts.flash-message')
                        <div class="card">
                            <div class="card-header card-header-primary">
                            <h4 class="card-title "><b>{{ $first_name }}</b></h4>
                            {{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="table" class="table table-striped table-bordered" style="width:100%">
                                        <thead class=" text-primary">
                                            <th>First Name</th>
                                            <th>Email</th>
                                            <th>Password Reset</th>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach($times as $key => $time) --}}
                                                <tr>
                                                    <td>{{ $first_name }}</td>
                                                    <td>{{ $email }}</td>
                                                    <td>{{ $password }}</td>
                                                </tr>
                                            {{-- @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                            {{-- {{ $prosStudents->links() }} --}}
                            </div>
                        </div>
                    </div>
            </div>
            {{-- {{ $times->links() }} --}}
        </div>
    </div>
    <!-- /.content -->

    <script src="{{ asset('asset/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('asset/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('asset/plugins/jquery-ui/jquery-ui.js') }}">

</body>
</html>

