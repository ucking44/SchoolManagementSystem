@extends('layouts.backend.app')

@section('title', 'Academic')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>DataTables</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">DataTables</h2>
            <p class="section-lead">We use 'DataTables' made by @SpryMedia. You can check the full documentation <a href="https://datatables.net/">here</a>.</p>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Academics</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </th>
                                            <th>ID</th>
                                            <th>Academic Year</th>
                                            <th style="text-align: center">Edit</th>
                                            <th style="text-align: center">Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="custom-checkbox custom-control">
                                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                                                </div>
                                            </td>
                                            <td>Create a mobile app</td>
                                            <td class="align-middle">
                                                <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                                <div class="progress-bar bg-success" data-width="100%"></div>
                                                </div>
                                            </td>
                                            <td>
                                                <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                                            </td>
                                            <td>2018-01-20</td>
                                            <td><div class="badge badge-success">Completed</div></td>
                                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                        </tr>
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


@extends('layouts.backend.app')

@section('title', 'Academic')

@section('content')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Academics</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">DataTables</div>
            </div>
        </div>

        <div class="section-body">

            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputEmail4">Email</label>
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" class="form-control">
                            <option selected>Choose...</option>
                            <option>...</option>
                        </select>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="inputZip">Zip</label>
                        <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-group mb-0">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-primary">Submit</button>
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
