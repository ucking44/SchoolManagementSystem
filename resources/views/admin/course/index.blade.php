@extends('layouts.backend.app')

@section('title', 'Course')

@section('content')

<div class="modal fade left" id="addCourseModal" tabindexoursee="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-md modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ad</i>d New Course</h5>
                <button type="button" class="btn btn-warning float-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="needs-validation" novalidate="" action="{{ route('course.store') }}" method="POST">
                @csrf

                <div class="modal-body">

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
                            <label for="course_name">Course Name</label>
                            {!! Form::text('course_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Course Name Here ....', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="course_code">Course Code</label>
                            {!! Form::text('course_code', null, ['class' => 'form-control', 'placeholder' => 'Enter Course Code Here ....', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="Enter Your Description Here ...." required=""></textarea>
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
            <h1>Course</h1>
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

            <a href="{{ route('course.create') }}" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addCourseModal">Create Course</a>
            <br/>
            <br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Course</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Course Name</th>
                                            <th>Course Code</th>
                                            <th>Description</th>
                                            <th style="text-align: center">Status</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($courses as $course)
                                            <tr>
                                                <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th>
                                                    <td>{{ $course->course_name }}</td>
                                                    <td>{{ $course->course_code }}</td>
                                                    <td>{{ $course->description }}</td>
                                                    <td>
                                                        @if ($course->status == 'enable')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">In-active</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($course->status == 'enable')
                                                        <a href="{{ URL::to('/unactive_course/' . $course->id)}}">
                                                            <span class="badge badge-primary">Inactive</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_course/' . $course->id)}}">
                                                            <span class="badge badge-success">Active</span>
                                                        </a>
                                                        @endif

                                                            <a href="{{ route('course.edit', $course->id)}}">
                                                                <span class="badge badge-info">Edit</span>
                                                            </a>

                                                        <form id="delete-form-{{ $course->id }}" method="POST" action="{{ route('course.destroy', $course->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>

                                                        <a href="#" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $course->id }}').submit();
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
                    {{-- {{ $courses->links() }} --}}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


