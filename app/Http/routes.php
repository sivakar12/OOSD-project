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

Route::get('/login', function() { 
	if (!Auth::check())
		return view('login');
	else
		return redirect('/');
});

Route::post('/login', function(Request $request) {
	$user = User::where([
		'username' => $request->username,
		'password' => $request->password
	])->get()->first();
	if ($user != null) {
		Auth::login($user);
		Log::info('A user is logged in ' . $user->username);
		return redirect('/');
	} else {
		Log::info('A user tried to log in as '. $request->username);
		return redirect('/login');
	}
});

Route::get('/logout', function() {
	Log::info('A user is logging out ' . Auth::user()->username);
	Auth::logout();
	return redirect('/');
});

Route::get('/denied', function() { return view('denied'); });

Route::get('/change_theme', function() {
	if (!session()->has('white')) {
		session(['white' => true]);
	} else {
		session(['white' => !session('white')]);
	}
	return redirect()->back();
});
Route::group(['middleware' => ['denysp', 'denysk']], function() {
	Route::get('/suppliers', 'SuppliersCtrl@index');
	Route::get('/suppliers/{supplier}', 'SuppliersCtrl@view')->where('supplier', '[0-9]+');
	Route::get('/suppliers/new', 'SuppliersCtrl@addNew');
	Route::post('/suppliers', 'SuppliersCtrl@create');
	Route::get('/suppliers/{supplier}/edit', 'SuppliersCtrl@edit');
	Route::patch('/suppliers/{supplier}', 'SuppliersCtrl@update');
	Route::delete('/suppliers/{supplier}', 'SuppliersCtrl@delete');
	Route::get('/suppliers/{supplier}/invoices', 'SuppliersCtrl@viewInvoices');
	Route::get('/suppliers/{supplier}/orders', 'SuppliersCtrl@viewOrders');
});

Route::group(['middleware' => ['denysk']], function() {
	Route::get('/customers', 'CustomersCtrl@index');
	Route::get('/customers/{customer}', 'CustomersCtrl@view')->where('customer', '[0-9]+');
	Route::get('/customers/new', 'CustomersCtrl@addNew');
	Route::post('/customers', 'CustomersCtrl@create');
	Route::get('/customers/{customer}/edit', 'CustomersCtrl@edit');
	Route::patch('/customers/{customer}', 'CustomersCtrl@update');
	Route::delete('/customers/{customer}', 'CustomersCtrl@delete');

	Route::get('/customers/{customer}/invoices', 'CustomersCtrl@viewSalesInvoices');
	Route::get('/customers/{customer}/receipts', 'CustomersCtrl@viewReceipts');
	Route::get('/customers/{customer}/returns', 'CustomersCtrl@viewReturns');
});

Route::group(['middleware' => ['denysp', 'denyac', 'denymn', 'denysk']], function() {
	Route::get('/users', 'UsersCtrl@index');
	Route::get('/users/{user}', 'UsersCtrl@view')->where('user', '[0-9]+');
	Route::get('/users/new', 'UsersCtrl@addNew');
	Route::post('/users', 'UsersCtrl@create');
	Route::get('/users/{user}/edit', 'UsersCtrl@edit');
	Route::patch('/users/{user}', 'UsersCtrl@update');
	Route::delete('/users/{user}', 'UsersCtrl@delete');
});

Route::group(['middleware' => ['denysk', 'denysp']], function() {
	Route::get('/pi', 'PICtrl@index');
	Route::get('/pi/new/', 'PICtrl@addNew');
	Route::post('/pi', 'PICtrl@create');
	Route::get('/pi/{pi}', 'PICtrl@view');
	Route::get('/pi/edit/{pi}', 'PICtrl@edit');
	Route::delete('/pi/{pi}', 'PICtrl@delete');
	Route::post('/pi/{pi}', 'PICtrl@addItem');
	Route::delete('/pi/{pi}/{pii}', 'PICtrl@removeItem');
});

Route::group(['middleware' => ['denysk', 'denysp']], function() {
	Route::get('/po', 'POCtrl@index');
	Route::get('/po/new/', 'POCtrl@addNew');
	Route::post('/po', 'POCtrl@create');
	Route::get('/po/{po}', 'POCtrl@view');
	Route::get('/po/edit/{po}', 'POCtrl@edit');
	Route::delete('/po/{po}', 'POCtrl@delete');
	Route::post('/po/{po}', 'POCtrl@addItem');
	Route::delete('/po/{po}/{poi}', 'POCtrl@removeItem');
});

Route::group(['middleware' => ['denysk', 'denysp']], function() {
	Route::get('/vouchers', 'VouchersCtrl@index');
	Route::get('/vouchers/{voucher}', 'VouchersCtrl@view')->where('voucher', '[0-9]+');
	Route::get('/vouchers/new', 'VouchersCtrl@addNew');
	Route::post('/vouchers', 'VouchersCtrl@create');
	Route::get('/vouchers/{voucher}/edit', 'VouchersCtrl@edit');
	Route::patch('/vouchers/{voucher}', 'VouchersCtrl@update');
	Route::delete('/vouchers/{voucher}', 'VouchersCtrl@delete');
});

Route::group(['middleware' => []], function() {
	Route::get('/inventory', 'InventoryCtrl@index');
	Route::get('/inventory/{item}', 'InventoryCtrl@view')->where('item', '[0-9]+');
	Route::get('/inventory/new', ['uses' => 'InventoryCtrl@addNew', 
		'middleware' =>['denymn', 'denyac', 'denysp']]);
	Route::post('/inventory', ['uses' => 'InventoryCtrl@create', 
		'middleware' =>['denymn', 'denyac', 'denysp']]);
	Route::get('/inventory/{item}/edit', ['uses' => 'InventoryCtrl@edit', 
		'middleware' =>['denymn', 'denyac', 'denysp']]);
	Route::patch('/inventory/{item}', ['uses' => 'InventoryCtrl@update', 
		'middleware' =>['denymn', 'denyac', 'denysp']]);
	Route::delete('/inventory/{item}', ['uses' => 'InventoryCtrl@delete', 
		'middleware' =>['denymn', 'denyac', 'denysp']]);
});

Route::group(['middleware' => ['denysk']], function() {
	Route::get('/si', 'SICtrl@index');
	Route::get('/si/{si}', 'SICtrl@view')->where('si', '[0-9]+');
	Route::get('/si/new/{chassis_number?}', 'SICtrl@addNew');
	Route::post('/si', 'SICtrl@create');
	Route::get('/si/{si}/edit', 'SICtrl@edit');
	Route::patch('/si/{si}/', 'SICtrl@update');
	Route::delete('/si/{si}/', 'SICtrl@delete');

	Route::get('/si/{si}/receipts', 'SICtrl@viewReceipts');
	Route::get('/si/{si}/returns', 'SICtrl@viewReturns');
});

Route::group(['middleware' => ['denysk']], function() {
	Route::get('/receipts', 'ReceiptCtrl@index');
	Route::get('/receipts/{receipt}', 'ReceiptCtrl@view')->where('receipt', '[0-9]+');
	Route::get('/receipts/new/{invoice_id?}', 'ReceiptCtrl@addNew');
	Route::post('/receipts', 'ReceiptCtrl@create');
	Route::get('/receipts/{receipt}/edit', 'ReceiptCtrl@edit');
	Route::patch('/receipts/{receipt}/', 'ReceiptCtrl@update');
	Route::delete('/receipts/{receipt}/', 'ReceiptCtrl@delete');
});

Route::group(['middleware' => []], function() {
	Route::get('/returns', 'ReturnsCtrl@index');
	Route::get('/returns/{return}', 'ReturnsCtrl@view')->where('return', '[0-9]+');
	Route::get('/returns/new/{invoice_id?}', 'ReturnsCtrl@addNew');
	Route::post('/returns', 'ReturnsCtrl@create');
	Route::get('/returns/{return}/edit', 'ReturnsCtrl@edit');
	Route::patch('/returns/{return}/', 'ReturnsCtrl@update');
	Route::delete('/returns/{return}/', 'ReturnsCtrl@delete');
});