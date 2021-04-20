<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::simplePaginate(4);
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.course.create');
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
            'course_code' => 'required',
            'description' => 'required',
        ]);

        $course = new Course();
        $course->course_name = $request->course_name;
        $course->course_code = $request->course_code;
        $course->description = $request->description;

        if(isset($request->course_status))
        {
            $course->course_status = 'enable';
        } else {
            $course->course_status = 'disable';
        }
        $course->save();
        return redirect()->route('course.index')->with('successMsg', 'Course Saved Successfully!');

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
        $course = Course::findOrFail($id);
        return view('admin.course.edit', compact('course'));
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
            'course_name' => 'required',
            'course_code' => 'required',
            'description' => 'required',
        ]);

        $course = Course::findOrFail($id);
        $course->course_name = $request->course_name;
        $course->course_code = $request->course_code;
        $course->description = $request->description;

        if(isset($request->course_status))
        {
            $course->course_status = 'enable';
        } else {
            $course->course_status = 'disable';
        }
        $course->save();
        return redirect()->route('course.index')->with('successMsg', 'Course Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('course.index')->with('successMsg', 'Course Deleted Successfully!');
    }
}
