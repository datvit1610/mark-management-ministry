<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Mark extends Controller
{
    public function mark()
    {
        return view("mark", [
            "mark" => ["Đây là trang xem điểm !!!"]
        ]);
    }
}
