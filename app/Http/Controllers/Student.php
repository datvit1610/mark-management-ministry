<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Student extends Controller
{
    public function student()
    {
        return view("student", [
            "student" => ["Đây là trang sinh viên !!!"]
        ]);
    }
}
