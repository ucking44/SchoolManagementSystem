<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::simplePaginate(3);
        return view('admin.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create');
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
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required | email',
            'dob' => 'required | date',
            'phone' => 'required | numeric',
            'address' => 'required',
            'nationality' => 'required',
            'passport' => 'required',
            'dateregistered' => 'required | date',
            'image' => 'required | file',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/teacher'))
            {
                mkdir('uploads/teacher', 0777, true);
            }
            //unlink('uploads/teacher/' . $teacher->image);
            $image->move('uploads/teacher', $imagename);
        }
        else {
            $imagename = 'default.png';
        }

        $teacher = new Teacher();
        //$teacher->user_id = $request->user_id;
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->dob = $request->dob;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->nationality = $request->nationality;
        $teacher->passport = $request->passport;
        $teacher->dateregistered = $request->dateregistered;
        $teacher->image = $imagename;

        if(isset($request->status))
        {
            $teacher->status = 'Single';
        } else {
            $teacher->status = 'Married';
        }
        $teacher->save();
        return redirect()->route('teacher.index')->with('successMsg', 'Teacher Saved Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.edit', compact('teacher'));
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
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required | email',
            'dob' => 'required | date',
            'phone' => 'required | numeric',
            'address' => 'required',
            'nationality' => 'required',
            'passport' => 'required',
            'dateregistered' => 'required | date',
            //'image' => 'required | file',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        $teacher = Teacher::findOrFail($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/teacher'))
            {
                mkdir('uploads/teacher', 0777, true);
            }
            //unlink('uploads/teacher/' . $teacher->image);
            $image->move('uploads/teacher', $imagename);
        }
        else {
            $imagename = 'default.png';
        }

        //$teacher->user_id = $request->user_id;
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->email = $request->email;
        $teacher->dob = $request->dob;
        $teacher->phone = $request->phone;
        $teacher->address = $request->address;
        $teacher->nationality = $request->nationality;
        $teacher->passport = $request->passport;
        $teacher->dateregistered = $request->dateregistered;
        $teacher->image = $imagename;

        if(isset($request->status))
        {
            $teacher->status = 'Single';
        } else {
            $teacher->status = 'Married';
        }
        $teacher->save();
        return redirect()->route('teacher.index')->with('successMsg', 'Teacher Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teacher.index')->with('successMsg', 'Teacher Deleted Successfully!');
    }
}
