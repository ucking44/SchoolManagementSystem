<?php

namespace App\Http\Controllers;

use App\Course;
use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::all();
        $courses = Course::simplePaginate(4);
        return view('admin.course.index', compact('levels', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        return view('admin.course.create', compact('levels'));
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
            'level' => 'required',
            'course_name' => 'required',
            'course_code' => 'required',
            'description' => 'required',
        ]);

        $course = new Course();
        $course->level_id = $request->level;
        $course->course_name = $request->course_name;
        $course->course_code = $request->course_code;
        $course->description = $request->description;

        if(isset($request->status))
        {
            $course->status = 'enable';
        } else {
            $course->status = 'disable';
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
        $levels = Level::all();
        $course = Course::findOrFail($id);
        return view('admin.course.edit', compact('levels', 'course'));
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

        if(isset($request->status))
        {
            $course->status = 'enable';
        } else {
            $course->status = 'disable';
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

    public function unactive_course($id)
    {
        $unactive_course = Course::findOrFail($id);
        $unactive_course->update(['status' => 'disable']);
        return Redirect::back()->with('successMsg', 'Course Un-activated Successfully ):');
        // return Redirect::to('/course.index')->with('successMsg', 'Course Un-activated Successfully ):');
    }

    public function active_course($id)
    {
        $active_course = Course::findOrFail($id);
        $active_course->update(['status' => 'enable']);
        return Redirect::back()->with('successMsg', 'Course Activated Successfully ):');
        // return Redirect::to('/course.index')->with('successMsg', 'Course Activated Successfully ):');
    }

}
