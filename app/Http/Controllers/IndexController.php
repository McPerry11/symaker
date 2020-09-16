<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
	public function dashboard() {
		return view('dashboard');
	}

	public function settings() {
		return view('settings');
	}

	public function logs() {
		return view('logs');
	}
}
