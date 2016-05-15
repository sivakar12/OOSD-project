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

use Illuminate\Http\Request;
use App\User;

Route::get('/', function () { return view('welcome'); });

Route::get('/login', function() { return view('login'); });

Route::post('/login', function(Request $request) {
	$user = User::where([
		'username' => $request->username,
		'password' => $request->password
	])->get()->first();
	if ($user != null) {
		Auth::login($user);
		return redirect('/');
	} else {
		return redirect('/login');
	}
});

Route::get('/logout', function() {
	Auth::logout();
	return redirect('/');
});

Route::get('/denied', function() { return view('denied'); });

Route::group([], function() {
	Route::get('/suppliers', 'SuppliersCtrl@index');
	Route::get('/suppliers/{supplier}', 'SuppliersCtrl@view')->where('supplier', '[0-9]+');
	Route::get('/suppliers/new', 'SuppliersCtrl@new');
	Route::post('/suppliers', 'SuppliersCtrl@create');
	Route::get('/suppliers/{supplier}/edit', 'SuppliersCtrl@edit');
	Route::patch('/suppliers/{supplier}', 'SuppliersCtrl@update');
	Route::delete('/suppliers/{supplier}', 'SuppliersCtrl@delete');
	Route::get('/suppliers/{supplier}/invoices', 'SuppliersCtrl@viewInvoices');
	Route::get('/suppliers/{supplier}/orders', 'SuppliersCtrl@viewOrders');
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
	Route::get('/pi/edit/{pi}', 'PICtrl@edit');
	Route::delete('/pi/{pi}', 'PICtrl@delete');
	Route::post('/pi/{pi}', 'PICtrl@addItem');
	Route::delete('/pi/{pi}/{pii}', 'PICtrl@removeItem');
});

Route::group([], function() {
	Route::get('/po', 'POCtrl@index');
	Route::get('/po/new/', 'POCtrl@new');
	Route::post('/po', 'POCtrl@create');
	Route::get('/po/{po}', 'POCtrl@view');
	Route::get('/po/edit/{po}', 'POCtrl@edit');
	Route::delete('/po/{po}', 'POCtrl@delete');
	Route::post('/po/{po}', 'POCtrl@addItem');
	Route::delete('/po/{po}/{poi}', 'POCtrl@removeItem');
});

Route::group([], function() {
	Route::get('/vouchers', 'VouchersCtrl@index');
	Route::get('/vouchers/{voucher}', 'VouchersCtrl@view')->where('voucher', '[0-9]+');
	Route::get('/vouchers/new', 'VouchersCtrl@new');
	Route::post('/vouchers', 'VouchersCtrl@create');
	Route::get('/vouchers/{voucher}/edit', 'VouchersCtrl@edit');
	Route::patch('/vouchers/{voucher}', 'VouchersCtrl@update');
	Route::delete('/vouchers/{voucher}', 'VouchersCtrl@delete');
});