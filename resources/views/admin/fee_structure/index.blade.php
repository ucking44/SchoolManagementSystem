@extends('layouts.backend.app')

@section('title', 'Fee Structure')

@section('content')

<div class="modal fade left" id="addFeeStructureModal" tabindexoursee="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-md modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ad</i>d New Fee Structure</h5>
                <button type="button" class="btn btn-warning float-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="needs-validation" novalidate="" action="{{ URL::to('/save-fee-structure') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="semester_name">Semester</label>
                            <select name="semester_name" class="form-control" required>
                                <option value="">Select Semester</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="course_name">Course</label>
                            <select name="course_name" class="form-control" required>
                                <option value="">Select Course</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level" class="form-control" required>
                                <option value="">Select Level</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="admissionFee">Admission Fee</label>
                            {!! Form::number('admissionFee', null, ['class' => 'form-control', 'placeholder' => 'Enter Admission Fee Here ....', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="semesterFee">Semester Code</label>
                            {!! Form::number('semesterFee', null, ['class' => 'form-control', 'placeholder' => 'Enter Semester Code Here ....', 'required']) !!}
                        </div>
                    </div>

                    {{-- <div class="col-md-12">
                        {!! Form::label('status', 'Status:') !!}
                        <label class="checkbox-inline">
                            {!! Form::hidden('status', 0) !!}
                            {!! Form::checkbox('status', '1', null) !!}
                        </label>
                    </div> --}}

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
            <h1>Fee Structure</h1>
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

            <a href="#" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addFeeStructureModal">Create Fee Structure</a>
            <br/>
            <br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Fee Structures</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Semester</th>
                                            <th>Course</th>
                                            <th>Level</th>
                                            <th>Admission Fee</th>
                                            <th>Semester Fee</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($feeStructures as $feeStructure)
                                            <tr>
                                                <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th>
                                                    <td>{{ $feeStructure->semester_name }}</td>
                                                    <td>{{ $feeStructure->course_name }}</td>
                                                    <td>{{ $feeStructure->level }}</td>
                                                    <td><span>&#8358;</span>{{ number_format($feeStructure->admissionFee, 2) }}</td>
                                                    <td><span>&#8358;</span>{{ number_format($feeStructure->semesterFee, 2) }}</td>
                                                    <td>
                                                        @if ($feeStructure->status == 'enable')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">In-active</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($feeStructure->status == 'enable')
                                                        <a href="{{ URL::to('/unactive_feestructure/' . $feeStructure->id)}}">
                                                            <span class="badge badge-primary">Inactive</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_feestructure/' . $feeStructure->id)}}">
                                                            <span class="badge badge-success">Active</span>
                                                        </a>
                                                        @endif

                                                            <a href="{{ URL::to('edit-fee-structure', $feeStructure->id)}}">
                                                                <span class="badge badge-info">Edit</span>
                                                            </a>

                                                        <form id="delete-form-{{ $feeStructure->id }}" method="POST" action="{{ url('delete-fee-structure', $feeStructure->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>

                                                        <a href="#" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $feeStructure->id }}').submit();
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
                    {{-- {{ $feeStructures->links() }} --}}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


