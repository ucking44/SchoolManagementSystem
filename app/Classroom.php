<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrooms';

    protected $primaryKey = 'id';

    protected $fillable = [
        'classroom_name',
        'classroom_code',
        'classroom_description',
        'status',
    ];
}

