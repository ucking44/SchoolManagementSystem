<?php

namespace App\Http\Controllers;

use App\ClassAssigning;
use App\ClassScheduling;
use App\Status;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    public function index()
    {
        //$classAssignings = ClassAssigning::all();
        $teacher = Teacher::get();
        //dd($teacher); die;

        $classSchedules = ClassScheduling::join('courses', 'courses.id', '=', 'class_schedulings.course_id')
           ->join('batches', 'batches.id', '=', 'class_schedulings.batch_id')
           ->join('classes', 'classes.id', '=', 'class_schedulings.class_id')
           ->join('days', 'days.id', '=', 'class_schedulings.day_id')
           ->join('levels', 'levels.id', '=', 'class_schedulings.level_id')
           ->join('semesters', 'semesters.id', '=', 'class_schedulings.semester_id')
           ->join('shifts', 'shifts.id', '=', 'class_schedulings.shift_id')
           ->join('times', 'times.id', '=', 'class_schedulings.time_id')
           ->join('classrooms', 'classrooms.id', '=', 'class_schedulings.classroom_id')
           ->get();
           //dd($classSchedules);

           $classAssignings = ClassAssigning::join('class_schedulings', 'class_schedulings.id', '=', 'class_assignings.class_schedule_id')
           ->join('teachers', 'teachers.id', '=', 'class_assignings.teacher_id')
           ->join('courses', 'courses.id', '=', 'class_schedulings.course_id')
           ->join('batches', 'batches.id', '=', 'class_schedulings.batch_id')
           ->join('classes', 'classes.id', '=', 'class_schedulings.class_id')
           ->join('days', 'days.id', '=', 'class_schedulings.day_id')
           ->join('levels', 'levels.id', '=', 'class_schedulings.level_id')
           ->join('semesters', 'semesters.id', '=', 'class_schedulings.semester_id')
           ->join('shifts', 'shifts.id', '=', 'class_schedulings.shift_id')
           ->join('times', 'times.id', '=', 'class_schedulings.time_id')
           ->join('classrooms', 'classrooms.id', '=', 'class_schedulings.classroom_id')
           ->simplePaginate(3);
           //dd($classAssignings);

        // return view('admin.classAssigning.index', compact('classSchedules', 'classAssignings', 'teacher'));
        return view('admin.classAssigning.index', compact('classSchedules', 'teacher'))->with('classAssignings', $classAssignings);
    }

    public function insert(Request $request)
    {
        //dd($request);
        // $this->validate($request, [
        //     'teacher_id' => 'required',
        // ]);

        $validator = Validator::make($request->all(), [
            'teacher_id' => 'required',
        ]);

        //dd($validator);

        if ($validator->fails())
        //if (!$validator)
        {
            return redirect()->route('classAssigning.index')->with('error', 'Teacher Can Not Be Empty!');
            //return Redirect::to('classAssigning')->with('error', 'Teacher Can Not Be Empty!');
        }

        //$input = $request->all();

        $teacher = new Status();
        $teacher->teacher_id = $request->teacher_id;
        $status_id = $teacher->save();
        if ($status_id != 0)
        {
            foreach ($request->multiclass as $key => $teach)
            {
                $data2 = array('teacher_id' => $request->teacher_id, 'class_schedule_id' => $request->multiclass [$key]);

                $checkExist = ClassAssigning::where('teacher_id', $request->teacher_id)
                                            ->where('class_schedule_id', $request->multiclass)
                                            ->first();
                if ($checkExist)
                {
                    return redirect(route('admin.classAssigning.index'))->with('error', 'Class Assigning For This Teacher Already Exist ooooo!');
                }
                ClassAssigning::insert($data2);
            }
        }

        return redirect()->route('classAssigning.index')->with('success', 'Class Assigning Generated Successfully!');

    }

    // public function classassign_validation()
    // {
    //     $rules = [
    //         'teacher_id' => 'required',
    //     ];
    // }
}

