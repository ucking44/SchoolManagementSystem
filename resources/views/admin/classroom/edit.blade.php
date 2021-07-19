@extends('layouts.backend.app')

@section('title', 'Class Room')

@section('content')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Class Room</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>

        <div class="section-body">
            <form class="needs-validation" novalidate="" action="{{ route('classroom.update', $classroom->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b><h6>Class Room Name</h6></b></label>
                            <input type="text" name="classroom_name" id="inputEmail4" class="form-control" value="{{ $classroom->classroom_name }}">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b><h6>Class Room Code</h6></b></label>
                            <input type="text" name="classroom_code" id="inputEmail4" class="form-control" value="{{ $classroom->classroom_code }}">
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="classroom_description"><b><h6>Description</h6></b></label>
                        <textarea class="form-control" name="classroom_description" rows="4" required="">{{ $classroom->classroom_description }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{ route('classroom.index') }}" class="btn btn-warning">Back</a>
                            <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection


