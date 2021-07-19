@extends('layouts.backend.app')

@section('title', 'Fees')

@section('content')

<div class="modal fade left" id="addFeeStructureModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-notify modal-md modal-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-sun-o" aria-hidden="true"> Add New Fee</i></h5>
                {{-- <button type="button" class="btn btn-warning float-right close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="tab-inn">
                <form>
                    <div class="row">
                        <div class="input-field col s6">
                            <input type="number" name="admissionFee" value="" class="validate" required>
                            <label class="">Admission Fee</label>
                        </div>
                        <div class="input-field col s6">
                            <input type="text" value="" name="semesterFee" class="validate" required>
                            <label class="">Semester Fee</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <select name="semester_name" id="semester_id" class="form-control">
                                <option value="" disabled selected>Select page Template</option>
                                @foreach ($semesters as $semester)
                                <option value="{{ $semester->id }}">{{ $semester->semester_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <select name="course_name" id="course_id" class="form-control">
                                <option value="" disabled selected>Select Status</option>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <select name="level" id="level_id" class="form-control">
                                <option value="" disabled selected>Select Status</option>
                                @foreach ($levels as $level)
                                    <option value="{{ $level->id }}">{{ $level->level }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <i class="waves-effect waves-light btn-large waves-input-wrapper" style=""><input type="submit" class="waves-button-input"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- ---------------------------------------------------   EDIT MODAL FORM --------------------------------------------- --}}


{{-- <div class="sb2-2-3"> --}}
    <div class="row">
        <section class="content-header">
            {{-- <h1 class="pull-left"><i class="fa fa-sun-o" aria-hidden="true"> Fees</i></h1> --}}
            <h1>
               <a class="btn btn-warning " style="margin-top: -6px; margin-bottom: 8px; margin-left: 845px" data-toggle="modal" data-target="#addFeeStructureModal" ><i class="fa fa-sun-o" aria-hidden="true"> Add New Fee</i></a>
            </h1>
        </section>
        <div class="col-md-12">
            <div class="box-inn-sp">
                <div class="inn-title">
                    <h4>Course Details</h4>
                    <p>All about courses, program structure, fees, best course lists (ranking), syllabus, teaching techniques and other details.</p>
                </div>
                <div class="tab-inn">
                    <div class="table-responsive table-desi">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Semester</th>
                                    <th>Course</th>
                                    <th>Level</th>
                                    <th>Admission Fee</th>
                                    <th>Semester Fee</th>
                                    <th>Status</th>
                                    <th colspan="3"  style="text-align: center;">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                    @foreach($feeStructures as $feeStructure)
                                        <tr>
                                            {{-- <td>{{ $key + 1 }}</td> --}}
                                            <td>{{ $feeStructure->semester_name }}</td>
                                            <td>{{ $feeStructure->course_name }}</td>
                                            <td>{{ $feeStructure->level }}</td>
                                            <td><span>&#8358;</span>{{ number_format($feeStructure->admissionFee, 2) }}</td>
                                            <td><span>&#8358;</span>{{ number_format($feeStructure->semesterFee, 2) }}</td>
                                            <td>
                                                @if ($feeStructure->status == 'enable')
                                                    <span class="badge bg-green">Active</span>
                                                @else
                                                    <span class="badge bg-pink">In-active</span>
                                                @endif
                                            </td>
                                            <td style="text-align: center;">
                                                @if ($feeStructure->status == 'enable')
                                                <a href="{{ URL::to('/unactive_feestructure/' . $feeStructure->id)}}">
                                                    <span class="badge badge-warning">Inactive</span>
                                                </a>
                                                @else
                                                <a href="{{ URL::to('/active_feestructure/' . $feeStructure->id)}}">
                                                    <span class="badge badge-success">Active</span>
                                                </a>
                                                @endif
                                                <a href="{{ URL::to('/edit-fee-structure/' . $feeStructure->id)}}">
                                                    <span class="badge badge-info">Edit</span>
                                                </a>
                                                <a href="{{ URL::to('/delete-fee-structure/' . $feeStructure->id)}}" id="delete">
                                                    <span class="badge badge-danger">Delete</span>
                                                </a>
                                            </td>
                                            {{-- <td style="text-align: center">
                                                <form id="delete-form-{{ $feeStructure->id }}" method="POST" action="{{ route('faculty.destroy', $feeStructure->id) }}" style="display: none;">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <button style="margin-left: 35px; margin-bottom: 15px;" type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure you want to delete this data?')) {
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $feeStructure->id }}').submit();
                                                }
                                                else {
                                                    event.preventDefault();
                                                }">
                                                <span class="badge badge-danger">Delete</span>
                                            </td> --}}
                                        </tr>
                                    @endforeach
                                    {{-- <td>
                                        <span class="label label-success">Active</span>
                                    </td>
                                    <td><a href="admin-course-details.html" class="ad-st-view">Edit</a></td> --}}

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
{{-- </div> --}}
{{-- <td><span class="list-img"><img src="images/course/sm-1.jpg" alt=""></span>
</td>
<td><a href="admin-course-details.html"><span class="list-enq-name">Aerospace Engineering</span><span class="list-enq-city">Illunois, United States</span></a>
</td> --}}

@endsection
