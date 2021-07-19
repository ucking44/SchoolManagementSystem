<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model
{
    protected $table = 'academics';

    protected $primaryKey = 'id';

    protected $fillable = [
        'academic_year',
        'status',
    ];
}

