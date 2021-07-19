<?php

namespace App\Imports;

use App\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TeacherImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Teacher([
            'name' => $row['name'],
            'gender' => $row['gender'],
            'email' => $row['email'],
            'dob' => $row['dob'],
            'phone' => $row['phone'],
            'address' => $row['address'],
            'nationality' => $row['nationality'],
            'passport' => $row['passport'],
            'status' => $row['status'],
            'dateregistered' => $row['dateregistered'],
            'user_id' => $row['user_id'],
        ]);
    }
}
