<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Supplier;

class SuppliersCtrl extends Controller
{
    public function index() {
    	$suppliers = Supplier::all();
    	return view('suppliers.index', ['suppliers' => $suppliers]);
    }
    public function view(Supplier $supplier) {
    	return view('suppliers.view', ['supplier' => $supplier]);
    }
    public function new() {
    	return view('suppliers.new');
    }
    public function create(Request $request) {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'email'
    	]);
    	$supplier = new Supplier;
    	$supplier->create($request->all());
    	return redirect('/suppliers/' . $supplier->id);
    }
    public function edit(Supplier $supplier) {
    	return view('suppliers.edit', ['supplier' => $supplier]);
    }
    public function update(Request $request, Supplier $supplier) {
    	$supplier->update($request->all());
    	return redirect('/suppliers/' . $supplier->id);
    }
    public function delete(Supplier $supplier) {
    	$supplier->delete();
    	return redirect('/suppliers/');
    }


    public function viewInvoices(Supplier $supplier) {
        return view('pi.index', ['pis' => $supplier->performa_invoices]);
    }
}
