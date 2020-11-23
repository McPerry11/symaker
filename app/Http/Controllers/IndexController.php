<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\College;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
	public function dashboard() {
        $joinedTable = DB::Table('courses')
            ->join('colleges','colleges.id','=','courses.collegeID')
            ->get();
		return view('dashboard',compact('joinedTable'));
	}

	public function settings() {
		return view('settings');
	}

	public function logs() {
		return view('logs');
	}

    public function courses()
    {
        return view('courses');
	}
}
