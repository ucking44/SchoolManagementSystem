<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Roll extends Model
{
    protected $table = 'rolls';

    protected $primaryKey = 'roll_id';

    protected $fillable = [
        'student_id',
        'semester_id',
        'username',
        'password',
        'login_time',
        'logout_time',
        //'isonline',
        //'ip_address',
    ];

    public static function onlineStudent()
    {
        $students = Roll::join('admissions', 'admissions.id', '=', 'rolls.student_id')
                    ->where(['username' => Session::get('studentSession')])->first();
        return $students;
    }

}
