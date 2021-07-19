<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Teacher_Export implements WithHeadings, FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $teachers = DB::table('teachers')
                    ->select('name', 'gender', 'email', 'phone', 'status')
                    ->get();
        return $teachers;
    }

    public function headings() : array
    {
        return [
            'Name',
            'Gender',
            'Email',
            'Phone',
            'Status',
        ];
    }

}
