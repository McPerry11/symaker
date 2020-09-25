<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin() {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            return response()->json([
                'status' => 'success',
                'msg' => 'Log In Successful'
            ]);
        } else {
            return response()->json([
                'status' => 'fail',
                'msg' => 'Invalid username and/or password'
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
