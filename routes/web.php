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

use App\Roll;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'StudentController@welcome');

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// });

Route::group(['middleware' => ['studentSession']], function() {
    Route::match(['get', 'post'], 'account', 'StudentController@account');
    Route::match(['get', 'post'], 'online/students', 'StudentController@studentSession');
    Route::match(['get', 'post'], 'student-biodata', 'StudentController@studentBiodata');
    Route::match(['get', 'post'], 'student-choose-course', 'StudentController@studentChooseCourse');
    Route::match(['get', 'post'], 'student-lecture-calender', 'StudentController@studentLectureCalender');
    Route::match(['get', 'post'], 'student-lecture-activity', 'StudentController@studentLectureActivity');
    Route::match(['get', 'post'], 'student-exam-marks', 'StudentController@studentExamMarks');
    Route::match(['get', 'post'], '/varify-password', 'StudentController@verifyPassword');
    Route::match(['get', 'post'], '/student-update-password', 'StudentController@changePassword');
    Route::get('/change-password', 'StudentController@passwordChange');
});

// Route::get('/student', [StudentController::class, 'studentLogin']);
Route::get('/login-student', 'StudentController@studentLogin');
Route::get('/logout', 'StudentController@studentLogout');

Route::get('locale/{locale}', 'StudentController@languages');

Route::post('/student-login', 'StudentController@loginStudent');

Route::get('/student-forgot-password', 'StudentController@getForgotPassword');
Route::post('/forgot-password', 'StudentController@forgotPassword');

Route::get('/get/attendance/class', 'AttendanceController@GetClass');
Route::get('/class/attendance/list', 'AttendanceController@AttendanceList');
Route::post('/update_attendance', 'AttendanceController@UpdateAttendance')->name('edit.attendance');

Route::get('/attendance/list/{teacher_id}', 'TeacherController@AttendanceList'); //->name('AttendanceList');

Route::post('MarkAttendanceClass', array('as' => 'MarkAttendanceClass', 'uses' => 'TeacherController@InsertClassAttendance'));

Route::get('teacher/edit/attendance/{edit_date}/{class_id}/{semester_id}/{teacher_id}', 'TeacherController@TeacherEditAttendance')->name('Teacheredit.attendance');

Route::post('teacher_update_attendance', 'TeacherController@TeacherUpdateAttendance')->name(('update.attendance'));



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('prosstudent', 'ProspectiveStudentController');

Route::resource('class', 'ClassController');
Route::get('/unactive_class/{id}', 'ClassController@unactive_class');
Route::get('/active_class/{id}', 'ClassController@active_class');

Route::resource('admission', 'AdmissionController');
Route::get('/unactive_admission/{id}', 'AdmissionController@unactive_admission');
Route::get('/active_admission/{id}', 'AdmissionController@active_admission');


Route::resource('academic', 'AcademicController');
Route::get('/unactive_academic/{id}', 'AcademicController@unactive_academic');
Route::get('/active_academic/{id}', 'AcademicController@active_academic');

Route::resource('batch', 'BatchController');
Route::get('/unactive_batch/{id}', 'BatchController@unactive_batch');
Route::get('/active_batch/{id}', 'BatchController@active_batch');

Route::resource('faculty', 'FacultyController');
Route::get('/unactive_faculty/{id}', 'FacultyController@unactive_faculty');
Route::get('/active_faculty/{id}', 'FacultyController@active_faculty');

Route::resource('department', 'DepartmentController');
Route::get('/unactive_department/{id}', 'DepartmentController@unactive_department');
Route::get('/active_department/{id}', 'DepartmentController@active_department');

Route::resource('course', 'CourseController');
Route::get('/unactive_course/{id}', 'CourseController@unactive_course');
Route::get('/active_course/{id}', 'CourseController@active_course');

Route::resource('level', 'LevelController');
Route::get('/unactive_level/{id}', 'LevelController@unactive_level');
Route::get('/active_level/{id}', 'LevelController@active_level');

Route::resource('day', 'DayController');
Route::get('/unactive_day/{id}', 'DayController@unactive_day');
Route::get('/active_day/{id}', 'DayController@active_day');

Route::resource('shift', 'ShiftController');
Route::get('/unactive_shift/{id}', 'ShiftController@unactive_shift');
Route::get('/active_shift/{id}', 'ShiftController@active_shift');

Route::resource('time', 'TimeController');
Route::get('/unactive_time/{id}', 'TimeController@unactive_time');
Route::get('/active_time/{id}', 'TimeController@active_time');

Route::resource('semester', 'SemesterController');
Route::get('/unactive_semester/{id}', 'SemesterController@unactive_semester');
Route::get('/active_semester/{id}', 'SemesterController@active_semester');

//Route::resource('period', 'PeriodController');

Route::resource('classroom', 'ClassroomController');
Route::get('/unactive_classroom/{id}', 'ClassroomController@unactive_classroom');
Route::get('/active_classroom/{id}', 'ClassroomController@active_classroom');

Route::resource('classScheduling', 'ClassSchedulingController');
Route::get('/unactive_class_scheduling/{id}', 'ClassSchedulingController@unactive_class_scheduling');
Route::get('/active_class_scheduling/{id}', 'ClassSchedulingController@active_class_scheduling');

Route::resource('teacher', 'TeacherController');
Route::get('/unactive_teacher/{id}', 'TeacherController@unactive_teacher');
Route::get('/active_teacher/{id}', 'TeacherController@active_teacher');

Route::resource('student', 'StudentController');
Route::get('/unactive_student/{id}', 'StudentController@unactive_student');
Route::get('/active_student/{id}', 'StudentController@active_student');

Route::get('/feestructure', 'FeeStructureController@index');

Route::get('/dynamicLevels', 'FeeStructureController@dynamicLevels');

Route::post('/save-fee-structure', 'FeeStructureController@store');
Route::get('/edit-fee-structure/{id}', 'FeeStructureController@edit');
Route::put('/update-fee-structure/{id}', 'FeeStructureController@update');
Route::get('/unactive_feestructure/{id}', 'FeeStructureController@unactive_feestructure');
Route::get('/active_feestructure/{id}', 'FeeStructureController@active_feestructure');
Route::get('/delete-fee-structure/{id}', 'FeeStructureController@destroy');


////////////////////////  EXCEL ROUTE  //////////////////////////
Route::get('excel-export-teachers_xlsx', 'TeacherController@ExportExcel_xlsx');
Route::get('excel-export-teachers_xls', 'TeacherController@ExportExcel_xls');
Route::get('excel-export-teachers_csv', 'TeacherController@ExportExcel_csv');

Route::post('excel-import-teachers', 'TeacherController@importExcel');

//////////////////////////// PDF-DOWNLOAD ROUTE //////////////////////////////
Route::get('/pdf-download-class-teacher', 'TeacherController@pdfGenerator');
Route::get('/pdf-download-class-assign', 'ClassAssigningController@pdfGenerator');
Route::get('/pdf-download-class-schedule', 'ClassSchedulingController@pdfGenerator');

//Route::resource('classAssigning', 'ClassAssigningController');

Route::get('classAssigning', 'ClassAssigningController@index');
Route::get('classAssigning/create', 'ClassAssigningController@create');
Route::post('classAssigning/store', 'ClassAssigningController@store');
Route::get('/unactive_classAssigning/{id}', 'ClassAssigningController@unactive_classAssigning');
Route::get('/active_classAssigning/{id}', 'ClassAssigningController@active_classAssigning');

Route::get('print-teacher/{id}','TeacherController@printTeacher');
Route::get('pdf-download-teacher-single/{id}','TeacherController@pdfTeacher');
//Route::post('insert', 'ClassAssigningController@insert');

//Route::get('locale/{locale}', 'LanguageController@languages');


