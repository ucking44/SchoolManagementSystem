<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClassAssigning;

class ClassScheduling extends Model
{
    protected $table = 'class_schedulings';

    protected $primaryKey = 'id';

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

    public function classAssignings()
    {
        return $this->hasMany(ClassAssigning::class);
    }

}

