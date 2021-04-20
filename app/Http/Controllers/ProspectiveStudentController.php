<?php

namespace App\Http\Controllers;

use App\ProspectiveStudent;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProspectiveStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prosStudents = ProspectiveStudent::simplePaginate(5);
        return view('admin.prosStudent.index', compact('prosStudents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.prosStudent.create');
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
            'fullname' => 'required',
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required | email',
            'dob' => 'required | date',
            'phone' => 'required',
            'image' => 'required | file',
            'address' => 'required',
            'localOfOrigin' => 'required',
            'stateOfOrigin' => 'required',
            'country' => 'required',
            //'status' => 'required',

        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/images'))
            {
                mkdir('uploads/images', 0777, true);
            }
            $image->move('uploads/images', $imagename);
        }
        else {
            $imagename = 'default.png';
        }

        $prosStudent = new ProspectiveStudent();
        $prosStudent->fullname = $request->fullname;
        // $prosStudent->first_name = $request->first_name;
        // $prosStudent->last_name = $request->last_name;
        $prosStudent->gender = $request->gender;
        $prosStudent->email = $request->email;
        $prosStudent->dob = date('Y-m-d', strtotime($request->dob));
        //$prosStudent->dob = $request->dob;
        $prosStudent->phone = $request->phone;
        $prosStudent->image = $imagename;
        $prosStudent->address = $request->address;
        $prosStudent->localOfOrigin = $request->localOfOrigin;
        $prosStudent->stateOfOrigin = $request->stateOfOrigin;
        $prosStudent->country = $request->country;

        if(isset($request->status))
        {
            $prosStudent->status = 'enable';
        } else {
            $prosStudent->status = 'disable';
        }
        $prosStudent->save();
        return redirect()->route('prosstudent.index')->with('successMsg', 'Prospective Student Saved Successfully!');

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
        $prosStudent = ProspectiveStudent::findOrFail($id);
        return view('admin.prosStudent.edit', compact('prosStudent'));
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
            // 'first_name' => 'required',
            // 'last_name' => 'required',
            'fullname' => 'required',
            'gender' => 'required',
            'email' => 'required | email',
            'dob' => 'required | date',
            'phone' => 'required | numeric',
            //'image' => 'required | file',
            'address' => 'required',
            'localOfOrigin' => 'required',
            'stateOfOrigin' => 'required',
            'country' => 'required',
            //'status' => 'required',

        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);
        $prosStudent = ProspectiveStudent::findOrFail($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/images'))
            {
                mkdir('uploads/images', 0777, true);
            }
            $image->move('uploads/images', $imagename);
        }
        else {
            $imagename = $prosStudent->image;
        }

        $prosStudent->fullname = $request->fullname;
        // $prosStudent->first_name = $request->first_name;
        // $prosStudent->last_name = $request->last_name;
        $prosStudent->gender = $request->gender;
        $prosStudent->email = $request->email;
        $prosStudent->dob = date('Y-m-d', strtotime($request->dob));
        $prosStudent->phone = $request->phone;
        $prosStudent->image = $imagename;
        $prosStudent->address = $request->address;
        $prosStudent->localOfOrigin = $request->localOfOrigin;
        $prosStudent->stateOfOrigin = $request->stateOfOrigin;
        $prosStudent->country = $request->country;

        if(isset($request->status))
        {
            $prosStudent->status = 'enable';
        } else {
            $prosStudent->status = 'disable';
        }
        $prosStudent->save();
        return redirect()->route('prosstudent.index')->with('successMsg', 'Prospective Student Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $prosStudent = ProspectiveStudent::findOrFail($id);
        $prosStudent->delete();
        return redirect()->route('prosstudent.index')->with('successMsg', 'Prospective Student Deleted Successfully!');
    }
}
