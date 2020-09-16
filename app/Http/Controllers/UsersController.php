<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        return view('accounts', compact('table'));
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
        $this->validate($request,[
            'firstName'=> ['required', 'string', 'max:255'],
            'middleInitial'=>['required', 'string', 'max:255'],
            'lastName'=>['required', 'string', 'max:255'],
            'username'=>['required', 'string', 'max:255','unique:users'],
            'college'=>['required', 'string', 'max:255'],
            'password'=>['required', 'string'],
            'email'=>['required', 'string', 'max:255','unique:users'],

        ]);
        $user = User::find($id);
        $user->firstName = $request->input('firstName');
        $user->middleInitial = $request->input('middleInitial');
        $user->lastName = $request->input('lastName');
        $user->college = $request->input('college');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->email= $request->input('email');

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
