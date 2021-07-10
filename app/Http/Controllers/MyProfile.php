<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyProfile extends Controller
{
    public function myProfile()
    {
        return view("myProfile", [
            "myProfile" => ["Đây là trang profile !!!"]
        ]);
    }
}
