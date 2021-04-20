<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassScheduling extends Model
{
    protected $table = 'class_schedulings';

    // protected $fillable = [
    //     'time',
    // ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

}


// $table->bigInteger('course_id');
//             $table->bigInteger('level_id');
//             $table->bigInteger('shift_id');
//             $table->bigInteger('class_id');
//             $table->bigInteger('classroom_id');
//             $table->bigInteger('batch_id');
//             $table->bigInteger('day_id');
//             $table->bigInteger('time_id');
//             //$table->bigInteger('teacher_id');
//             $table->bigInteger('semester_id');
