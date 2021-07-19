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
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>

        <div class="section-body">
            <form action="{{ route('academic.update', $academic->id) }}" method="POST">
                @csrf
                @method('put')
                {{-- <div class="card-body">
                    <div class="row">
                        <div class="col-4">
                            <label for="academic_year">Academic Year</label>
                            <input type="text" name="academic_year" id="academic_year" class="form-control" value="{{ $academic->academic_year }}">
                        </div>
                    </div>
                </div> --}}


                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Academic Year</label>
                            <input type="text" name="academic_year" id="inputEmail4" class="form-control" value="{{ $academic->academic_year }}">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{ route('academic.index') }}" class="btn btn-warning">Back</a>
                            <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
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
