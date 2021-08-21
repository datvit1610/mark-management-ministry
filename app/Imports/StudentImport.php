<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\Grade;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $UNIX_DATE = ($row["ngay_sinh"] - 25569) * 86400;
        $data = [
            "lastName" => $row["ho"],
            "firstName" => $row["ten"],
            "email" => $row["email"],
            "passWord" => $row["mat_khau"],
            "DoB" => gmdate("Y-m-d", $UNIX_DATE),
            "gender" => ($row["gioi_tinh"] == 'nam') ? 1 : 0,
            "idGrade"  => Grade::where('nameGrade', $row["lop"])->value('idGrade'),
        ];
        return new Student($data);
        // return new Student([
        //     //
        // ]);
    }
}
