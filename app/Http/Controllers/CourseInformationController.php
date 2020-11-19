<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseInformation;
use App\CourseOutcome;
use App\prerequisite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $course = Course::find($id);
        $allCourses = DB::table('courses')->where('courseCode','!=',$id)->get();
        return view('course_information', compact('course','allCourses'));
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
    public function store(Request $request,$id)
    {
        $courseInfo = new CourseInformation();
        $courseInfo->courseCode = $request->input('courseID');
        $courseInfo->courseTitle= $request->input('courseTitle');
        $courseInfo->lectureUnits = $request->input('lecture');
        $courseInfo->laboratoryUnits =$request->input('laboratory');
        $courseInfo->courseDescription = $request->input('courseDesc');
        $courseInfo->save();
        $prereq = new prerequisite();
        $prereq->courseCode = $request->input('courseID');
        $prereq->prerequisites = $request->input('preRequisite');
        $prereq->save();
        $courseOutcome = new CourseOutcome();
        $courseOutcome->courseCode = $request->input('courseID');
        $courseOutcome->courseDescription = $request->input('courseOutcome');
        $courseOutcome->save();
        return view('learning_outcomes');
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
