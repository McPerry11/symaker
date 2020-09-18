<?php

namespace App\Http\Controllers;

use App\College;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CollegesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $table = College::all();
        return view('colleges', compact('table'));
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
        $this->validate($request,[
            'abbrev'=> ['required', 'string', 'max:255'],
            'collegeName'=>['required', 'string', 'max:255'],
            'colorCode'=>['required', 'string', 'max:255'],
        ]);
        $college = new College;
        $college->abbrev = $request->input('abbrev');
        $college->collegeName = $request->input('collegeName');
        $college->colorCode = $request->input('colorCode');
        $college->save();
        return redirect('/colleges');
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
        $college = College::find($id);
        if($college->abbrev != $request->input('abbrev')){
            $this->validate($request,['abbrev'=>['required','string']]);
            $college->abbrev = $request->input('abbrev');
            $change = $change . "Abbrev, ";
        }
        if ($college->collegeName != $request->input('collegeName')){
            $this->validate($request,['collegeName'=>['required','string']]);
            $college->collegeName = $request->input('collegeName');
            $change = $change . "College Name, ";
        }
        if ($college->colorCode != $request->input('colorCode')){
            $this->validate($request,['colorCode'=>['required','string']]);
            $college->colorCode = $request->input('colorCode');
            $change = $change . "Color Code, ";
        }
        $change = $change." Updated";
        $college->save();
        return redirect('colleges');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $college = College::find($id);
        $college->delete();
        return redirect('colleges');
    }
}
