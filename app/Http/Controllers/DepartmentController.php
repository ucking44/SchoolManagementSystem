<?php

namespace App\Http\Controllers;

use App\Department;
use App\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::simplePaginate(3);
        $faculties = Faculty::all();
        return view('admin.department.index', compact('departments', 'faculties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculties = Faculty::all();
        return view('admin.department.create', compact('faculties'));
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
            'department_name',
            'department_code',
            'department_description',
        ]);

        $department = new Department();
        $department->faculty_id = $request->faculty_name;
        $department->department_name = $request->department_name;
        $department->department_code = $request->department_code;
        $department->department_description = $request->department_description;

        if(isset($request->status))
        {
            $department->status = 'enable';
        } else {
            $department->status = 'disable';
        }
        $department->save();
        return redirect()->route('department.index')->with('successMsg', 'Department Saved Successfully!');

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
        $faculties = Faculty::all();
        $department = Department::findOrFail($id);
        return view('admin.department.edit', compact('faculties', 'department'));
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
            'department_name',
            'department_code',
            'department_description',
        ]);

        $department = Department::findOrFail($id);
        $department->faculty_id = $request->faculty_name;
        $department->department_name = $request->department_name;
        $department->department_code = $request->department_code;
        $department->department_description = $request->department_description;

        if(isset($request->status))
        {
            $department->status = 'enable';
        } else {
            $department->status = 'disable';
        }
        $department->save();
        return redirect()->route('department.index')->with('successMsg', 'Department Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();
        return redirect()->route('department.index')->with('successMsg', 'Department Deleted Successfully!');
    }

    public function unactive_department($id)
    {
        $unactive_department = Department::findOrFail($id);
        $unactive_department->update(['status' => 'disable']);
        return Redirect::back()->with('successMsg', 'Department Un-activated Successfully ):');
        // return Redirect::to('/department.index')->with('successMsg', 'Department Un-activated Successfully ):');
    }

    public function active_department($id)
    {
        $active_department = Department::findOrFail($id);
        $active_department->update(['status' => 'enable']);
        return Redirect::back()->with('successMsg', 'Department Activated Successfully ):');
        // return Redirect::to('/department.index')->with('successMsg', 'Department Activated Successfully ):');
    }

}

