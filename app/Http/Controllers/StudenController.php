<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudenController extends Controller
{
    // public function getName($name)
    // {

    //     //return view("student.index", compact('name'));
    //     return view("student.index", [
    //         "name" => $name,
    //         "soThich" => ["Đạt Vịt", "cũng", "Iu Tũn"]
    //     ]);
    // }
    public function soThich()
    {
        return view("student/index", [
            "soThich" => ["ăn", "ngủ", "chơi"]
        ]);
    }
}
