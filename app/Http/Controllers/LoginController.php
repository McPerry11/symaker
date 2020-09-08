<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            return redirect('');
        } else {
            return redirect('login');
        }
    }
}
