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

	Route::resource('/tasks', 'TasksController');

});


Auth::routes();


Route::get('/posts/{post}', 'PostController@index');

Route::get('/categories/{category_id}/posts', 'PostCategoriesController@postsbycats');

//Route::resource('/cart', 'CartController'); 

/*Route::get('/cart', 'MyCartController@cart');
Route::post('/cart', 'ProductController@cartadd');
Route::post('/cart', 'MyCartController@store');*/

 



/*Route::post('/cart', 'MyCartController@save');*/ 

//Route::resource('/cart', 'MyCartController');

//Route::resource('/products', 'ProductController');

Route::get('product-list', 'ProductController@index');

Route::get('cart', 'CartsController@cart');

Route::get('add-to-cart/{id}', 'CartsController@cartadd');

Route::get('update-cart', 'CartsController@cartupdate');

Route::post('ordercart', 'CartsController@savecart');

Route::get('clear-cart', 'CartsController@clearcart');



Route::get('order/{idcart}', 'OrderController@index');

Route::post('savecustomer', 'OrderController@savecustomer');

Route::post('savecarrier', 'OrderController@savecarrier');

Route::post('savepayment', 'OrderController@savepayment');

Route::get('saveorder/{idcart}', 'OrderController@saveorder');

Route::get('orderconfirm/{idcart}', 'OrderConfirmController@index');

Route::get('logoutcustomer', 'OrderController@logoutcustomer');

Route::post('logincustomer', 'OrderController@logincustomer');