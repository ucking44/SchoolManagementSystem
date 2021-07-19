<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\ClassScheduling;
use App\Exports\Teacher_Export;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;
//use Maatwebsite\Excel\Excel
use App\Imports\TeacherImport;
use App\Roll;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
//use Excel;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::simplePaginate(3);
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            //'user_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required | email',
            'dob' => 'required | date',
            'phone' => 'required | numeric',
            'address' => 'required',
            'country' => 'required',
            'passport' => 'required',
            'dateregistered' => 'required | date',
            'image' => 'required | file',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/teacher'))
            {
                mkdir('uploads/teacher', 0777, true);
            }
            //unlink('uploads/teacher/' . $teacher->image);
            $image->move('uploads/teacher', $imagename);
        }
        else {
            $imagename = 'default.png';
        }

        $teacher = new Teacher();
        //$teacher->user_id = $request->user_id;
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->dob = $request->dob;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->country = $request->country;
        $teacher->passport = $request->passport;
        $teacher->dateregistered = $request->dateregistered;
        $teacher->image = $imagename;

        if(isset($request->status))
        {
            $teacher->status = 'Single';
        } else {
            $teacher->status = 'Married';
        }
        $teacher->save();
        return redirect()->route('teacher.index')->with('successMsg', 'Teacher Saved Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            //'user_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required | email',
            'dob' => 'required | date',
            'phone' => 'required | numeric',
            'address' => 'required',
            'country' => 'required',
            'passport' => 'required',
            'dateregistered' => 'required | date',
            //'image' => 'required | file',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        $teacher = Teacher::findOrFail($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/teacher'))
            {
                mkdir('uploads/teacher', 0777, true);
            }
            //unlink('uploads/teacher/' . $teacher->image);
            $image->move('uploads/teacher', $imagename);
        }
        else {
            $imagename = 'default.png';
        }

        //$teacher->user_id = $request->user_id;
        $teacher->first_name = $request->first_name;
        $teacher->last_name = $request->last_name;
        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->dob = $request->dob;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->country = $request->country;
        $teacher->passport = $request->passport;
        $teacher->dateregistered = $request->dateregistered;
        $teacher->image = $imagename;

        if(isset($request->status))
        {
            $teacher->status = 'Single';
        } else {
            $teacher->status = 'Married';
        }
        $teacher->save();
        return redirect()->route('teacher.index')->with('successMsg', 'Teacher Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teacher.index')->with('successMsg', 'Teacher Deleted Successfully!');
    }

    public function unactive_teacher($id)
    {
        $unactive_teacher = Teacher::findOrFail($id);
        $unactive_teacher->update(['status' => 'Married']);
        return Redirect::back()->with('successMsg', 'Teacher Un-activated Successfully ):');
        // return Redirect::to('/teacher.index')->with('successMsg', 'Teacher Un-activated Successfully ):');
    }

    public function active_teacher($id)
    {
        $active_teacher = Teacher::findOrFail($id);
        $active_teacher->update(['status' => 'Single']);
        return Redirect::back()->with('successMsg', 'Teacher Activated Successfully ):');
        // return Redirect::to('/teacher.index')->with('successMsg', 'Teacher Activated Successfully ):');
    }

    public function pdfGenerator()
    {
        $teachers = Teacher::all();

        $dompdf = PDF::loadview('admin.teacher.pdf', ['teachers' => $teachers]);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->stream();

        return $dompdf->download('All_Teachers.pdf');
    }

    public function ExportExcel_xlsx()
    {
        return Excel::download(new Teacher_Export, 'Teachers.xlsx');
    }

    public function ExportExcel_xls()
    {
        return Excel::download(new Teacher_Export, 'Teachers.xls');
    }

    public function ExportExcel_csv()
    {
        return Excel::download(new Teacher_Export, 'Teachers.csv');
    }

    public function importExcel(Request $request)
    {
        //$data = $request->all();
        $this->validate($request, [
            'file' => 'required | file',
        ]);

        $file = $request->file('file');
        $file_name = rand() . $file->getClientOriginalName();
        $file->move('Teachers_Excel_Folder', $file_name);

        Excel::import(new TeacherImport, public_path('/Teachers_Excel_Folder/' . $file_name));
        return Redirect::back();
        //return Excel::download(new Teacher_Export, 'Teachers.csv');
    }

    public function printTeacher($id)
    {
        $teachers = Teacher::where('id', $id)->get();
        return view('admin.teacher.print', compact('teachers'));
        //return view('admin.teacher.print', ['teachers', $teachers]);
    }

    public function pdfTeacher($id)
    {
        $teachers = Teacher::where('id', $id)->get();

        $dompdf = PDF::loadview('admin.teacher.singlePdf', ['teachers' => $teachers]);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->stream();

        return $dompdf->download('Teacher.pdf');
    }

    public function InsertClassAttendance(Request $request)
    {
        $student = $request->all();

        $attend_date = $request->attendance_date;
        $attend_class = $request->class_id;
        $teacher_id = $request->teacher_id;

        $attendance_date = Attendance::join('classes', 'classes.class_code', '=', 'attendances.class_id')
                                      ->where('attendances.attendance_date', $attend_date)
                                      ->where('attendances.teacher_id', $teacher_id)
                                      ->where('attendances.class_id', $attend_class)
                                      ->first();

        if ($attendance_date)
        {
            return redirect()->back()->with('successMsg', 'Today Attendance Has Already Been Taken By This ' . $attend_date . ' and Class!');
        }
        else
        {
            foreach ($request->student_id as $key => $markattendance)
            {
                $insert_data[] =[
                    'student_id' => $markattendance,
                    'teacher_id' => $request->teacher_id,
                    'course_id' => $request->course_id,
                    'semester_id' => $request->semester_id,
                    'class_id' => $request->class_id,
                    'month' => $request->month,
                    'year' => $request->year,
                    'day' => $request->day,
                    'attendance_status' => $request->attendance_status[$markattendance],
                    'attendance_date' => $request->attendance_date,
                ];
            }

            Attendance::insert($insert_data);
            return redirect(url('attendance/list', $teacher_id))->with('successMsg', 'Attendance Marked Successfully !!!');

        }

    }

    public function TeacherEditAttendance(Request $request, $edit_date, $class_id, $semester_id, $teacher_id)
    {
        // $teacher_id = $request->teacher_id;
        // $input = $request->all();

        $edited_date = Attendance::join('classes', 'classes.class_code', '=', 'attendances.class_id')
                                 ->join('semesters', 'semesters.id', '=', 'attendances.semester_id')
                                 ->where('attendance_date', $edit_date)
                                 ->where('class_id', $class_id)
                                 ->where('semester_id', $semester_id)
                                 ->where('teacher_id', $teacher_id)
                                 ->first();

        $edit_attendances = Attendance::join('admissions', 'admissions.id', '=', 'attendances.student_id')
                                      ->join('classes', 'classes.class_code', '=', 'attendances.class_id')
                                      ->join('class_schedulings', 'class_schedulings.class_id', '=', 'admissions.class_id')
                                      ->join('teachers', 'teachers.id', '=', 'attendances.teacher_id')
                                      ->join('semesters', 'semesters.id', '=', 'attendances.semester_id')
                                      ->join('courses', 'courses.id', '=', 'attendances.course_id')
                                      ->join('rolls', 'rolls.roll_id', 'attendances.student_id')
                                      ->select('admissions.first_name as student_first_name',
                                               'admissions.last_name as student_last_name',
                                               'admissions.image',
                                               'teachers.first_name as teacher_first_name',
                                               'teachers.last_name as teacher_last_name',
                                               'rolls.username as roll_no',
                                               'courses.course_name',
                                               'semesters.semester_name',
                                               'semesters.id as semester_id',
                                               'attendances.attendance_date',
                                               'attendances.attendance_status',
                                               'attendances.attendance_id',
                                               'attendances.semester_id',
                                               'attendances.class_id',
                                               'classes.id as class_id',
                                               'classes.class_code',
                                               'classes.class_name')
                                      ->where('attendances.attendance_date', $edit_date)
                                      ->where('attendances.class_id', $class_id)
                                      ->where('attendances.semester_id', $semester_id)
                                      ->where('teachers.id', $teacher_id)
                                      ->get();

        $class_name = ClassScheduling::join('classes', 'classes.class_code', '=', 'class_schedulings.class_id')
                                     ->join('semesters', 'semesters.id', '=', 'class_schedulings.semester_id')
                                     //->join('degrees', 'degrees.id', '=', 'class_schedulings.semester_id')
                                     ->join('teachers', 'teachers.id', '=', 'class_schedulings.teacher_id')
                                     ->where('class_schedulings.teacher_id', $teacher_id)
                                     ->first();

        return view('admin.teacher.attendance.edit', compact('class_name'))
                  ->with('edit_attendances', $edit_attendances)
                  ->with('edited_date', $edited_date);
    }

    public function AttendanceList(Request $request, $teacher_id)
    {
        $class_id = $request->class_id;
        $course_id = $request->course_id;
        $semester_id = $request->semester_id;
        $department_id = $request->department_id;
        $teacher_id = $request->teacher_id;
        $attend_date = date('d-m-Y');

        $attendances = Attendance::join('admissions', 'admissions.id', '=', 'attendances.student_id')
                                 ->join('classes', 'classes.class_code', '=', 'attendances.class_id')
                                 ->join('class_schedulings', 'class_schedulings.class_id', '=', 'admissions.class_id')
                                 ->join('teachers', 'teachers.id', '=', 'attendances.teacher_id')
                                 ->join('semesters', 'semesters.id', '=', 'attendances.semester_id')
                                 ->join('courses', 'courses.id', '=', 'attendances.course_id')
                                 ->join('rolls', 'rolls.roll_id', '=', 'attendances.student_id')
                                 ->select('admissions.first_name as student_first_name',
                                          'admissions.last_name as student_last_name',
                                          'admissions.image',
                                          'teachers.first_name as teacher_first_name',
                                          'teachers.last_name as teacher_last_name',
                                          'rolls.username as roll_no',
                                          'courses.course_name',
                                          'semesters.semester_name',
                                          'semesters.id as semester_id',
                                          'attendances.attendance_date',
                                          'attendances.attendance_status',
                                          //'attendances.teacher_id',
                                          'classes.id as class_id',
                                          'classes.class_code as class_code',
                                          'classes.class_name')
                                ->where('attendances.attendance_date', $attend_date)
                                ->where('attendances.teacher_id', $teacher_id)
                                ->get();

        $class_name = ClassScheduling::join('classes', 'classes.class_code', '=', 'class_schedulings.class_id')
                                     ->join('semesters', 'semesters.id', '=', 'class_schedulings.semester_id')
                                     //->join('degrees', 'degrees.id', '=', 'class_schedulings.semester_id')
                                     ->join('teachers', 'teachers.id', '=', 'class_schedulings.teacher_id')
                                     ->where('class_schedulings.teacher_id', $teacher_id)
                                     ->first();

        $classes = ClassScheduling::join('classes', 'classes.class_code', '=', 'class_schedulings.class_id')
                                  ->where('class_schedulings.teacher_id', $teacher_id)
                                  ->orderBy('classes.id', 'ASC')
                                  ->get();

        $departments = ClassScheduling::join('departments', 'departments.id', '=', 'class_schedulings.department_id')
                                      ->where('class_schedulings.teacher_id', $teacher_id)
                                      ->orderBy('departments.id', 'ASC')
                                      ->get();

        $faculties = ClassScheduling::join('faculties', 'faculties.id', '=', 'class_schedulings.faculty_id')
                                    ->where('class_schedulings.teacher_id', $teacher_id)
                                    ->orderBy('faculties.id', 'ASC')
                                    ->get();

        $semesters = ClassScheduling::join('semesters', 'semesters.id', '=', 'class_schedulings.semester_id')
                                    //->join('degrees', 'degrees.id', '=', 'class_schedulings.semester_id')
                                    ->where('class_schedulings.teacher_id', $teacher_id)
                                    //->groupBy('semesters.id')
                                    ->orderBy('semesters.id', 'ASC')
                                    ->get();

        $courses = ClassScheduling::join('courses', 'courses.id', '=', 'class_schedulings.course_id')
                                  //->join('degrees', 'degrees.id', '=', 'class_schedulings.semester_id')
                                  ->where('class_schedulings.teacher_id', $teacher_id)
                                  ->orderBy('courses.id', 'ASC')
                                  ->get();

        $students = Roll::join('admissions', 'admissions.id', '=', 'rolls.student_id')
                        ->join('classes', 'classes.class_code', '=', 'admissions.class_id')
                        ->join('class_schedulings', 'class_schedulings.id', '=', 'admissions.class_id')
                        ->join('courses', 'courses.id', '=', 'class_schedulings.course_id')
                        ->join('teachers', 'teachers.id', '=', 'class_schedulings.teacher_id')
                        ->where('admissions.class_id', $class_id)
                        ->select('admissions.first_name as student_firstname',
                                 'admissions.last_name as student_lastname',
                                 'admissions.id as student_id',
                                 'teachers.first_name as teacher_firstname',
                                 'teachers.last_name as teacher_lastname',
                                 'teachers.id',
                                 'rolls.username as roll_no',
                                 'courses.course_name',
                                 'courses.id as course_id',
                                 'classes.id as class_id',
                                 'classes.class_code',
                                 'classes.class_name')
                        ->get();

        return view('admin.teacher.attendance.attendanceList', compact('classes', 'semesters', 'courses', 'departments', 'faculties', 'class_name', 'students'))->with('attendances', $attendances);

    }

    public function TeacherUpdateAttendance(Request $request)
    {
        // $student = $request->all();
        // $teacher_id = $request->get('teacher_id');
        // $attendance_date = $request->get('attendance_date');

        foreach ($request->attendance_id as $key => $id)
        {
            $update_data = [
                'attendance_status' => $request->attendance_status[$id],
                'edit_date' => $request->attendance_date
            ];

            $attendance = Attendance::where(['attendance_id' => $id, 'attendance_date' => $request->attendance_date])->first();
            $attendance->update($update_data);
        }

        return Redirect::back()->with('successMsg', 'Attendance Updated Successfully !!!');

    }

}

