<?php

namespace App\Http\Controllers;

use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
            'status',
        ]);

        $faculty = new Faculty();
        $faculty->faculty_name = $request->faculty_name;
        $faculty->faculty_code = $request->faculty_code;
        $faculty->faculty_description = $request->faculty_description;

        if(isset($request->status))
        {
            $faculty->status = 'enable';
        } else {
            $faculty->status = 'disable';
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
            'status',
        ]);

        $faculty = Faculty::findOrFail($id);
        $faculty->faculty_name = $request->faculty_name;
        $faculty->faculty_code = $request->faculty_code;
        $faculty->faculty_description = $request->faculty_description;

        if(isset($request->status))
        {
            $faculty->status = 'enable';
        } else
        {
            $faculty->status = 'disable';
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

    public function unactive_faculty($id)
    {
        $unactive_faculty = Faculty::findOrFail($id);
        $unactive_faculty->update(['status' => 'disable']);
        return Redirect::back()->with('successMsg', 'Faculty Un-activated Successfully ):');
        // return Redirect::to('/faculty.index')->with('successMsg', 'Faculty Un-activated Successfully ):');
    }

    public function active_faculty($id)
    {
        $active_faculty = Faculty::findOrFail($id);
        $active_faculty->update(['status' => 'enable']);
        return Redirect::back()->with('successMsg', 'Faculty Activated Successfully ):');
        // return Redirect::to('/faculty.index')->with('successMsg', 'Faculty Activated Successfully ):');
    }

}
