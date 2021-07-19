<div class="box-body">
    @php
        $date = date('d-m-Y');
    @endphp

    <div class="panel-default">
        <div class="panel-heading">
            <div class="col-md-2 pull-right">
                <input type="text" name="class_name" id="class_name" class="form-control edit_atten" value="{{ $edited_date->class_name }}" disabled>
            </div>

            <div class="col-md-2 pull-right">
                <input type="text" name="semester_name" id="semester_name" class="form-control edit_atten" value="{{ $edited_date->semester_name }}" disabled>
            </div>

            <h3 style="font-weight: bold; text-transform: uppercase; text-align: left">
                <i class="fa fa-calendar"></i> Update Class<b style="color: red"> ATTENDANCE</b>
            </h3>

        </div>
        <form action="{{ url('teacher_update_attendance') }}" method="POST">
            @csrf
            <div class="panel-body">
                <div id="wait"></div>
                <div class="form-group">
                    <div class="col-md-6">
                        <?php
                            $date = date('d-m-Y');
                            $nameOfDay = date('l', strtotime($date));
                        echo "<h4 style='color: red; font-weight: bolder; text-transform: uppercase'>$nameOfDay <b style='color: black'>Attendance</b></h4> ";
                        ?>
                    </div>
                    <div class="col-md-2">
                        <input type="text" name="attendance_date" id="attendance_date" class="form-control" value="{{ $edited_date->attendance_date }}" disabled>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="student">
                    <thead>
                        <tr>
                            <th>Roll No.</th>
                            <th>Student Name</th>
                            <th>Present</th>
                            <th>Absent</th>
                            <th>Late</th>
                            <th>Sick</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($edit_attendances as $key => $item)
                            <tr>
                                <td>{{ $item->roll_no }}
                                    <input type="hidden" id="roll_no" name="roll_no" value="{{ $item->roll_no }}">
                                    <input type="hidden" id="teacher_id" name="teacher_id" value="{{ $item->teacher_id }}">
                                    <input type="hidden" id="class_id" name="class_id" value="{{ $item->class_id }}">
                                    <input type="hidden" id="course_id" name="course_id" value="{{ $item->course_id }}">
                                    <input type="hidden" id="attendance_date" name="attendance_date" value="{{ $date }}">
                                    <input type="hidden" id="edit_date" name="edit_date" value="{{ $date }}">
                                </td>
                                <td>
                                    <input type="hidden" name="attendance_id[]" class="form-control atten" id="attendance_id" value="{{ $item->attendance_id }}" style="border: none;" readonly>
                                    <label for=""> {{ $item->student_first_name }} {{ $item->student_last_name }}</label>
                                </td>

                                <td align="center">
                                    <div id="ck-button-present">
                                        <label>
                                            <input type="checkbox" class="atten" id="attendance_status" style="cursor: pointer;" name="attendance_status[{{ $item->attendance_id }}]" value="present" @if ($item->attendance_status == "present") checked @endif />
                                            <span>Present</span>
                                        </label>
                                    </div>
                                </td>

                                <td align="center">
                                    <div id="ck-button-absent">
                                        <label>
                                            <input type="checkbox" class="atten" id="attendance_status" style="cursor: pointer;" name="attendance_status[{{ $item->attendance_id }}]" value="absent" @if ($item->attendance_status == "absent") checked @endif />
                                            <span>Absent</span>
                                        </label>
                                    </div>
                                </td>

                                <td align="center">
                                    <div id="ck-button-late">
                                        <label>
                                            <input type="checkbox" class="atten" id="attendance_status" style="cursor: pointer;" name="attendance_status[{{ $item->attendance_id }}]" value="late" @if ($item->attendance_status == "late") checked @endif />
                                            <span>Late</span>
                                        </label>
                                    </div>
                                </td>

                                <td align="center">
                                    <div id="ck-button-sick">
                                        <label>
                                            <input type="checkbox" class="atten" id="attendance_status" style="cursor: pointer;" name="attendance_status[{{ $item->attendance_id }}]" value="sick" @if ($item->attendance_status == "sick") checked @endif />
                                            <span>Sick</span>
                                        </label>
                                    </div>
                                </td>

                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="btn bg-navy pull-right"><i class="fa fa-refresh"></i> Updaye Attendance</button>
        </form>
    </div>

</div>
