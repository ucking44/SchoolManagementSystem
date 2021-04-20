<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Roll;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Flash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::simplePaginate(3);
        $admissions = Admission::all();
        //$students = Student::join('admissions', 'admissions.id', 'students.admission_id')->simplePaginate(3);;
        return view('admin.student.index', compact('students', 'admissions'));
    }

    public function studentBiodata(Request $request)
    {
        $students = Roll::join('admissions', 'admissions.id', '=', 'rolls.student_id')
                    ->where(['username' => Session::get('studentSession')])->first();
        return view('admin.student.lectures.biodata', compact('students'));
    }

    public function studentChooseCourse(Request $request)
    {
        return view('admin.student.lectures.choose-course');
    }

    public function studentLectureCalender(Request $request)
    {
        return view('admin.student.lectures.choose-course');
    }

    public function studentLectureActivity(Request $request)
    {
        return view('admin.student.lectures.choose-course');
    }

    public function studentExamMarks(Request $request)
    {
        return view('admin.student.lectures.choose-course');
    }

    public function studentLogin(Request $request)
    {
        return view('admin.student.login');
    }

    public function loginStudent(Request $request)
    {
        if ($request->isMethod('post'))
        {
            $student = $request->all();
            $studentCount = Roll::where(['username' => $student['username'], 'password' => $student['password']])->count();

            if ($studentCount > 0)
            {
                Session::put('studentSession', $student['username']);
                return redirect('/account')->with('successMsg', 'You Have Successfully Logged In!');

            }
            else
            {
                return redirect('/login-student')->with('successMsg', 'Your Username or Password is Incorrect!');
            }
        }
        // return view('admin.student.account');
    }

    public function verifyPassword(Request $request)
    {
        $students = $request->all();
        //dd($students);
        $validStudent = Roll::where(['username' => Session::get('studentSession'), 'password' => $students['old_password']])->count();

        if ($validStudent == 1)
        {
            //true;
            echo "true"; die;
            //return redirect('student-biodata')->with('successMsg', 'Your Username is Correct!');
        }
        else {
            //false;
            echo "false"; die;
            //return redirect('/student-biodata')->with('successMsg', 'Your Username is Incorrect!');
        }

        return view('admin.student.lectures.biodata', compact('students'));
    }

    public function changePassword(Request $request)
    {
        $student = $request->all();
        $students = Admission::where('email', $student['email'])->first();
        //dd($students);
        $studentCount = Roll::where(['username' => Session::get('studentSession'), 'password' => $student['old_password']])->count();

        if ($studentCount == 1)
        {
            $new_password = $student['new_password'];
            Roll::where(['username' => Session::get('studentSession')])->update(['password' => $new_password]);

            return redirect()->back()->with('success','You Have successfully Changed Your Password!');

        }
        else
        {
            return redirect()->back()->with('error', 'Password Failed To Update');
        }
    }

    public function account()
    {
        if (Session::has('studentSession'))
        {
            $student = Admission::all();
        }
        else
        {
            return redirect('/login-student')->with('successMsg', 'Please Login To Gain Access!');
        }
        return view('admin.student.account', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admissions = Admission::all();
        return view('admin.student.create', compact('admissions'));
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
            'first_name' => 'required',
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'image' => 'required | file',
            'address' => 'required',

        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/students'))
            {
                mkdir('uploads/students', 0777, true);
            }
            $image->move('uploads/students', $imagename);
        }
        else {
            $imagename = 'default.png';
        }

        $student = new Student();
        $student->admission_id = $request->first_name;
        $student->fullname = $request->fullname;
        $student->username = $request->username;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->image = $imagename;
        $student->address = $request->address;

        if(isset($request->status))
        {
            $student->status = 'enable';
        } else {
            $student->status = 'disable';
        }
        $student->save();
        return redirect()->route('student.index')->with('successMsg', 'Student Saved Successfully!');
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
        $student = Student::findOrFail($id);
        $admissions = Admission::all();
        return view('admin.student.edit', compact('admissions', 'student'));
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
            'first_name' => 'required',
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required | email',
            'phone' => 'required | numeric',
            'image' => 'required | file',
            'address' => 'required',

        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);
        $student = Student::findOrFail($id);

        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/students'))
            {
                mkdir('uploads/students', 0777, true);
            }
            $image->move('uploads/students', $imagename);
        }
        else {
            $imagename = 'default.png';
        }

        $student->admission_id = $request->first_name;
        $student->fullname = $request->fullname;
        $student->username = $request->username;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->image = $imagename;
        $student->address = $request->address;

        if(isset($request->status))
        {
            $student->status = 'enable';
        } else {
            $student->status = 'disable';
        }
        $student->save();
        return redirect()->route('student.index')->with('successMsg', 'Student Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('student.index')->with('successMsg', 'Student Deleted Successfully!');
    }
}

