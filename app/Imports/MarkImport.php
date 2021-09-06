<?php

namespace App\Imports;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class MarkImport implements ToModel, WithHeadingRow

{
    /**
     *  @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    // public function uniqueBy()
    // {
    //     return ['idStudent', 'idStudent'];
    // }

    public function model(array $row)
    {
        // $f1 = ["fn1" => $row["final1"]];

        $data = [
            "idStudent" => Student::where('lastName', $row["ho"])
                ->where('firstName', $row["ten"])->value('idStudent'),
            // "firstName" => Student::->value('firstName'),
            // $idStu = Student::where('lastName', $row["ho"])
            //     ->where('firstName', $row["ten"])->value('idStudent'),
            "idSubject" => Subject::where('nameSubject', $row["mon_hoc"])->value('idSubject'),
            "final1" => $row["final1"],
            "final2" => $row["final2"],
            "skill1" => $row["skill1"],
            "skill2" => $row["skill2"],

        ];
        // dd($data);
        // dd(gettype($idStu));
        return new Mark($data);
    }
}
