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
use Illuminate\Support\Facades\Redirect;

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
        $classes = Classes::all();
        $student_id = Admission::max('id');
        $roll_id = Roll::max('roll_id');
        $faculties = Faculty::all();
        //$departments = Department::all();
        //$batches = Batch::all();
        $rand_username_password = mt_rand(111809300011 .$student_id, 111809300011 .$student_id);
        return view('admin.admission.index', compact('admissions', 'student_id', 'roll_id', 'faculties', 'rand_username_password'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classes::all();
        $student_id = Admission::max('id');
        $roll_id = Roll::max('roll_id');
        $faculties = Faculty::all();
        $departments = Department::all();
        //$batches = Batch::all();
        $rand_username_password = mt_rand(111809300011 .$student_id, 111809300011 .$student_id);
        return view('admission.create', compact('classes', 'student_id', 'roll_id', 'faculties', 'departments', 'rand_username_password'));
        //return view('admin.admission.create', compact('classes', 'student_id', 'roll_id', 'faculties', 'departments', 'rand_username_password'));
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
            'class_name' => 'required',
            'department_name' => 'required',
            'faculty_name' => 'required',
            // 'batch' => 'required',
            'roll_no' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required | numeric',
            'gender' => 'required',
            'email' => 'required | email',
            'dob' => 'required | date',
            'current_address' => 'required',
            'localOfOrigin' => 'required',
            'stateOfOrigin' => 'required',
            'country' => 'required',
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
        $admission->class_id = $request->class_name;
        $admission->department_id = $request->department_name;
        $admission->faculty_id = $request->faculty_name;
        //$admission->batch_id = $request->batch;
        //$admission->user_id = Auth::id();
        $admission->roll_no = $request->roll_no;
        $admission->first_name = $request->first_name;
        $admission->last_name = $request->last_name;
        $admission->phone = $request->phone;
        $admission->gender = $request->gender;
        $admission->email = $request->email;
        $admission->dob = $request->dob; //Carbon::now();
        $admission->current_address = $request->current_address;
        $admission->localOfOrigin = $request->localOfOrigin;
        $admission->stateOfOrigin = $request->stateOfOrigin;
        $admission->country = $request->country;
        $admission->passport = $request->passport;
        $admission->dateregistered = date('Y-m-d'); //Carbon::now();
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
        return Redirect::back(); //->with()

        //return redirect()->route('admission.index')->with('successMsg', 'Admission Saved Successfully!');
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
        //$batches = Batch::all();
        //$rand_username_password = mt_rand(111809300011 .$student_id, 111809300011 .$student_id);
        return view('admin.admission.edit', compact('admission', 'faculties', 'classes', 'departments', 'prosStudents'));

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
            //'class_name' => 'required',
           // 'department_name' => 'required',
            //'faculty_name' => 'required',
            //'batch_name' => 'required',
            'roll_no' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required | numeric',
            'gender' => 'required',
            'email' => 'required | email',
            'dob' => 'required | date',
            'current_address' => 'required',
            'localOfOrigin' => 'required',
            'stateOfOrigin' => 'required',
            'country' => 'required',
            'passport' => 'required',
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

        $admission->class_id = $request->class_name;
        $admission->department_id = $request->department_name;
        $admission->faculty_id = $request->faculty_name;
        //$admission->batch_id = $request->batch_name;
        //$admission->user_id = Auth::id();
        $admission->roll_no = $request->roll_no;
        $admission->first_name = $request->first_name;
        $admission->last_name = $request->last_name;
        $admission->phone = $request->phone;
        $admission->gender = $request->gender;
        $admission->email = $request->email;
        $admission->dob = $request->dob;
        $admission->current_address = $request->current_address;
        $admission->localOfOrigin = $request->localOfOrigin;
        $admission->stateOfOrigin = $request->stateOfOrigin;
        $admission->country = $request->country;
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

        return Redirect::back();
        //return redirect()->route('admission.index')->with('successMsg', 'Admission Updated Successfully!');
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

    public function unactive_admission($id)
    {
        $unactive_admission = Admission::findOrFail($id);
        $unactive_admission->update(['status' => 'disable']);
        return Redirect::back()->with('successMsg', 'Admission Un-activated Successfully ):');
        // return Redirect::to('/admission.index')->with('successMsg', 'Admission Un-activated Successfully ):');
    }

    public function active_admission($id)
    {
        $active_admission = Admission::findOrFail($id);
        $active_admission->update(['status' => 'enable']);
        return Redirect::back()->with('successMsg', 'Admission Activated Successfully ):');
        // return Redirect::to('/admission.index')->with('successMsg', 'Admission Activated Successfully ):');
    }

}

