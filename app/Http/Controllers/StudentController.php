<?php

namespace App\Http\Controllers;

use App\Admission;
use App\Roll;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Flash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

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

    public function studentSession(Request $request)
    {
        $studentCount = Roll::where(['username' => Session::get('studentSession')])->count();
        return view('welcome', compact('studentCount'));
        //return view('admin.online-student-table', compact('studentCount'));
    }

    public function studentBiodata(Request $request)
    {
        $students = Roll::join('admissions', 'admissions.id', '=', 'rolls.student_id')
                    ->where(['username' => Session::get('studentSession')])->first();
        //return view('admin.student.lectures.biodata', compact('students'));
        return view('student.account', compact('students'));
        // return view('student.profile', compact('students'));
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
                $ipaddress = $request->ip();
                $isonline = Roll::where('username', Session::get('studentSession'))->update(['isonline' => 1, 'login_time' => Carbon::now(), 'ip_address' => $ipaddress]);
                return redirect('/account')->with('successMsg', 'You Have Successfully Logged In!');
                //return view('admin.student.account')->with('successMsg', 'You Have Successfully Logged In!');
            }
            else
            {
                return redirect('/login-student')->with('successMsg', 'Your Username or Password is Incorrect!');
            }
        }
        // return view('admin.student.account');
    }

    public function studentLogout(Request $request)
    {
        $ipaddress = $request->ip();
        $isonline = Roll::where('username', Session::get('studentSession'))->update(['isonline' => 0, 'logout_time' => Carbon::now(), 'ip_address' => $ipaddress]);

        Session::flush();
        return Redirect::to('/')->with('successMsg', 'You Have Successfully Logged Out !!!');
    }

    public function languages($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
        // Session::put('locale', $locale);
        // return Redirect::back();
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

    public function passwordChange()
    {
        $students = Admission::all();
        return view('student.change-password', compact('students'));
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

    public function getForgotPassword()
    {
        return view('admin.student.forget-password');
    }

    public function forgotPassword(Request $request)
    {
        $data = $request->all();
        $studentCount = Admission::where('email', $data['email'])->count();

        if($studentCount == 0)
        {
            return redirect()->back()->with('error', 'We Can\'t Find A Student With This E-mail Address....');
        }
        Session::put('studentSession');
        $students = Admission::where('email', $data['email'])->first();
        //dd($students); die;
        $ran_password = Str::random(12);
        $new_password = $ran_password;
        Roll::where('username', Session::get('studentSession'))->update(['password' => $new_password]);

        $email = $data['email'];
        $student_name = $students->first_name;
        $message = [
            'email' => $email,
            'first_name' => $student_name,
            'password' => $ran_password
        ];

        Mail::send('emails.forgot-password', $message, function ($message) use($email) {
            $message->to($email)->subject('Reset Password - Uc King Academy Information System');
        });

        return redirect()->back()->with('success', 'We Have E-mailed Your Password Reset Link To ' . $data['email']);
        // Mail::send('Html.view', $data, function ($message) {
        //     $message->from('john@johndoe.com', 'John Doe');
        //     $message->sender('john@johndoe.com', 'John Doe');
        //     $message->to('john@johndoe.com', 'John Doe');
        //     $message->cc('john@johndoe.com', 'John Doe');
        //     $message->bcc('john@johndoe.com', 'John Doe');
        //     $message->replyTo('john@johndoe.com', 'John Doe');
        //     $message->subject('Subject');
        //     $message->priority(3);
        //     $message->attach('pathToFile');
        // });
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
        //return view('admin.student.account', compact('student'));
        return view('student.account', compact('student'));
    }

    public function welcome()
    {
        return view('welcome');
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
            'last_name' => 'required',
            'username' => 'required',
            // 'email' => 'required | email',
            // 'phone' => 'required | numeric',
            'image' => 'required | file',
            //'address' => 'required',

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
        $student->admission_id = $request->last_name;
        $student->username = $request->username;
        // $student->email = $request->email;
        // $student->phone = $request->phone;
        $student->image = $imagename;
        //$student->address = $request->address;

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
            'last_name' => 'required',
            'username' => 'required',
            // 'email' => 'required | email',
            // 'phone' => 'required | numeric',
            'image' => 'required | file',
            //'address' => 'required',

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
        $student->admission_id = $request->last_name;
        $student->username = $request->username;
        // $student->email = $request->email;
        // $student->phone = $request->phone;
        $student->image = $imagename;
        //$student->address = $request->address;

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

    public function unactive_student($id)
    {
        $unactive_student = Student::findOrFail($id);
        $unactive_student->update(['status' => 'Married']);
        return Redirect::back()->with('successMsg', 'Student Un-activated Successfully ):');
        // return Redirect::to('/student.index')->with('successMsg', 'Student Un-activated Successfully ):');
    }

    public function active_student($id)
    {
        $active_student = Student::findOrFail($id);
        $active_student->update(['status' => 'Single']);
        return Redirect::back()->with('successMsg', 'Student Activated Successfully ):');
        // return Redirect::to('/student.index')->with('successMsg', 'Student Activated Successfully ):');
    }

}

