<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditProfile extends Controller
{
    public function editProfile()
    {
        return view("editProfile", [
            "editProfile" => ["Đây là trang editProfile !!!"]
        ]);
    }
}
