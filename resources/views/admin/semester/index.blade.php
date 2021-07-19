@extends('layouts.backend.app')

@section('title', 'Semester')

@section('content')

<div class="modal fade left" id="addSemesterModal" tabindexoursee="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-md modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ad</i>d New Semester</h5>
                <button type="button" class="btn btn-warning float-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="needs-validation" novalidate="" action="{{ route('semester.store') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="semester_name"><b><h6>Semester Name</h6></b></label>
                            {!! Form::text('semester_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Semester Name Here ....', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="semester_code"><b><h6>Semester Code</h6></b></label>
                            {!! Form::text('semester_code', null, ['class' => 'form-control', 'placeholder' => 'Enter Semester Code Here ....', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="semester_duration"><b><h6>Semester Duration</h6></b></label>
                            {!! Form::text('semester_duration', null, ['class' => 'form-control', 'placeholder' => 'Enter Semester Duration Here ....', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description"><b><h6>Description</h6></b></label>
                            <textarea class="form-control" name="description" rows="5" placeholder="Enter Your Description Here ...." required=""></textarea>
                        </div>
                    </div>

                    {{-- <div class="section-title mt-0">Status</div> --}}
                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="status" class="custom-control-input" id="customCheck1" value="enable">
                            <label class="custom-control-label" for="customCheck1"><b><h6>Status</h6></b></label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        {!! Form::submit('Create Semester', ['class' => 'btn btn-success']) !!}
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
            <h1>Semesters</h1>
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

            <a href="#" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addSemesterModal">Create Semester</a>
            <br/>
            <br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Semesters</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Semester Name</th>
                                            <th>Semester Code</th>
                                            <th>Semester Duration</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($semesters as $semester)
                                            <tr>
                                                <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th>
                                                    <td>{{ $semester->semester_name }}</td>
                                                    <td>{{ $semester->semester_code }}</td>
                                                    <td>{{ $semester->semester_duration }}</td>
                                                    <td>{{ $semester->description }}</td>
                                                    <td>
                                                        @if ($semester->status == 'enable')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">In-active</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($semester->status == 'enable')
                                                        <a href="{{ URL::to('/unactive_semester/' . $semester->id)}}">
                                                            <span class="badge badge-primary">Inactive</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_semester/' . $semester->id)}}">
                                                            <span class="badge badge-success">Active</span>
                                                        </a>
                                                        @endif

                                                            <a href="{{ route('semester.edit', $semester->id)}}">
                                                                <span class="badge badge-info">Edit</span>
                                                            </a>

                                                        <form id="delete-form-{{ $semester->id }}" method="POST" action="{{ route('semester.destroy', $semester->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>

                                                        <a href="#" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $semester->id }}').submit();
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
                    {{-- {{ $semesters->links() }} --}}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


