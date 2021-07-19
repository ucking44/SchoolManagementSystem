<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ClassScheduling;
use App\FeeStructure;

class Semester extends Model
{
    protected $table = 'semesters';

    protected $primaryKey = 'id';

    protected $fillable = [
        'semester_name',
        'semester_code',
        'semester_duration',
        'description',
        'status',
    ];

    public function class_schedulings()
    {
        return $this->hasMany(ClassScheduling::class);
    }

    public function feeStructures()
    {
        return $this->hasMany(FeeStructure::class);
    }

}
