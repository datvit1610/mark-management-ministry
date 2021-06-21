<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Favourite extends Controller
{
    public function soThich()
    {
        return view("favourite", [
            "soThich" => ["Xem điểm ở đây nè !!!"]
        ]);
    }
}
