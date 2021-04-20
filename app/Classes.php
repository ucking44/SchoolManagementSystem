<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Classes;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = [
        'class_name',
        'class_code',
    ];

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

}

