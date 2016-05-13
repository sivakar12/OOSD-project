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
