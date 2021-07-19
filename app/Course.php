<?php

namespace App;

use App\Level;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';

    protected $primaryKey = 'id';

    protected $fillable = [
        'level_id',
        'course_name',
        'course_code',
        'description',
        'status',
    ];

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}

