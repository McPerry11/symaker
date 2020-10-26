<?php

namespace App\Http\Controllers;

use App\College;
use App\User;
use App\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->data == 'users') {
            $users = User::select('id', 'firstName', 'middleInitial', 'lastName', 'username', 'collegeID', 'type')->paginate(20);
            $colleges = College::select('id', 'abbrev', 'colorCode')->get();
            return response()->json([
                'users' => $users,
                'colleges' => $colleges
            ]);
        } else if ($request->data == 'add' || $request->data == 'edit') {
            if ($request->data == 'add')
                $identical = User::where('username', $request->username)->count();
            else
                $identical = User::where('username', $request->username)->where('id', '<>', $request->id)->count();
            if ($identical > 0) {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'This username is already taken'
                ]);
            }
            return response()->json([
                'status' => 'success'
            ]);
        }
        return view('accounts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regex = '/^(?=.{5,20})[\w\.]*[a-z0-9]+[\w\.]*$/i';
        if (preg_match($regex, $request->username)) {
            $identical = User::where('username', $request->username)->count();
            if ($identical > 0)
                return response()->json(['status' => 'error', 'data' => 'username', 'msg' => 'Username is already taken']);
        } else {
            return response()->json(['status' => 'error', 'data' => 'username', 'msg' => 'Username must be between 5 to 20 characters with at least 1 alphabetical character']);
        }

        if (strlen($request->password) < 8) {
            return response()->json(['status' => 'error', 'data' => 'password', 'msg' => 'Password must have at least 8 characters']);
        }

        $user = new User;
        $user->firstName = strip_tags($request->firstName);
        $user->middleInitial = strip_tags($request->middleInitial);
        $user->lastName = strip_tags($request->lastName);
        $user->collegeID = strip_tags($request->college);
        $user->username = strip_tags($request->username);
        $user->password = strip_tags($request->password);
        $user->type = $request->type ? strip_tags($request->type) : 'USER';
        $user->save();
        
        Log::create([
            'userID' => Auth::id(),
            'ipAddress' => $request->ip(),
            'details' => Auth::user()->username . ' has added a new user [' . $user->username . '].',
            'created_at' => Carbon::now('+8:00'),
            'updated_at' => Carbon::now('+8:00')
        ]);

        return response()->json(['status' => 'success', 'msg' => 'A new user [' . $user->username . '] has been added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::select('firstName', 'middleInitial', 'lastName', 'collegeID', 'username', 'type')->find($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $change = '';
        $user = User::find($id);
        if($user->firstName != $request->input('firstName')){
            $this->validate($request,['firstName'=>['required','string']]);
            $user->firstName = $request->input('firstName');
            $change = $change . "First Name, ";
        }
        if ($user->middleInitial != $request->input('middleInitial')){
            $this->validate($request,['middleInitial'=>['required','string']]);
            $user->middleInitial = $request->input('middleInitial');
            $change = $change . "Middle Initial, ";
        }
        if ($user->lastName != $request->input('lastName')){
            $this->validate($request,['lastName'=>['required','string']]);
            $user->lastName = $request->input('lastName');
            $change = $change . "Last Name, ";
        }
        if ($user->college != $request->input('college')){
            $this->validate($request,['college'=>['required','string']]);
            $user->college = $request->input('college');
            $change = $change . "College, ";
        }
        if ($user->username != $request->input('username')){
            $this->validate($request,['username'=>['required','string','unique:users']]);
            $user->username = $request->input('username');
            $change = $change . "Username, ";
        }
        if ($request->input('password') == null){
            $user->password=$user->password;
        }else{
            $this->validate($request,['password'=>['required','string']]);
            $user->password = $request->input('password');
            $user->password = Hash::make($user->password);
            $change = $change . "Password, ";
        }
        if ($user->email != $request->input('email')){
            $this->validate($request,['email'=>['required','string','unique:users']]);
            $user->email= $request->input('email');
            $change = $change . "Email, ";
        }
        $change = $change." Updated";
        $user->save();
        return redirect('accounts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('accounts');
    }
}
