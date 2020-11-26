<?php

namespace App\Http\Controllers;


use App\College;
use App\Course;
use App\CourseInformation;
use App\LearningOutcome;
use App\CourseOutcome;
use App\PreRequisite;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use voku\helper\ASCII;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $collegeTable = college::all();
        $joinedTable = DB::Table('courses')
        ->join('colleges','colleges.id','=','courses.collegeID')
        ->get();
        return view('courses', compact('joinedTable','collegeTable'));
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
            'courseCode'=> ['required', 'string', 'max:255'],
            'courseTitle'=>['required', 'string', 'max:255'],
        ]);

        $course = new course;
        $course->courseCode = $request->input('courseCode');
        $course->collegeID = $request->input('collegeID');
        $course->courseTitle = $request->input('courseTitle');
        $course->save();
        return redirect('courses');

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
        // To be used for determining if edit event was from dashboard or courses module
        // return redirect(url()->previous());

        // In this part, we will use the Illuminate\Support\Facades\Route to determine which module is in view
        // This will prevent us from making more controller functions with the same motive.
        if (Route::current()->uri() == '{courseCode}/edit/course_content') {
            return view('course_content');
        } else if (Route::current()->uri() == 'subjectcode/edit/course_information') {
            return view('course_information');
        } else if (Route::current()->uri() == 'subjectcode/edit/references_classroom_management') {
            return view('references_classroom_management');
        }
        // Add an else if for your module
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
        $course = Course::find($id);
        if($course->courseCode != $request->input('courseCode')){
            $this->validate($request,['courseCode'=>['required','string']]);
            $course -> courseCode = $request->input('courseCode');
        }
        if($course->collegeID != $request->input('collegeID')){
            $this->validate($request,['collegeID'=>['required','int']]);
            $course -> collegeID = $request->input('collegeID');
        }
        if($course->courseTitle != $request->input('courseTitle')){
            $this->validate($request,['courseTitle'=>['required','string']]);
            $course -> courseTitle = $request->input('courseTitle');
        }
        $course->save();
        return redirect('courses');
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
