<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ministry;
use Exception;
use Illuminate\Support\Facades\Redirect;

use function PHPUnit\Framework\returnValueMap;

class AuthenticateController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function loginProcess(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');

        try {
            $ministry = Ministry::where('email', $email)->where('password', $password)->firstOrFail();

            if ($ministry->block == 1) {
                return Redirect::route("login")->with('error', [
                    "message" => 'Nick đã bị khóa !',
                ]);
            } else {
                $request->session()->put('id', $ministry->idMinistry);
                $request->session()->put('nameMinistry', $ministry->nameMinistry);
                $request->session()->put('role', $ministry->role);
                return Redirect::route("doshboard.index");
            }
        } catch (Exception $e) {
            return Redirect::route("login")->with('error', [
                "message" => 'Sai Email hooặc mật khẩu !',
                "email" => $email

            ]);
        }
        return $request;
    }

    public function logout(Request $request)
    {
        //xoa session
        $request->session()->flush();
        //dieu huong ve trang login
        return Redirect::route("login");
    }
}
