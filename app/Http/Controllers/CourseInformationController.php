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
        $courseInfo->courseCode = $request->courseID;
        $courseInfo->courseTitle= $request->courseTitle;
        $courseInfo->lectureUnits = $request->lecture;
        $courseInfo->laboratoryUnits =$request->laboratory;
        $courseInfo->courseDescription = $request->courseDesc;
        $courseInfo->save();
        $counter = 0;
        $length = count($request->preRequisite);
        for ($counter;$counter<$length;$counter++){
            $prereq = new prerequisite();
            $prereq->courseCode = $request->courseID;
            $prereq->prerequisites = $request->preRequisite[$counter];
            $prereq->save();
        }
        $counter2 = 0;
        $length2 = count($request->courseOutcome);
        for ($counter2;$counter2<$length2;$counter2++){
            $courseOutcome = new CourseOutcome();
            $courseOutcome->courseCode = $request->courseID;
            $courseOutcome->courseDescription = $request->courseOutcome[$counter2];
            $courseOutcome->save();
        }

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
