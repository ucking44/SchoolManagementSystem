@php
    $date = date('d-m-Y');

    $monthly = date('F', strtotime($date));
    $year = date('Y', strtotime($date));
    $day = date('l', strtotime($date));
@endphp

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
            <b><b>
                @if(isset($students))

                @foreach ($students as $key => $item)
                    <tr>
                        <td>{{ $item->roll_no }}
                            <input type="hidden" id="roll_no" name="roll_no" value="{{ $item->roll_no }}">
                            <input type="hidden" id="teacher_id" name="teacher_id" value="{{ $item->teacher_id }}">
                            <input type="hidden" id="class_id" name="class_id" value="{{ $item->class_code }}">
                            <input type="hidden" id="semester_id" name="semester_id" value="{{ $item->semester_id }}">
                            <input type="hidden" id="course_id" name="course_id" value="{{ $item->course_id }}">
                            {{-- <input type="hidden" id="degree_id" name="degree_id" value="{{ $item->degree_id }}"> --}}
                            <input type="hidden" id="attendance_date" name="attendance_date" value="{{ $date }}">
                            <input type="hidden" id="month" name="month" value="{{ $monthly }}">
                            <input type="hidden" id="year" name="year" value="{{ $year }}">
                            <input type="hidden" id="day" name="day" value="{{ $day }}">
                        </td>
                        <td>
                            <input type="hidden" name="student_id[]" class="form-control atten" id="student_id" value="{{ $item->student_id }}" style="border: none;" readonly>
                            <label for="">{{ $item->student_firstname }} {{ $item->student_lastname }}</label>
                        </td>

                        <td align="center">
                            <div id="ck-button-present">
                                <label>
                                    <input type="checkbox" class="atten" id="attendance_status" style="cursor: pointer;" name="attendance_status[{{ $item->student_id }}]" value="present" / checked>
                                    <span>Present</span>
                                </label>
                            </div>
                        </td>

                        <td align="center">
                            <div id="ck-button-absent">
                                <label>
                                    <input type="checkbox" class="atten" id="attendance_status" style="cursor: pointer;" name="attendance_status[{{ $item->student_id }}]" value="absent" / checked>
                                    <span>Absent</span>
                                </label>
                            </div>
                        </td>

                        <td align="center">
                            <div id="ck-button-late">
                                <label>
                                    <input type="checkbox" class="atten" id="attendance_status" style="cursor: pointer;" name="attendance_status[{{ $item->student_id }}]" value="late" />
                                    <span>Late</span>
                                </label>
                            </div>
                        </td>

                        <td align="center">
                            <div id="ck-button-sick">
                                <label>
                                    <input type="checkbox" class="atten" id="attendance_status" style="cursor: pointer;" name="attendance_status[{{ $item->student_id }}]" value="sick" />
                                    <span>Sick</span>
                                </label>
                            </div>
                        </td>

                    </tr>

                @endforeach

                @endif

                </b>
            </b>
        </tbody>
    </table>
</div>
