<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('settings',compact('user'));
    }

    public function updatePassword(Request $request,$id)
    {
        $user = Auth::user();
        if ($user->id==$id) {
            if ($request->input('password') != $request->input('confirmPassword')) {
                return redirect('');
            } else {
                $this->validate($request, ['password' => ['required', 'string']]);
                $user->password = $request->input('password');
                $user->password = Hash::make($user->password);
                $user->save();
                Auth::logout();
                return redirect('login');
            }
        }else{
            return redirect('settings');
        }
    }

    public function updateEmail(Request $request,$id)
    {
        $user = Auth::user();
        $data = isset($request->emailNotification);
        if($data=='true'){
            $user->emailNotification = 'yes';
            $user->save();
        }else{
            $user->emailNotification = 'no';
            $user->save();
        }
        return redirect('settings');
    }
    public function updatePrivacy(Request $request,$id)
    {
        $user = Auth::user();
        $data = isset($request->hideProfile);
        if($data=='true'){
            $user->private = 'yes';
            $user->save();
        }else{
            $user->private = 'no';
            $user->save();
        }
        return redirect('settings');
    }
}
