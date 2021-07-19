<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Semester;

class FeeStructure extends Model
{
    protected $table = 'fee_structures';

    protected $fillable = [
        'semester_id',
        'course_id',
        'level_id',
        'admissionFee',
        'semesterFee',
        'status',
    ];

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }
}

