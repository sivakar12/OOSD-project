<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([], function() {
	Route::get('/suppliers', 'SuppliersCtrl@index');
	Route::get('/suppliers/{supplier}', 'SuppliersCtrl@view')->where('supplier', '[0-9]+');
	Route::get('/suppliers/new', 'SuppliersCtrl@new');
	Route::post('/suppliers', 'SuppliersCtrl@create');
	Route::get('/suppliers/{supplier}/edit', 'SuppliersCtrl@edit');
	Route::patch('/suppliers/{supplier}', 'SuppliersCtrl@update');
	Route::delete('/suppliers/{supplier}', 'SuppliersCtrl@delete');
});

Route::group([], function() {
	Route::get('/customers', 'CustomersCtrl@index');
	Route::get('/customers/{customer}', 'CustomersCtrl@view')->where('customer', '[0-9]+');
	Route::get('/customers/new', 'CustomersCtrl@new');
	Route::post('/customers', 'CustomersCtrl@create');
	Route::get('/customers/{customer}/edit', 'CustomersCtrl@edit');
	Route::patch('/customers/{customer}', 'CustomersCtrl@update');
	Route::delete('/customers/{customer}', 'CustomersCtrl@delete');
});

Route::group([], function() {
	Route::get('/users', 'UsersCtrl@index');
	Route::get('/users/{user}', 'UsersCtrl@view')->where('user', '[0-9]+');
	Route::get('/users/new', 'UsersCtrl@new');
	Route::post('/users', 'UsersCtrl@create');
	Route::get('/users/{user}/edit', 'UsersCtrl@edit');
	Route::patch('/users/{user}', 'UsersCtrl@update');
	Route::delete('/users/{user}', 'UsersCtrl@delete');
});

Route::group([], function() {
	Route::get('/pi', 'PICtrl@index');
	Route::get('/pi/new/', 'PICtrl@new');
	Route::post('/pi', 'PICtrl@create');
	Route::get('/pi/{pi}', 'PICtrl@view');
	Route::delete('/pi/{pi}', 'PICtrl@delete');
	Route::post('/pi/{pi}', 'PICtrl@addItem');
	Route::delete('/pi/{pi}/{pii}', 'PICtrl@removeItem');
});