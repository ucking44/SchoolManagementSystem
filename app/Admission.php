<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Student;
use App\Department;

class Admission extends Model
{
    protected $table = 'admissions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'roll_no',
        'first_name',
        'last_name',
        'phone',
        'gender',
        'email',
        'dob',
        'localOfOrigin',
        'stateOfOrigin',
        'current_address',
        'country',
        'passport',
        'status',
        'dateregistered',
        'image',
    ];

    public function class()
    {
        return $this->belongsTo(Classes::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    // public function batch()
    // {
    //     return $this->belongsTo(Batch::class); department_name
    // }

    public function students()
    {
        return $this->hasMany(Student::class);
    }


}
