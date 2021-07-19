<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
use App\ClassScheduling;
use App\Course;

class ClassAssigning extends Model
{
    protected $table = 'class_assignings';

    protected $primaryKey = 'class_assign_id';

    protected $fillable = [
        'teacher_id',
        'class_schedule_id',
        'status',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function classScheduling()
    {
        return $this->belongsTo(ClassScheduling::class);
    }

}


