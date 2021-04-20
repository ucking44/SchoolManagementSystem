<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
});

Route::group(['middleware' => ['studentSession']], function() {
    Route::match(['get', 'post'], 'account', 'StudentController@account');
    Route::match(['get', 'post'], 'student-biodata', 'StudentController@studentBiodata');
    Route::match(['get', 'post'], 'student-choose-course', 'StudentController@studentChooseCourse');
    Route::match(['get', 'post'], 'student-lecture-calender', 'StudentController@studentLectureCalender');
    Route::match(['get', 'post'], 'student-lecture-activity', 'StudentController@studentLectureActivity');
    Route::match(['get', 'post'], 'student-exam-marks', 'StudentController@studentExamMarks');
    Route::match(['get', 'post'], '/varify-password', 'StudentController@verifyPassword');
    Route::match(['get', 'post'], '/student-update-password', 'StudentController@changePassword');
});

// Route::get('/student', [StudentController::class, 'studentLogin']);
Route::get('/login-student', 'StudentController@studentLogin');
Route::get('/logout', 'StudentController@studentLogout');

Route::post('/student-login', 'StudentController@loginStudent');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('prosstudent', 'ProspectiveStudentController');

Route::resource('class', 'ClassController');

Route::resource('admission', 'AdmissionController');

Route::resource('academic', 'AcademicController');

Route::resource('batch', 'BatchController');

Route::resource('faculty', 'FacultyController');

Route::resource('department', 'DepartmentController');

Route::resource('course', 'CourseController');

Route::resource('level', 'LevelController');

Route::resource('day', 'DayController');

Route::resource('shift', 'ShiftController');

Route::resource('time', 'TimeController');

Route::resource('semester', 'SemesterController');

Route::resource('period', 'PeriodController');

Route::resource('classroom', 'ClassroomController');

Route::resource('classScheduling', 'ClassSchedulingController');

Route::resource('teacher', 'TeacherController');

Route::resource('student', 'StudentController');



