@extends('layouts.backend.app')

@section('title', 'Class Assigning')

@section('content')

<div class="modal fade left" id="addClassAssigningModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-md modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ad</i>d New Class Assigning</h5>
                <button type="button" class="btn btn-warning float-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="needs-validation" novalidate="" action="{{ URL::to('classAssigning/store') }}" method="POST">
                @csrf

                <div class="modal-body">
                    {{-- <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" class="form-control"> --}}

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="first_name">Teacher</label>
                            <select name="first_name" class="form-control" required>
                                <option value="">Select Teacher</option>
                                @foreach ($teachers as $teach)
                                    <option value="{{$teach->id}}">
                                        {{$teach->first_name}}
                                    </option>
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
                            <label for="class_name">Class Name</label>
                            <select name="class_name" class="form-control" required>
                                <option value="">Select Class Name</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="classroom_name">Class Room</label>
                            <select name="classroom_name" class="form-control" required>
                                <option value="">Select Class Room</option>
                                @foreach($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">{{ $classroom->classroom_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="shift">Shift</label>
                            <select name="shift" class="form-control" required>
                                <option value="">Select Shift</option>
                                @foreach($shifts as $shift)
                                    <option value="{{ $shift->id }}">{{ $shift->shift }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="batch">Batch</label>
                            <select name="batch" class="form-control" required>
                                <option value="">Select Batch</option>
                                @foreach($batches as $batch)
                                    <option value="{{ $batch->id }}">{{ $batch->batch }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="day_name">Day</label>
                            <select name="day_name" class="form-control" required>
                                <option value="">Select Day</option>
                                @foreach($days as $day)
                                    <option value="{{ $day->id }}">{{ $day->day_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="time">Time</label>
                            <select name="time" class="form-control" required>
                                <option value="">Select Time</option>
                                @foreach($times as $time)
                                    <option value="{{ $time->id }}">{{ $time->time }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 mt-4">
                        <div class="form-group">
                            <label for="semester_name">Semester Name</label>
                            <select name="semester_name" class="form-control" required>
                                <option value="">Select Semester Name</option>
                                @foreach ($semesters as $semester)
                                    <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="start_time">Start Time</label>
                            {!! Form::time('start_time', null, ['class' => 'form-control', 'placeholder' => 'Enter Start Time Here', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="end_time">End Time</label>
                            {!! Form::time('end_time', null, ['class' => 'form-control', 'placeholder' => 'Enter End Time Here', 'required']) !!}
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
                        {!! Form::submit('Create Class Assigning', ['class' => 'btn btn-success']) !!}
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ---------------------------------------------------   EDIT MODAL FORM --------------------------------------------- --}}


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Class Assignings</h1>
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

            <a href="#" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addClassAssigningModal">Create Class Assigning</a>
            <br/>
            <br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Class Assigning</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Teacher</th>
                                            <th>Semester</th>
                                            <th>Course</th>
                                            <th style="text-align: center">Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($classAssignings as $classAssigning)
                                            <tr>
                                                <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th>
                                                {{-- <th class="text-center">
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all" name="status" {{ $academic->status == "enable" ? 'checked' : '' }}>
                                                    <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </th> --}}
                                                    <td>{{ $classAssigning->first_name }}</td>
                                                    <td>{{ $classAssigning->last_name }}</td>
                                                    <td>{{ $classAssigning->semester_name }}</td>
                                                    <td>{{ $classAssigning->course_name }}</td>
                                                    <td>{{ $classAssigning->class_name }} | {{ $classAssigning->batch }} |
                                                        {{ $classAssigning->day_name }} | {{ $classAssigning->level }} |
                                                        {{ $classAssigning->shift }} | {{ $classAssigning->time }} |
                                                        {{ $classAssigning->classroom_name }}
                                                    </td>
                                                    <td>
                                                        @if ($classAssigning->status == 'enable')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">In-active</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($classAssigning->status == 'enable')
                                                        <a href="{{ URL::to('/unactive_classAssigning/' . $classAssigning->id)}}">
                                                            <span class="badge badge-primary">Inactive</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_classAssigning/' . $classAssigning->id)}}">
                                                            <span class="badge badge-success">Active</span>
                                                        </a>
                                                        @endif

                                                            <a href="{{ route('classAssigning.edit', $classAssigning->id)}}">
                                                                <span class="badge badge-info">Edit</span>
                                                            </a>

                                                        <form id="delete-form-{{ $classAssigning->id }}" method="POST" action="{{ route('classAssigning.destroy', $classAssigning->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>

                                                        <a href="#" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $classAssigning->id }}').submit();
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
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


{{--<div class="modal-body">
    <div class="col-md-12">
    <div class="form-group">
        <select name="semester_name" id="semester_id" class="form-control">
            <option value="">Select Semester</option>
            @foreach ($semesters as $semester)
                <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <select name="course_name" id="course_id" class="form-control">
            <option value="">Select Course</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <select name="level" id="level_id" class="form-control">
            <option value="">Select Level</option>
            @foreach ($levels as $level)
                <option value="{{ $level->id }}">{{ $level->level }}</option>
            @endforeach
        </select>
    </div>
</div> --}}


{{-- <div class="col-md-12">
    <div class="form-group"> --}}
        {{-- <span class="input-group-addon">Day</span><br/> --}}
        {{-- <label for="faculty_name">Faculty Name</label> --}}
        {{-- {!! Form::label('fee', 'Fee:') !!} --}}

        {{-- {!! Form::number('admissionFee', null, ['class' => 'form-control', 'placeholder' => 'Enter Admission Fee Here']) !!}
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        {!! Form::number('semesterFee', null, ['class' => 'form-control', 'placeholder' => 'Enter Semester Fee Here']) !!}
    </div>
</div> --}}

<!-- Submit Field -->
{{-- <div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="#" class="btn btn-default">Cancel</a>
</div> --}}

{{-- <div class="form-group col-sm-6">
    {!! Form::label('status', 'Status:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('status', 0) !!}
        {!! Form::checkbox('status', '1', null) !!}
    </label>
</div>

</div>
<div class="modal-footer">
<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
{!! Form::submit('Create Fee Structure', ['class' => 'btn btn-success']) !!}
</div> --}}
