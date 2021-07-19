@extends('layouts.backend.app')

@section('title', 'Faculty')

@section('content')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Faculty</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>

        <div class="section-body">
            <form class="needs-validation" novalidate="" action="{{ route('faculty.update', $faculty->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b><h6>Faculty Name</h6></b></label>
                            <input type="text" name="faculty_name" id="inputEmail4" class="form-control" value="{{ $faculty->faculty_name }}">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b><h6>Faculty Code</h6></b></label>
                            <input type="text" name="faculty_code" id="inputEmail4" class="form-control" value="{{ $faculty->faculty_code }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="faculty_description"><b><h6>Description</h6></b></label>
                        <textarea class="form-control" name="faculty_description" rows="5" required="">{{ $faculty->faculty_description }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{ route('faculty.index') }}" class="btn btn-warning">Back</a>
                            <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection


