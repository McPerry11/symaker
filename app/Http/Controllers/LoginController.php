<?php

namespace App\Http\Controllers;

use App\User;
use App\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class LoginController extends Controller
{
    public function getLogin() {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            Log::create([
                'userID' => Auth::id(),
                'ipAddress' => $request->ip(),
                'details' => Auth::user()->username . ' has logged in.',
                'created_at' => Carbon::now('+8:00'),
                'updated_at' => Carbon::now('+8:00')
            ]);
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

    public function logout(Request $request)
    {
        Log::create([
            'userID' => Auth::id(),
            'ipAddress' => $request->ip(),
            'details' => Auth::user()->username . ' has logged out.',
            'created_at' => Carbon::now('+8:00'),
            'updated_at' => Carbon::now('+8:00')
        ]);
        Auth::logout();
        return redirect(route('login'));
    }
}
