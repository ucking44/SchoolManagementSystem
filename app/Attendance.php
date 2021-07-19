<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Teacher;

class Attendance extends Model
{
    protected $table = 'attendances';

    protected $primaryKey = 'id';

    protected $fillable = [
        'student_id',
        'teacher_id',
        'class_id',
        'course_id',
        'semester_id',
        'attendance_date',
        'edit_date',
        'day',
        'year',
        'attendance_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

}

