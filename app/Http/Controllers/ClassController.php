<?php

namespace App\Http\Controllers;

use App\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classes::simplePaginate(4);
        return view('admin.class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.class.create');
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
            'class_name' => 'required',
            'class_code' => 'required',
        ]);

        $class = new Classes();
        $class->class_name = $request->class_name;
        $class->class_code = $request->class_code;
        $class->save();
        return redirect()->route('class.index')->with('successMsg', 'Class Saved Successfully!');
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
        $class = Classes::findOrFail($id);
        return view('admin.class.edit', compact('class'));
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
            'class_name' => 'required',
            'class_code' => 'required',
        ]);

        $class = Classes::findOrFail($id);
        $class->class_name = $request->class_name;
        $class->class_code = $request->class_code;
        $class->save();
        return redirect()->route('class.index')->with('successMsg', 'Class Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = Classes::findOrFail($id);
        $class->delete();
        return redirect()->route('class.index')->with('successMsg', 'Class Deleted Successfully!');
    }
}
