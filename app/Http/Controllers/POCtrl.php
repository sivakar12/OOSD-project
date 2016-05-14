<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\PurchaseOrder;
use App\PurchaseOrderItem;
use App\PerformaInvoice;

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
	public function new() {
		$invoices = PerformaInvoice::all();
		return view('po.new', ['invoices' => $invoices]);
	}
	public function create(Request $request) {
		$po = new PurchaseOrder;
		$po->performa_invoice_id = $request->performa_invoice_id;
		$po->supplier_id = 
			PerformaInvoice::find($request->performa_invoice_id)->supplier_id;
		$po->save();

		$items_to_add = $po->performa_invoice->items;
		foreach($items_to_add as $item) {
			$po->items()->create($item->getAttributes());
		}
		return redirect('/po/edit/' . $po->id);
	}
	public function delete(PurchaseOrder $po) {
		$po->delete();
		return redirect('/po/');
	}
	public function addItem(Request $request, PurchaseOrder $po) {
		$po->items()->create($request->all());
		return redirect('/po/edit/' . $po->id);
	}
	public function removeItem(PurchaseOrder $po, PurchaseOrderItem $poi) {
		$poi->delete();
		return redirect('/po/edit/'. $po->id);
	}
}
