<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Batch;
use App\ClassAssigning;
use App\Classroom;
use App\Course;
use App\Day;
use App\Level;
use App\Semester;
use App\Shift;
use App\Teacher;
use App\Time;
//use Barryvdh\DomPDF\PDF;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ClassAssigningController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $courses = Course::all();
        $levels = Level::all();
        $shifts = Shift::all();
        $classes = Classes::all();
        $classrooms = Classroom::all();
        $batches = Batch::all();
        $days = Day::all();
        $times = Time::all();
        $semesters = Semester::all();

        $classAssignings = DB::table('class_assignings')
                                ->join('teachers', 'class_assignings.teacher_id', '=', 'teachers.id')
                                ->join('class_schedulings', 'class_assignings.class_schedule_id', '=', 'class_schedulings.id')
                                ->join('courses', 'class_schedulings.course_id', '=', 'courses.id')
                                ->join('batches', 'class_schedulings.batch_id', '=', 'batches.id')
                                ->join('classes', 'class_schedulings.class_id', '=', 'classes.id')
                                ->join('days', 'class_schedulings.day_id', '=', 'days.id')
                                ->join('levels', 'class_schedulings.level_id', '=', 'levels.id')
                                ->join('semesters', 'class_schedulings.semester_id', '=', 'semesters.id')
                                ->join('shifts', 'class_schedulings.shift_id', '=', 'shifts.id')
                                ->join('times', 'class_schedulings.time_id', '=', 'times.id')
                                ->join('classrooms', 'class_schedulings.classroom_id', '=', 'classrooms.id')
                                ->select('class_assignings.*', 'teachers.first_name',
                                'semesters.semester_name', 'courses.course_name', 'classes.class_name',
                                'batches.batch', 'days.day_name', 'levels.level', 'shifts.shift',
                                'times.time', 'classrooms.classroom_name')
                                ->simplePaginate(7);
        return view('admin.classAssigning.index', compact('classAssignings', 'teachers', 'courses', 'levels', 'shifts', 'classes', 'classrooms', 'batches', 'days', 'times', 'semesters'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        //$teachers = DB::table('teachers')->where('name', Auth::user()->id)->get();
        $courses = Course::all();
        $levels = Level::all();
        $shifts = Shift::all();
        $classes = Classes::all();
        $classrooms = Classroom::all();
        $batches = Batch::all();
        $days = Day::all();
        $times = Time::all();
        $semesters = Semester::all();
        return view('admin.classAssigning.create', compact('courses', 'levels', 'teachers', 'shifts', 'classes', 'classrooms', 'batches', 'days', 'times', 'semesters'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'course_name' => 'required',
            'semester_name' => 'required',
            'time' => 'required',
        ]);

        $classAssigning = new ClassAssigning();
        $classAssigning->teacher_id = $request->first_name;
        $classAssigning->class_schedule_id = $request->course_name;
        $classAssigning->class_schedule_id = $request->semester_name;
        //$classAssigning->class_schedule_id = $request->time;
        if(isset($request->status))
        {
            $classAssigning->status = 'enable';
        } else {
            $classAssigning->status = 'disable';
        }

        $classAssigning->save();
        return Redirect::back()->with('success', 'Your Data Has Been Saved Successfully !!!');

    }

    public function unactive_classAssigning($id)
    {
        $unactive_classAssigning = ClassAssigning::findOrFail($id);
        $unactive_classAssigning->update(['status' => 'Married']);
        return Redirect::back()->with('successMsg', 'Class Assigning Un-activated Successfully ):');
        // return Redirect::to('/classAssigning.index')->with('successMsg', 'Class Assigning Un-activated Successfully ):');
    }

    public function active_classAssigning($id)
    {
        $active_classAssigning = ClassAssigning::findOrFail($id);
        $active_classAssigning->update(['status' => 'Single']);
        return Redirect::back()->with('successMsg', 'Class Assigning Activated Successfully ):');
        // return Redirect::to('/classAssigning.index')->with('successMsg', 'Class Assigning Activated Successfully ):');
    }

    public function pdfGenerator(Request $request)
    {
        $classAssignings = DB::table('class_assignings')
                                ->join('teachers', 'class_assignings.teacher_id', '=', 'teachers.id')
                                ->join('class_schedulings', 'class_assignings.class_schedule_id', '=', 'class_schedulings.id')
                                ->join('courses', 'class_schedulings.course_id', '=', 'courses.id')
                                ->join('batches', 'class_schedulings.batch_id', '=', 'batches.id')
                                ->join('classes', 'class_schedulings.class_id', '=', 'classes.id')
                                ->join('days', 'class_schedulings.day_id', '=', 'days.id')
                                ->join('levels', 'class_schedulings.level_id', '=', 'levels.id')
                                ->join('semesters', 'class_schedulings.semester_id', '=', 'semesters.id')
                                ->join('shifts', 'class_schedulings.shift_id', '=', 'shifts.id')
                                ->join('times', 'class_schedulings.time_id', '=', 'times.id')
                                ->join('classrooms', 'class_schedulings.classroom_id', '=', 'classrooms.id')
                                ->get();

        $dompdf = PDF::loadview('admin.classAssigning.pdf', ['classAssignings' => $classAssignings]);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->stream();

        return $dompdf->download('Class_Assignings_Table.pdf');
    }

}

