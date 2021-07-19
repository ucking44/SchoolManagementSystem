<?php

namespace App;

use App\User;
use App\Admission;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $primaryKey = 'id';

    protected $fillable = [
        //'user_id',
        'admission_id',
        'username',
        //'email',
        //'phone',
        'image',
        //'address',
        'status',
    ];

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

