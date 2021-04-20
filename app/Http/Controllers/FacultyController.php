<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::simplePaginate(4);
        return view('admin.faculty.index', compact('faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculty.create');
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
            'faculty_name',
            'faculty_code',
            'faculty_description',
            'faculty_status',
        ]);

        $faculty = new Faculty();
        $faculty->faculty_name = $request->faculty_name;
        $faculty->faculty_code = $request->faculty_code;
        $faculty->faculty_description = $request->faculty_description;

        if(isset($request->faculty_status))
        {
            $faculty->faculty_status = 'enable';
        } else {
            $faculty->faculty_status = 'disable';
        }
        $faculty->save();
        return redirect()->route('faculty.index')->with('successMsg', 'Faculty Saved Successfully!');

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
        $faculty = Faculty::findOrFail($id);
        return view('admin.faculty.edit', compact('faculty'));
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
            'faculty_name',
            'faculty_code',
            'faculty_description',
            'faculty_status',
        ]);

        $faculty = Faculty::findOrFail($id);
        $faculty->faculty_name = $request->faculty_name;
        $faculty->faculty_code = $request->faculty_code;
        $faculty->faculty_description = $request->faculty_description;

        if(isset($request->faculty_status))
        {
            $faculty->faculty_status = 'enable';
        } else
        {
            $faculty->faculty_status = 'disable';
        }
        
        $faculty->save();
        return redirect()->route('faculty.index')->with('successMsg', 'Faculty Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->delete();
        return redirect()->route('faculty.index')->with('successMsg', 'Faculty Deleted Successfully!');

    }
}
