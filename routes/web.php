<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
	if (Auth::guest()){
    return view('auth.login');
    }
    else{
    return view('home');
    }
});

Auth::routes();


Route::group(['middleware' => ['auth']], function() {
Route::get('/home', 'HomeController@index');

/**
 * drdrforms setup route
 */
Route::resource('/drdrforms','DrdrformsController');
Route::post('/drdrforms/requester/{id}','DrdrformsController@drdrreviewer');
Route::post('/drdrforms/approver/{id}','DrdrformsController@drdrapprover');



});