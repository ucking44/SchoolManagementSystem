@extends('layouts.backend.app')

@section('title', 'Day')

@section('content')


<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Update Day</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item"><a href="#">Modules</a></div>
                <div class="breadcrumb-item">Uc King</div>
            </div>
        </div>

        <div class="section-body">
            <form class="needs-validation" novalidate="" action="{{ route('day.update', $day->id) }}" method="POST">
                @csrf
                @method('put')

                <div class="card-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><b><h6>Name</h6></b></label>
                            <input type="text" name="day_name" id="inputEmail4" class="form-control" value="{{ $day->day_name }}">
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-6 text-left">
                            <a href="{{ route('day.index') }}" class="btn btn-warning">Back</a>
                            <button style="float: right" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>

@endsection


