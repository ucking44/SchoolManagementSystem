<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    protected $table = 'faculties';

    protected $primaryKey = 'id';

    protected $fillable = [
        'faculty_name',
        'faculty_code',
        'faculty_description',
        'status',
    ];

}

