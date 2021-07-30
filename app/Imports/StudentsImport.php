<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Concerns\ToModel;

class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        //dd($row['email']);
        return new User([
            'email' => $row['email'],
            'unique' => $row['matric_number'],
            'name' => $row['name'],
            'school_id' => Session::get('bulk_school_id'),
            'department_id' => Session::get('bulk_department_id'),
            'role' => 'Student',
            'password' => Hash::make(strtolower($row['matric_number'])),
        ]);
    }
}
