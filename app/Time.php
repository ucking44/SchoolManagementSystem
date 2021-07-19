<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $table = 'times';

    protected $primaryKey = 'id';

    protected $fillable = [
        'time',
        'status',
    ];
}
