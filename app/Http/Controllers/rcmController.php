<?php

namespace App\Http\Controllers;

use App\Course;
use App\RCM;
use Illuminate\Http\Request;

class rcmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $course = Course::find($id);
        return view('references_classroom_management',compact('course'));
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
        $rcm = new RCM();
        $rcm->courseCode = $request->courseCode;
        $rcm->textbook = $request->textbook;
        $rcm->otherReferences = $request->otherReferences;
        $rcm->gradingSystem = $request->gradingSystem;
        $rcm->courseRequirements = $request->courseRequirements;
        $rcm->classroomPolicy = $request->classroomPolicy;
        $rcm->consultationHours = $request->consultationHours;
        $rcm->save();
        return redirect('');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
