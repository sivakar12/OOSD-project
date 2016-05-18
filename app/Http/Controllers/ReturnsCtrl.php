<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\ReturnInward;
use App\SalesInvoice;

class ReturnsCtrl extends Controller
{
    public function index() {
    	$all = ReturnInward::all();
    	return view('returns.index', ['returns' => $all]);
    }
    public function view(ReturnInward $return) {
    	return view('returns.view', ['return' => $return]);
    }
    public function addNew($invoice_id = null) {
    	$invoice = null;
    	if($invoice_id) {
    		$invoice  = SalesInvoice::where('id', $invoice_id)->get()->first();
    	}
    	return view('returns.new', ['invoice' => $invoice]);
    }
    public function create(Request $request) {
        $return = new ReturnInward;
        $return->sales_invoice_id = $request->sales_invoice_id;
        $c_id = SalesInvoice::where('id', $request->sales_invoice_id)->first()->customer_id;
        $return->customer_id = $c_id;
        $return->save();
        return redirect('/returns/' . $return->id);
    }
    public function edit() {

    }
    public function update() {
        
    }
    public function delete(ReturnInward $return) {
        $return->delete();
        return redirect('/returns');
    }
}
