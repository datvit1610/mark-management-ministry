<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Grade extends Controller
{
    public function create()
    {
        return view("grade.create");
    }
    public function store(Request $request)
    {
        $name = $request->get('name');
        //DB::insert("INSERT INTO major(nameMajor) VALUES ('$name')");
        DB::table('grade')->insert([
            "nameGrade" => $name
        ]);
    }
}
