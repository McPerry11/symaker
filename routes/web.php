<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('login', 'LoginController@getLogin')->name('login');
Route::post('login','LoginController@login')->name('post_login')->middleware('throttle:10,5');
Route::post('logout','LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function() {
	Route::get('', 'IndexController@dashboard');
	Route::get('settings', 'IndexController@settings');
	Route::get('logs', 'IndexController@logs');
	Route::get('courses', 'CoursesController@index');
	Route::prefix('subjectcode/edit')->group(function() {
		Route::get('learning_outcomes', 'CoursesController@edit');
		Route::get('course_information', 'CoursesController@edit');
		Route::get('course_content', 'CoursesController@edit');
        // Add your module route here. Let the controller remain the same and check out CoursesController@edit
	});
	Route::resource('accounts', 'UsersController');
	Route::resource('colleges', 'CollegesController');
});
