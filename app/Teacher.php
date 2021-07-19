<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClassAssigning;
use App\Status;

class Teacher extends Model
{
    protected $table = 'teachers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'gender',
        'email',
        'dob',
        'phone',
        'address',
        'country',
        'passport',
        'status',
        'dateregistered',
        'image',
    ];

    public function classAssignings()
    {
        return $this->hasMany(ClassAssigning::class);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    // public function course()
    // {
    //     return $this->belongsTo(Course::class);
    // }
}
