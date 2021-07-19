<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    protected $table = 'shifts';

    protected $primaryKey = 'id';

    protected $fillable = [
        'shift',
        'status',
    ];
}

