<?php

namespace App\Http\Controllers;

use App\Course;
use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::simplePaginate(4);
        //$courses = DB::table('courses')->where('id', 'course_name')->get();
        return view('admin.level.index', compact('levels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('admin.level.create', compact('courses'));
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
            //'course_name' => 'required',
            'level' => 'required',
            'level_description' => 'required',
        ]);

        $level = new Level();
        //$level->course_id = $request->course_name;
        $level->level = $request->level;
        $level->level_description = $request->level_description;
        if(isset($request->status))
        {
            $level->status = 'enable';
        } else {
            $level->status = 'disable';
        }

        $level->save();
        return redirect()->route('level.index')->with('successMsg', 'Level Saved Successfully!');

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
        $level = Level::findOrFail($id);
        return view('admin.level.edit', compact('courses', 'level'));
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
            //'course_name' => 'required',
            'level' => 'required',
            'level_description' => 'required',
        ]);

        $level = Level::findOrFail($id);
        //$level->course_id = $request->course_name;
        $level->level = $request->level;
        $level->level_description = $request->level_description;
        if(isset($request->status))
        {
            $level->status = 'enable';
        } else {
            $level->status = 'disable';
        }

        $level->save();
        return redirect()->route('level.index')->with('successMsg', 'Level Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();
        return redirect()->route('level.index')->with('successMsg', 'Level Deleted Successfully!');
    }

    public function unactive_level($id)
    {
        $unactive_level = Level::findOrFail($id);
        $unactive_level->update(['status' => 'disable']);
        return Redirect::back()->with('successMsg', 'Level Un-activated Successfully ):');
        // return Redirect::to('/level.index')->with('successMsg', 'Level Un-activated Successfully ):');
    }

    public function active_level($id)
    {
        $active_level = Level::findOrFail($id);
        $active_level->update(['status' => 'enable']);
        return Redirect::back()->with('successMsg', 'Level Activated Successfully ):');
        // return Redirect::to('/level.index')->with('successMsg', 'Level Activated Successfully ):');
    }

}
