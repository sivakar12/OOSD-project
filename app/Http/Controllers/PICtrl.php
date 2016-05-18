<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\PerformaInvoice;
use App\PerformaInvoiceItem;
use App\Supplier;

class PICtrl extends Controller
{
    public function index() {
		$all = PerformaInvoice::all();
		return view('pi.index', ['pis' => $all]);
	}
	public function view(PerformaInvoice $pi) {
		$total = 0;
		foreach ($pi->items as $item) {
			$total += $item->quantity * $item->price;
		}
		return view('pi.view', ['pi' => $pi, 'total' => $total, 'edit' => false]);
	}
	public function edit(PerformaInvoice $pi) {
		$total = 0;
		foreach ($pi->items as $item) {
			$total += $item->quantity * $item->price;
		}
		return view('pi.view', ['pi' => $pi, 'total' => $total, 'edit' => true]);
	}
	public function addNew() {
		$suppliers = Supplier::all();
		return view('pi.new', ['suppliers' => $suppliers]);
	}
	public function create(Request $request) {
		$this->validate($request, [
			'supplier_id' => 'required|exists:suppliers,id',
		]);
		$pi = new PerformaInvoice;
		$pi->supplier_id = $request->supplier_id;
		$pi->save();
		return redirect('/pi/edit/' . $pi->id);
	}
	public function delete(PerformaInvoice $pi) {
		$pi->delete();
		return redirect('/pi/');
	}
	public function addItem(Request $request, PerformaInvoice $pi) {
		$this->validate($request, [
			'brand' => 'required',
			'model' => 'required',
			'year' => 'digits:4',
			'quantity' => 'required|integer|min:1',
			'price' => 'required|min:1',
		]);
		$pi->items()->create($request->all());
		return redirect('/pi/edit/' . $pi->id);
	}
	public function removeItem(PerformaInvoice $pi, PerformaInvoiceItem $pii) {
		$pii->delete();
		return redirect('/pi/edit/'. $pi->id);
	} 
}
