<?php

namespace App\Http\Controllers;

use App\College;
use App\User;
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
    public function index()
    {
        $table = user::all();
        $collegeTable=College::all();
        return view('accounts', compact('table','collegeTable'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstName'=> ['required', 'string', 'max:255'],
            'middleInitial'=>['required', 'string', 'max:255'],
            'lastName'=>['required', 'string', 'max:255'],
            'username'=>['required', 'string', 'max:255','unique:users'],
            'college'=>['required', 'string', 'max:255'],
            'password'=>['required', 'string'],
            'email'=>['required', 'string', 'max:255','unique:users'],
            ]);
      $user = new User;
        $user->firstName = $request->input('firstName');
        $user->middleInitial = $request->input('middleInitial');
        $user->lastName = $request->input('lastName');
        $user->college = $request->input('college');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->email= $request->input('email');
        $user->save();
      return redirect('/accounts')->with('sucess','Data Saved');
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
        //
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
