<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'name',
        'gender',
        'email',
        'dob',
        'phone',
        'address',
        'nationality',
        'passport',
        'status',
        'dateregistered',
        'image',
    ];

    // public function course()
    // {
    //     return $this->belongsTo(Course::class);
    // }
}


// $table->bigIncrements('id');
// $table->string('full_name');
// $table->string('gender');
// $table->string('email')->unique();
// $table->date('dob');
// $table->string('phone');
// $table->string('address');
// $table->string('nationality');
// $table->string('passport');
// $table->string('status');
// $table->date('dateregistered');
// $table->bigInteger('user_id');
// $table->string('image')->default('default.png');
