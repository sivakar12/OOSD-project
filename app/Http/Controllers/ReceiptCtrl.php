<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Receipt;
use App\SalesInvoice;

use Log;

class ReceiptCtrl extends Controller
{
    public function index() {
    	$all = Receipt::all();
    	return view('receipts.index', ['receipts' => $all]);
    }
    public function view(Receipt $receipt) {
    //     return $receipt;
    	return view('receipts.view', ['receipt' => $receipt]);
    }
    public function addNew($invoice_id = null) {
    	$invoice = null;
    	if($invoice_id) {
    		$invoice  = SalesInvoice::where('id', $invoice_id)->get()->first();
    	}
    	return view('receipts.new', ['invoice' => $invoice]);
    }
    public function create(Request $request) {
        $this->validate($request, [
            'amount' => 'required|integer|min:1',
            'sales_invoice_id' => 'exists:sales_invoices,id',

        ]);
        $receipt = new Receipt;
        $receipt->sales_invoice_id = $request->sales_invoice_id;
        $c_id = SalesInvoice::where('id', $request->sales_invoice_id)->first()->customer_id;
        $receipt->customer_id = $c_id;
        $receipt->amount = $request->amount;
        $receipt->payment_type = $request->payment_type;
        $receipt->save();
        return redirect('/receipts/' . $receipt->id);
    }
    public function edit(Receipt $receipt) {
        return view('receipts.edit', ['receipt' => $receipt]);
    }
    public function update(Request $request, Receipt $receipt) {
        $this->validate($request, [
            'amount' => 'required|integer|min:1',
            'sales_invoice_id' => 'exists:sales_invoices,id',

        ]);
        $receipt->update($request->all());
        return redirect('/receipts/' . $receipt->id);
    }
    public function delete(Receipt $receipt) {
        $receipt->delete();
        return redirect('/receipts');
    }

}
