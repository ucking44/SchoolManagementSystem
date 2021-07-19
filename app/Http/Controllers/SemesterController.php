<?php

namespace App\Http\Controllers;

use App\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::simplePaginate(3);
        return view('admin.semester.index', compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.semester.create');
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
            'semester_name' => 'required',
            'semester_code' => 'required',
            'semester_duration' => 'required',
            'description' => 'required',
        ]);

        $semester = new Semester();
        $semester->semester_name = $request->semester_name;
        $semester->semester_code = $request->semester_code;
        $semester->semester_duration = $request->semester_duration;
        $semester->description = $request->description;
        if(isset($request->status))
        {
            $semester->status = 'enable';
        } else {
            $semester->status = 'disable';
        }

        $semester->save();
        return redirect()->route('semester.index')->with('successMsg', 'Semester Saved Successfully!');

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
        $semester = Semester::findOrFail($id);
        return view('admin.semester.edit', compact('semester'));
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
            'semester_name' => 'required',
            'semester_code' => 'required',
            'semester_duration' => 'required',
            'description' => 'required',
        ]);

        $semester = Semester::findOrFail($id);
        $semester->semester_name = $request->semester_name;
        $semester->semester_code = $request->semester_code;
        $semester->semester_duration = $request->semester_duration;
        $semester->description = $request->description;
        if(isset($request->status))
        {
            $semester->status = 'enable';
        } else {
            $semester->status = 'disable';
        }

        $semester->save();
        return redirect()->route('semester.index')->with('successMsg', 'Semester Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semester = Semester::findOrFail($id);
        $semester->delete();
        return redirect()->route('semester.index')->with('successMsg', 'Semester Deleted Successfully!');
    }

    public function unactive_semester($id)
    {
        $unactive_semester = Semester::findOrFail($id);
        $unactive_semester->update(['status' => 'disable']);
        return Redirect::back()->with('successMsg', 'Semester Un-activated Successfully ):');
        // return Redirect::to('/semester.index')->with('successMsg', 'Semester Un-activated Successfully ):');
    }

    public function active_semester($id)
    {
        $active_semester = Semester::findOrFail($id);
        $active_semester->update(['status' => 'enable']);
        return Redirect::back()->with('successMsg', 'Semester Activated Successfully ):');
        // return Redirect::to('/semester.index')->with('successMsg', 'Semester Activated Successfully ):');
    }

}
