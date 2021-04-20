<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Batch;
use App\Classes;
use App\Department;
use App\Faculty;
use App\ProspectiveStudent;
use App\Roll;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admissions = Admission::simplePaginate(4);
        $prosStudents = ProspectiveStudent::all();
        $classes = Classes::all();
        $student_id = Admission::max('id');
        $roll_id = Roll::max('roll_id');
        $faculties = Faculty::all();
        $departments = Department::all();
        $batches = Batch::all();
        $rand_username_password = mt_rand(111809300011 .$student_id, 111809300011 .$student_id);
        return view('admin.admission.index', compact('admissions', 'student_id', 'roll_id', 'faculties', 'departments', 'batches', 'rand_username_password'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prosStudents = ProspectiveStudent::all();
        $classes = Classes::all();
        $student_id = Admission::max('id');
        $roll_id = Roll::max('roll_id');
        $faculties = Faculty::all();
        $departments = Department::all();
        $batches = Batch::all();
        $rand_username_password = mt_rand(111809300011 .$student_id, 111809300011 .$student_id);
        return view('admin.admission.create', compact('prosStudents', 'classes', 'student_id', 'roll_id', 'faculties', 'departments', 'batches', 'rand_username_password'));
        //return view('admin.admission.create', compact('prosStudents', 'classes'));
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
            'class_name' => 'required',
            'department_name' => 'required',
            'faculty_name' => 'required',
            'batch' => 'required',
            'roll_no' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'phone' => 'required | numeric',
            'gender' => 'required',
            'email' => 'required | email',
            'dob' => 'required | date',
            'current_address' => 'required',
            'nationality' => 'required',
            'passport' => 'required',
            //'status' => 'required',
            'dateregistered' => 'required | date',
            'image' => 'required | file',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/admission'))
            {
                mkdir('uploads/admission', 0777, true);
            }
            //unlink('uploads/admission/' . $admission->image);
            $image->move('uploads/admission', $imagename);
        }
        else {
            $imagename = 'default.png';
        }

        $admission = new Admission();
        $admission->prospective_student_id = $request->fullname;
        $admission->class_id = $request->class_name;
        $admission->department_id = $request->department_name;
        $admission->faculty_id = $request->faculty_name;
        $admission->batch_id = $request->batch;
        $admission->user_id = Auth::id();
        $admission->roll_no = $request->roll_no;
        $admission->first_name = $request->first_name;
        $admission->last_name = $request->last_name;
        $admission->father_name = $request->father_name;
        $admission->mother_name = $request->mother_name;
        $admission->phone = $request->phone;
        $admission->gender = $request->gender;
        $admission->email = $request->email;
        $admission->dob = $request->dob;
        $admission->current_address = $request->current_address;
        $admission->nationality = $request->nationality;
        $admission->passport = $request->passport;
        $admission->dateregistered = date('Y-m-d');
        $admission->image = $imagename;

        if(isset($request->status))
        {
            $admission->status = 'enable';
        } else {
            $admission->status = 'disable';
        }
        if ($admission->save())
        {
            $student_id = $admission->id;
            $username = $admission->username;
            $password = $admission->password;

            Roll::insert(['student_id' => $student_id, 'username' => $request->username, 'password' => $request->password]);
        }
        //$admission->save();

        return redirect()->route('admission.index')->with('successMsg', 'Admission Saved Successfully!');
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
        $admission = Admission::findOrFail($id);
        $prosStudents = ProspectiveStudent::all();
        $classes = Classes::all();
        // $student_id = Admission::max('id');
        // $roll_id = Roll::max('roll_id');
        $faculties = Faculty::all();
        $departments = Department::all();
        $batches = Batch::all();
        //$rand_username_password = mt_rand(111809300011 .$student_id, 111809300011 .$student_id);
        return view('admin.admission.edit', compact('admission', 'faculties', 'classes', 'departments', 'batches', 'prosStudents'));

        // $admission = Admission::findOrFail($id);
        // $prosStudents = ProspectiveStudent::all();
        // $classes = Classes::all();
        // return view('admin.admission.create', compact('prosStudents', 'classes', 'admission'));
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
            // 'fullname' => 'required',
            //'class_name' => 'required',
           // 'department_name' => 'required',
            //'faculty_name' => 'required',
            //'batch_name' => 'required',
            'roll_no' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'phone' => 'required | numeric',
            'gender' => 'required',
            'email' => 'required | email',
            'dob' => 'required | date',
            'current_address' => 'required',
            'nationality' => 'required',
            'passport' => 'required',
            //'status' => 'required',
            'dateregistered' => 'required | date',
            'image' => 'required | file',
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->name);
        $admission = Admission::findOrFail($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/admission'))
            {
                mkdir('uploads/admission', 0777, true);
            }
            //unlink('uploads/admission/' . $admission->image);
            $image->move('uploads/admission', $imagename);
        }
        else {
            $imagename = 'default.png';
        }

        $admission->prospective_student_id = $request->fullname;
        $admission->class_id = $request->class_name;
        $admission->department_id = $request->department_name;
        $admission->faculty_id = $request->faculty_name;
        $admission->batch_id = $request->batch_name;
        $admission->user_id = Auth::id();
        $admission->roll_no = $request->roll_no;
        $admission->first_name = $request->first_name;
        $admission->last_name = $request->last_name;
        $admission->father_name = $request->father_name;
        $admission->mother_name = $request->mother_name;
        $admission->phone = $request->phone;
        $admission->gender = $request->gender;
        $admission->email = $request->email;
        $admission->dob = $request->dob;
        $admission->current_address = $request->current_address;
        $admission->nationality = $request->nationality;
        $admission->passport = $request->passport;
        $admission->dateregistered = date('Y-m-d');
        $admission->image = $imagename;

        if(isset($request->status))
        {
            $admission->status = 'enable';
        } else {
            $admission->status = 'disable';
        }
        $admission->save();
        // if ($admission->save())
        // {
        //     $student_id = $admission->id;
        //     $username = $admission->username;
        //     $password = $admission->password;

        //     Roll::insert(['student_id' => $student_id, 'username' => $request->username, 'password' => $request->password]);
        // }
        //$admission->save();

        //return redirect()->route('admission.index')->with('successMsg', 'Admission Saved Successfully!');
        return redirect()->route('admission.index')->with('successMsg', 'Admission Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admission = Admission::findOrFail($id);
        $admission->delete();
        return redirect()->route('admission.index')->with('successMsg', 'Admission Deleted Successfully!');
    }
}
