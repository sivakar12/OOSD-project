<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Customer;

class CustomersCtrl extends Controller
{
    public function index() {
    	$customers = Customer::all();
    	return view('customers.index', ['customers' => $customers]);
    }
    public function view(Customer $customer) {
    	return view('customers.view', ['customer' => $customer]);
    }
    public function new() {
    	return view('customers.new');
    }
    public function create(Request $request) {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'email'
    	]);
    	$customer = new Customer;
    	$customer->create($request->all());
    	return redirect('/customers/' . $customer->id);
    }
    public function edit(Customer $customer) {
    	return view('customers.edit', ['customer' => $customer]);
    }
    public function update(Request $request, Customer $customer) {
    	$customer->update($request->all());
    	return redirect('/customers/' . $customer->id);
    }
    public function delete(Customer $customer) {
    	$customer->delete();
    	return redirect('/customers/');
    }
}
