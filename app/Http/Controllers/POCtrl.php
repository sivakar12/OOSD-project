<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\PurchaseOrder;
use App\PurchaseOrderItem;
use App\PerformaInvoice;

use Log;

class POCtrl extends Controller
{
    public function index() {
		$all = PurchaseOrder::all();
		return view('po.index', ['pos' => $all]);
	}
	public function view(PurchaseOrder $po) {
		$total = 0;
		foreach ($po->items as $item) {
			$total += $item->quantity * $item->price;
		}
		return view('po.view', ['po' => $po, 'total' => $total, 'edit' => false]);
	}
	public function edit(PurchaseOrder $po) {
		$total = 0;
		foreach ($po->items as $item) {
			$total += $item->quantity * $item->price;
		}
		return view('po.view', ['po' => $po, 'total' => $total, 'edit' => true]);
	}
	public function addNew() {
		$invoices = PerformaInvoice::all();
		return view('po.new', ['invoices' => $invoices]);
	}
	public function create(Request $request) {
		$this->validate($request, [
			'performa_invoice_id' => 'exists:performa_invoices,id'
		]);
		$po = new PurchaseOrder;
		$po->performa_invoice_id = $request->performa_invoice_id;
		$po->supplier_id = 
			PerformaInvoice::find($request->performa_invoice_id)->supplier_id;
		$po->save();

		$items_to_add = $po->performa_invoice->items;
		foreach($items_to_add as $item) {
			$po->items()->create($item->getAttributes());
		}
        Log::info("A PO is created for PI" . $request->performa_invoice_id);
		return redirect('/po/edit/' . $po->id);
	}
	public function delete(PurchaseOrder $po) {
		$po->delete();
        Log::info("A PO item is deleted" . $po->id);
		return redirect('/po/');
	}
	public function addItem(Request $request, PurchaseOrder $po) {
		$this->validate($request, [
			'brand' => 'required',
			'model' => 'required',
			'year' => 'digits:4',
			'quantity' => 'required|integer|min:1',
			'price' => 'required|integer|min:1',
		]);
		$po->items()->create($request->all());
        Log::info("A new item is added to PO" . $po->id);
		return redirect('/po/edit/' . $po->id);
	}
	public function removeItem(PurchaseOrder $po, PurchaseOrderItem $poi) {
        Log::info("A PO item is removed" . $po->id);
		$poi->delete();
		return redirect('/po/edit/'. $po->id);
	}
}
