<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($credentials)){
            return response()->json([
                'status_code' => 200,
                'message' => 'Login Successfully'
            ], 200);
        }

        // if login failed
        return response()->json([
            'status_code' => 401,
            'message' => "Login failed !"
        ], 401);
    }

    public function logout(){
        Auth::logout();

        return response()->json(['msg' => 'Logout Successful'], 200);
    }
}
