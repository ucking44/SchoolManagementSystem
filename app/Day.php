<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    protected $table = 'days';

    protected $primaryKey = 'id';

    protected $fillable = [
        'day_name',
        'status',
    ];
}
