<?php

namespace App\Http\Controllers;

use App\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::simplePaginate(3);
        return view('admin.classroom.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.classroom.create');
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
            'classroom_name' => 'required',
            'classroom_code' => 'required',
            'classroom_description' => 'required',
        ]);

        $classroom = new Classroom();
        $classroom->classroom_name = $request->classroom_name;
        $classroom->classroom_code = $request->classroom_code;
        $classroom->classroom_description = $request->classroom_description;
        if(isset($request->status))
        {
            $classroom->status = 'enable';
        } else {
            $classroom->status = 'disable';
        }
        $classroom->save();
        return redirect()->route('classroom.index')->with('successMsg', 'Class Room Saved Successfully!');

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
        $classroom = Classroom::findOrFail($id);
        return view('admin.classroom.edit', compact('classroom'));
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
            'classroom_name' => 'required',
            'classroom_code' => 'required',
            'classroom_description' => 'required',
        ]);

        $classroom = Classroom::findOrFail($id);
        $classroom->classroom_name = $request->classroom_name;
        $classroom->classroom_code = $request->classroom_code;
        $classroom->classroom_description = $request->classroom_description;
        if(isset($request->status))
        {
            $classroom->status = 'enable';
        } else {
            $classroom->status = 'disable';
        }
        $classroom->save();
        return redirect()->route('classroom.index')->with('successMsg', 'Class Room Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();
        return redirect()->route('classroom.index')->with('successMsg', 'Class Room Deleted Successfully!');

    }
}

