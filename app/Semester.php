<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $table = 'semesters';

    protected $fillable = [
        'semester_name',
        'semester_code',
        'semester_duration',
        'description',
    ];
}
