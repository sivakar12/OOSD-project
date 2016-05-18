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
    public function addNew() {
    	return view('suppliers.new');
    }
    public function create(Request $request) {
    	$this->validate($request, [
    		'name' => 'required',
    		'email' => 'email',
            'telephone' => 'digits_between:9,13',
            'website' => 'url'
    	]);
    	$supplier = new Supplier;
    	$supplier->create($request->all());
        Log::info("New supplier is created" . $request->name);
    	return redirect('/suppliers/' . $supplier->id);
    }
    public function edit(Supplier $supplier) {
    	return view('suppliers.edit', ['supplier' => $supplier]);
    }
    public function update(Request $request, Supplier $supplier) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'telephone' => 'digits_between:9,13',
            'website' => 'url'
        ]);
    	$supplier->update($request->all());
        Log::info("A supplier is changed" . $supplier->name);
    	return redirect('/suppliers/' . $supplier->id);
    }
    public function delete(Supplier $supplier) {
    	$supplier->delete();
        Log::info("New supplier is deleted" . $supplier->name);
    	return redirect('/suppliers/');
    }


    public function viewInvoices(Supplier $supplier) {
        return view('pi.index', ['pis' => $supplier->performa_invoices]);
    }
    public function viewOrders(Supplier $supplier) {
        return view('po.index', ['pos' => $supplier->purchase_orders]);
    }
}
