<?php

namespace App;

use App\Course;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'levels';

    protected $primaryKey = 'id';

    protected $fillable = [
        'course_id',
        'level',
        'level_description',
        'status',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

}

