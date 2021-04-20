<?php

namespace App;

use App\Level;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $fillable = [
        'course_name',
        'course_code',
        'description',
        'course_status',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}

