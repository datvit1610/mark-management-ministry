<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministry;
use Illuminate\Support\Facades\Redirect;

class EditProfile extends Controller
{


    public function update(Request $request, $id)
    {
        $ministry = Ministry::find($id);
        $ministry->nameMinistry = $request->get('name');
        $ministry->email = $request->get('email');
        $ministry->passWord = $request->get('password');
        $ministry->phone = $request->get('phone');
        $ministry->save();
        return Redirect::route('profile.myProfile');
    }
}
