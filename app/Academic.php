<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $fillable = [
        'roll_no',
        'first_name',
        'last_name',
        'father_name',
        'mother_name',
        'phone',
        'gender',
        'email',
        'dob',
        'current_address',
        'nationality',
        'passport',
        'status',
        'dateregistered',
        'image',
    ];
}

