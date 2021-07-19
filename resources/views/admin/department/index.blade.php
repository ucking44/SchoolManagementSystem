@extends('layouts.backend.app')

@section('title', 'Department')

@section('content')

<div class="modal fade left" id="addDepartmentModal" tabindexoursee="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-md modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ad</i>d New Department</h5>
                <button type="button" class="btn btn-warning float-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="needs-validation" novalidate="" action="{{ route('department.store') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="faculty_name">Faculty Name</label>
                            <select name="faculty_name" class="form-control" required>
                                <option value="">Select Faculty</option>
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="department_name">Department Name</label>
                            {!! Form::text('department_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Department Name Here ....', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="department_code">Department Code</label>
                            {!! Form::text('department_code', null, ['class' => 'form-control', 'placeholder' => 'Enter Department Code Here ....', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="department_description">Description</label>
                            <textarea class="form-control" name="department_description" rows="5" placeholder="Enter Your Description Here ...." required=""></textarea>
                        </div>
                    </div>

                    {{-- <div class="section-title mt-0">Status</div> --}}
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="status" class="custom-control-input" id="customCheck1" value="enable">
                            <label class="custom-control-label" for="customCheck1">Status</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        {!! Form::submit('Create Course', ['class' => 'btn btn-success']) !!}
                    </div>

                    {{-- <div class="card-footer">
                        <div class="col-6 text-left">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div> --}}
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ---------------------------------------------------   EDIT MODAL FORM --------------------------------------------- --}}


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Departments</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>

        <div class="section-body">
            {{-- @include('layouts.flash-message') --}}
            {{-- <h2 class="section-title">DataTables</h2>
            <p class="section-lead">We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.</p> --}}

            <a href="#" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addDepartmentModal">Create Department</a>
            <br/>
            <br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Departments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Faculty Name</th>
                                            <th>Department Name</th>
                                            <th>Department Code</th>
                                            <th>Description</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($departments as $department)
                                            <tr>
                                                <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th>
                                                    <td>{{ $department->faculty->faculty_name }}</td>
                                                    <td>{{ $department->department_name }}</td>
                                                    <td>{{ $department->department_code }}</td>
                                                    <td>{{ $department->department_description }}</td>
                                                    <td>
                                                        @if ($department->status == 'enable')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">In-active</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($department->status == 'enable')
                                                        <a href="{{ URL::to('/unactive_department/' . $department->id)}}">
                                                            <span class="badge badge-primary">Inactive</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_department/' . $department->id)}}">
                                                            <span class="badge badge-success">Active</span>
                                                        </a>
                                                        @endif

                                                            <a href="{{ route('department.edit', $department->id)}}">
                                                                <span class="badge badge-info">Edit</span>
                                                            </a>

                                                        <form id="delete-form-{{ $department->id }}" method="POST" action="{{ route('department.destroy', $department->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>

                                                        <a href="#" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $department->id }}').submit();
                                                        }
                                                        else {
                                                            event.preventDefault();
                                                        }">
                                                            <span class="badge badge-danger">Delete</span>
                                                            {{-- <i class="badge badge-danger">delete</i> --}}
                                                        </a>
                                                    </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- {{ $departments->links() }} --}}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


