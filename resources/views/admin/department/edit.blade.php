@extends('layouts.backend.app')

@section('title', 'Department')

@section('content')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Department</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>

        <div class="section-body">
            <form class="needs-validation" novalidate="" action="{{ route('department.update', $department->id) }}" method="POST">
                @csrf
                @method('put')

                {{-- <div class="col-6 mt-4">
                    <label for="faculty_name">Faculty Name</label>
                    <select class="form-control" name="faculty_name">
                        @foreach($faculties as $faculty)
                            <option {{ $faculty->id == $department->faculty_id ? 'selected' : '' }} value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                        @endforeach
                    </select>
                </div> --}}

                <div class="card-body">
                    <label for="faculty_name"><b><h6>Faculty Name</h6></b></label>
                    <select class="form-control col-md-6" name="faculty_name">
                        @foreach($faculties as $faculty)
                            <option {{ $faculty->id == $department->faculty_id ? 'selected' : '' }} value="{{ $faculty->id }}">{{ $faculty->faculty_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b><h6>Department Name</h6></b></label>
                            <input type="text" name="department_name" id="inputEmail4" class="form-control" value="{{ $department->department_name }}">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b><h6>Department Code</h6></b></label>
                            <input type="text" name="department_code" id="inputEmail4" class="form-control" value="{{ $department->department_code }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="department_description"><b><h6>Description</h6></b></label>
                        <textarea class="form-control" name="department_description" rows="4">{{ $department->department_description }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{ route('department.index') }}" class="btn btn-warning">Back</a>
                            <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection


