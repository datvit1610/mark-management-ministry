<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministry;

class MyProfile extends Controller
{
    public function myProfile(Request $request)
    {
        $idMinistry = $request->session()->get('id');

        $ministry = Ministry::where('idMinistry', '=', $idMinistry)->first();

        return view('profile.myProfile', [
            "ministry" => $ministry
        ]);
    }
    public function edit($id)
    {
        $editprofile = Ministry::find($id);
        return view('profile.editProfile', [
            "editprofile" => $editprofile
        ]);
    }
}
