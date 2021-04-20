<?php

namespace App;

use App\Faculty;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';

    protected $fillable = [
        'faculty_id',
        'department_name',
        'department_code',
        'department_description',
        'department_status',
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculty::class);
    }
}

