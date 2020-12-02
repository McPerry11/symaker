<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckAccess;

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
	Route::get('', 'IndexController@dashboard')->name('dashboard');
	Route::get('settings', 'SettingsController@index');
	Route::get('logs', 'IndexController@logs');
	Route::get('othercontent','OtherContentController@index');
	Route::patch('othercontent/{id}','OtherContentController@update');
    Route::patch('othercontent/principle/{id}','OtherContentController@principleUpdate');
    Route::patch('othercontent/outcome/{id}','OtherContentController@outcomeUpdate');
    Route::post('othercontent/add','OtherContentController@addPrinciple');
    Route::post('othercontent/add2','OtherContentController@addOutcome');
    Route::delete('othercontent/delete/{id}','OtherContentController@delete');
    Route::delete('othercontent/delete2/{id}','OtherContentController@deleteOutcome');
	Route::patch('settings/{user}','SettingsController@updatePassword');
    Route::patch('settings/notification/{user}','SettingsController@updateEmail');
    Route::patch('settings/privacy/{user}','SettingsController@updatePrivacy');
	Route::resource('courses', 'CoursesController');
	Route::get('courses', 'CoursesController@index');
	Route::prefix('{courseCode}/edit')->group(function() {
		Route::get('learning_outcomes', 'LearningOutcomeController@index');
		Route::get('course_information', 'CourseinformationController@index');
		Route::get('course_content', 'CoursesController@edit');
		Route::get('references_classroom_management', 'CoursesController@edit');
		Route::post('courseInfoSave', 'CourseInformationController@store');
    // Add your module route here. Let the controller remain the same and check out CoursesController@edit
	});

	Route::group(['middleware' => CheckAccess::class], function() {
		Route::get('logs', 'IndexController@logs');

		Route::get('accounts', 'UsersController@index')->name('accounts');
		Route::post('accounts', 'UsersController@index');
		Route::post('accounts/create', 'UsersController@store');
		Route::post('accounts/{id}', 'UsersController@edit');
		Route::post('accounts/{id}/update', 'UsersController@update');
		Route::post('accounts/{id}/delete', 'UsersController@destroy');

		Route::get('colleges', 'CollegesController@index')->name('colleges');
		Route::post('colleges', 'CollegesController@index');
		Route::post('colleges/create', 'CollegesController@store');
		Route::post('colleges/{id}', 'CollegesController@edit');
		Route::post('colleges/{id}/update', 'CollegesController@update');
		Route::post('colleges/{id}/delete', 'CollegesController@destroy');

		Route::get('othercontent','OtherContentController@index');
		Route::patch('othercontent/{id}','OtherContentController@update');
		Route::patch('othercontent/principle/{id}','OtherContentController@principleUpdate');
		Route::post('othercontent/add','OtherContentController@addPrinciple');
		Route::delete('othercontent/delete/{id}','OtherContentController@delete');
		Route::patch('settings/{user}','SettingsController@updatePassword');
		Route::patch('settings/notification/{user}','SettingsController@updateEmail');
		Route::patch('settings/privacy/{user}','SettingsController@updatePrivacy');

		Route::resource('courses', 'CoursesController');
	});
});
