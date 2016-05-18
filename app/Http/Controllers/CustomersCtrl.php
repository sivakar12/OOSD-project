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
    public function addNew() {
    	return view('customers.new');
    }
    public function create(Request $request) {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'email',
            'telephone' => 'digits_between:9,13',
            'address' => '',
    	]);
    	$customer = new Customer;
    	$customer->create($request->all());
        Log::info("New customer is created" . $request->name);
    	return redirect('/customers/' . $customer->id);
    }
    public function edit(Customer $customer) {
    	return view('customers.edit', ['customer' => $customer]);
    }
    public function update(Request $request, Customer $customer) {
    	$customer->update($request->all());
        Log::info("A customer is changed" . $customer->name);
    	return redirect('/customers/' . $customer->id);
    }
    public function delete(Customer $customer) {
        Log::info("New customer is deleted" . $customer->name);
    	$customer->delete();
    	return redirect('/customers/');
    }



    public function viewSalesInvoices(Customer $customer) {
        return view('si.index', ['sis' => $customer->sales_invoices]);
    }
    public function viewReceipts(Customer $customer) {
        return view('receipts.index', ['receipts' => $customer->receipts]);
    }
    public function viewReturns(Customer $customer) {
        return view('returns.index', ['returns' => $customer->return_inwards]);
    }
}
