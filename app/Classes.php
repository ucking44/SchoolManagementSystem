<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use App\Classes;
use App\Student;

class Classes extends Model
{
    protected $table = 'classes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'class_name',
        'class_code',
        'status',
    ];

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

}

