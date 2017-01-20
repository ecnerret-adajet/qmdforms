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
Route::get('/drdrforms/reviewer/create/{id}','DrdrformsController@drdrReviewerCreate');
Route::post('/drdrforms/reviewer/{id}','DrdrformsController@drdrreviewer');
Route::get('/drdrforms/approver/create/{id}','DrdrformsController@drdrApproverCreate');
Route::post('/drdrforms/approver/{id}','DrdrformsController@drdrapprover');

/**
 * ddrform setup route
 */
Route::resource('/ddrforms','DdrformsController');
Route::get('/ddrforms/approver/create/{id}', 'DdrformsController@ddrApproverCreate');
Route::post('/ddrforms/approver/{id}','DdrformsController@ddrapprover');


/**
 * Ncn form setup route
 */
Route::resource('/ncnforms','NcnformsController');




});