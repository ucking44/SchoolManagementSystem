<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProspectiveStudent;
use App\Student;

class Admission extends Model
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

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    // public function prospectiveStudent()
    // {
    //     return $this->belongsTo(ProspectiveStudent::class);
    // }batch_id

}
