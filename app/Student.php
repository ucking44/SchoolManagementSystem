<?php

namespace App;

use App\Admission;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = [
        'admission_id',
        'fullname',
        'email',
        'phone',
        'image',
        'address',
        'status',
    ];

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

}

