<?php

namespace App\Http\Controllers;

use App\Batch;
use App\Course;
use App\Level;
use App\Shift;
use App\Classes;
use App\Classroom;
use App\ClassScheduling;
use App\Day;
use App\Semester;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
//use Barryvdh\DomPDF\PDF;
use PDF;

class ClassSchedulingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class_schedulings = ClassScheduling::simplePaginate(3);
        return view('admin.classScheduling.index', compact('class_schedulings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        $levels = Level::all();
        $shifts = Shift::all();
        $classes = Classes::all();
        $classrooms = Classroom::all();
        $batches = Batch::all();
        $days = Day::all();
        $times = Time::all();
        $semesters = Semester::all();
        return view('admin.classScheduling.create', compact('courses', 'levels', 'shifts', 'classes', 'classrooms', 'batches', 'days', 'times', 'semesters'));

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
            'course_name' => 'required',
            'level' => 'required',
            'shift' => 'required',
            'class_name' => 'required',
            'classroom_name' => 'required',
            'batch' => 'required',
            'day_name' => 'required',
            'time' => 'required',
            'semester_name' => 'required',
        ]);

        $class_scheduling = new ClassScheduling();
        $class_scheduling->course_id = $request->course_name;
        $class_scheduling->level_id = $request->level;
        $class_scheduling->shift_id = $request->shift;
        $class_scheduling->class_id = $request->class_name;
        $class_scheduling->classroom_id = $request->classroom_name;
        $class_scheduling->batch_id = $request->batch;
        $class_scheduling->day_id = $request->day_name;
        $class_scheduling->time_id = $request->time;
        $class_scheduling->semester_id = $request->semester_name;
        $class_scheduling->start_time = $request->start_time;
        $class_scheduling->end_time = $request->end_time;
        if(isset($request->status))
        {
            $class_scheduling->status = 'enable';
        } else {
            $class_scheduling->status = 'disable';
        }
        $class_scheduling->save();
        return redirect()->route('classScheduling.index')->with('successMsg', 'ClassScheduling Saved Successfully!');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::all();
        $levels = Level::all();
        $shifts = Shift::all();
        $classes = Classes::all();
        $classrooms = Classroom::all();
        $batches = Batch::all();
        $days = Day::all();
        $times = Time::all();
        $semesters = Semester::all();
        $class_scheduling = ClassScheduling::findOrFail($id);
        return view('admin.classScheduling.edit', compact('courses', 'levels', 'shifts', 'classes', 'classrooms', 'batches', 'days', 'times', 'semesters', 'class_scheduling'));

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
        // $this->validate($request, [
        //     'course_name' => 'required',
        //     'level' => 'required',
        //     'shift' => 'required',
        //     'class_name' => 'required',
        //     'classroom_name' => 'required',
        //     'batch' => 'required',
        //     'name' => 'required',
        //     'time' => 'required',
        //     'semester_name' => 'required',
        // ]);

        $class_scheduling = ClassScheduling::findOrFail($id);
        $class_scheduling->course_id = $request->course_name;
        $class_scheduling->level_id = $request->level;
        $class_scheduling->shift_id = $request->shift;
        $class_scheduling->class_id = $request->class_name;
        $class_scheduling->classroom_id = $request->classroom_name;
        $class_scheduling->batch_id = $request->batch;
        $class_scheduling->day_id = $request->day_name;
        $class_scheduling->time_id = $request->time;
        $class_scheduling->semester_id = $request->semester_name;
        $class_scheduling->start_time = $request->start_time;
        $class_scheduling->end_time = $request->end_time;
        if(isset($request->status))
        {
            $class_scheduling->status = 'enable';
        } else {
            $class_scheduling->status = 'disable';
        }
        $class_scheduling->save();
        return redirect()->route('classScheduling.index')->with('successMsg', 'ClassScheduling Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class_scheduling = ClassScheduling::findOrFail($id);
        $class_scheduling->delete();
        return redirect()->route('classScheduling.index')->with('successMsg', 'ClassScheduling Deleted Successfully!');

    }

    public function unactive_class_scheduling($id)
    {
        $unactive_class_scheduling = ClassScheduling::findOrFail($id);
        $unactive_class_scheduling->update(['status' => 'disable']);
        return Redirect::back()->with('successMsg', 'Class Scheduling Un-activated Successfully ):');
        // return Redirect::to('/class_scheduling.index')->with('successMsg', 'Class Scheduling Un-activated Successfully ):');
    }

    public function active_class_scheduling($id)
    {
        $active_class_scheduling = ClassScheduling::findOrFail($id);
        $active_class_scheduling->update(['status' => 'enable']);
        return Redirect::back()->with('successMsg', 'Class Scheduling Activated Successfully ):');
        // return Redirect::to('/class_scheduling.index')->with('successMsg', 'Class Scheduling Activated Successfully ):');
    }

    public function pdfGenerator(Request $request)
    {
        $class_schedulings = DB::table('class_schedulings')
                                //->join('teachers', 'class_assignings.teacher_id', '=', 'teachers.id')
                                //->join('class_schedulings', 'class_assignings.class_schedule_id', '=', 'class_schedulings.id')
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

        //$class_schedulings = ClassScheduling::simplePaginate(3);

        $dompdf = PDF::loadview('admin.classScheduling.pdf', ['class_schedulings' => $class_schedulings]);

        $dompdf->setPaper('A4', 'landscape');

        $dompdf->stream();

        return $dompdf->download('Class_Schedulings_Table.pdf');
        //return view('admin.classScheduling.index', compact('class_schedulings'));

    }

}
