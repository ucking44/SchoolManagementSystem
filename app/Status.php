<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;

class Status extends Model
{
    protected $table = 'statuses';

    protected $primaryKey = 'status_id';

    protected $fillable = [
        'teacher_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

}

