@extends('layouts.backend.app')

@section('title', 'Shift')

@section('content')

<div class="modal fade left" id="addShiftModal" tabindexoursee="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-md modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Ad</i>d New Shift</h5>
                <button type="button" class="btn btn-warning float-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form class="needs-validation" novalidate="" action="{{ route('shift.store') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="shift"><b><h6>Shift</h6></b></label>
                            {!! Form::text('shift', null, ['class' => 'form-control', 'placeholder' => 'Enter Shift Here ....', 'required']) !!}
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="status" class="custom-control-input" id="customCheck1" value="enable">
                            <label class="custom-control-label" for="customCheck1"><b><h6>Status</h6></b></label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        {!! Form::submit('Create Shift', ['class' => 'btn btn-success']) !!}
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
            <h1>Shift</h1>
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

            <a href="#" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#addShiftModal">Create Shift</a>
            <br/>
            <br/>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Shift</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped v_center" id="table-2">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Shift</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Status</th>
                                            <th style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($shifts as $shift)
                                            <tr>
                                                <th class="text-center">
                                                    <i class="fas fa-th"></i>
                                                </th>
                                                    <td>{{ $shift->shift }}</td>
                                                    <td>{{ $shift->created_at }}</td>
                                                    <td>{{ $shift->updated_at }}</td>
                                                    <td>
                                                        @if ($shift->status == 'enable')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">In-active</span>
                                                        @endif
                                                    </td>
                                                    <td style="text-align: center;">
                                                        @if ($shift->status == 'enable')
                                                        <a href="{{ URL::to('/unactive_shift/' . $shift->id)}}">
                                                            <span class="badge badge-primary">Inactive</span>
                                                        </a>
                                                        @else
                                                        <a href="{{ URL::to('/active_shift/' . $shift->id)}}">
                                                            <span class="badge badge-success">Active</span>
                                                        </a>
                                                        @endif

                                                            <a href="{{ route('shift.edit', $shift->id)}}">
                                                                <span class="badge badge-info">Edit</span>
                                                            </a>

                                                        <form id="delete-form-{{ $shift->id }}" method="POST" action="{{ route('shift.destroy', $shift->id) }}" style="display: none;">
                                                            @csrf
                                                            @method('delete')
                                                        </form>

                                                        <a href="#" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                            event.preventDefault();
                                                            document.getElementById('delete-form-{{ $shift->id }}').submit();
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
                    {{-- {{ $shifts->links() }} --}}
                </div>
            </div>
        </div>
    </section>
</div>

@endsection


