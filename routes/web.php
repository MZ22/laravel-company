<?php

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

/*Route::get('/', function () {

    return view('home');
});*/

Route::get('/', 'HomeController@index');


Route::group(['prefix' => '/admin', 'as' => '/', 'middleware' => 'admin'], function () {

	Route::get('/', function () {
	    return view('admin');
	});

	Route::get('/departments/{department_id}/employees', 'DepartmentController@employeesbydprt');

	Route::get('/logout', 'Auth\LoginController@logout');


	Route::resource('/employees', 'EmployeeController');

	Route::resource('/departments', 'DepartmentController');

	Route::resource('/articles', 'PostsController');

	Route::resource('/categories', 'PostsCategoriesController');

	Route::resource('/testimonials', 'TestimonialController'); 

});


Auth::routes();


