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
Route::get('/ncnforms/approver/create/{id}','NcnformsController@ncnapproverCreate');
Route::post('/ncnforms/approver/{id}','NcnformsController@ncnapprover');

/**
 * Ccir form setup routes
 */
Route::resource('/ccirforms', 'CcirformsController');


/**
 * admin page route setup
 */
Route::get('/dashboard', 'AdminPageController@forms');
Route::get('/settings', 'AdminPageController@settings');
Route::post('/companies', 'AdminPageController@storeCompany');
Route::post('/departments','AdminPageController@storeDepartment');

/**
 * User controller route setup
 */
Route::resource('users','UsersController'); 
Route::resource('roles','RoleController'); 

// Route::get('roles',['as'=>'roles.index','uses'=>'RoleController@index','middleware' => ['permission:role-list|role-create|role-edit|role-delete']]);
// Route::get('roles/create',['as'=>'roles.create','uses'=>'RoleController@create','middleware' => ['permission:role-create']]);
// Route::post('roles/create',['as'=>'roles.store','uses'=>'RoleController@store','middleware' => ['permission:role-create']]);
// Route::get('roles/{id}',['as'=>'roles.show','uses'=>'RoleController@show']);
// Route::get('roles/{id}/edit',['as'=>'roles.edit','uses'=>'RoleController@edit','middleware' => ['permission:role-edit']]);
// Route::patch('roles/{id}',['as'=>'roles.update','uses'=>'RoleController@update','middleware' => ['permission:role-edit']]);
// Route::delete('roles/{id}',['as'=>'roles.destroy','uses'=>'RoleController@destroy','middleware' => ['permission:role-delete']]); 


});