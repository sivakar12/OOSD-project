<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\InventoryItem;

class InventoryCtrl extends Controller
{
	public function index() {
    	$items = InventoryItem::all();
    	return view('inventory.index', ['items' => $items]);
    }
    public function view(InventoryItem $item) {
    	return view('inventory.view', ['item' => $item]);
    }
    public function addNew() {
    	return view('inventory.form', ['edit' => false]);
    }
    public function create(Request $request) {
        $this->validate($request, [
            'chassis_number' => 'required|unique:inventory_items,chassis_number',
            'weight' => 'integer|min:1',
            'year' => 'digits:4',
            'manufacturer' => 'required',
            'model' => 'required',
            'engine_number' => 'required|digits_between:7,10',
            'milage' => 'integer|min:1',
            'engine_capacity' => 'integer|min:1',
            'cylinders' => 'integer|min:1',
            'purchase_cost' => 'required|integer|min:1',
            'sales_price' => 'required|integer|min:1',

        ]);
    	$item = new InventoryItem;
    	$item->create($request->all());
    	return redirect('/inventory/' . $item->id);
    }
    public function edit(InventoryItem $item) {
    	return view('inventory.form', ['item' => $item, 'edit' => true]);
    }
    public function update(Request $request, InventoryItem $item) {
        $this->validate($request, [
            'chassis_number' => 'required:exists:inventory_items,chassis_number',
            'weight' => 'integer|min:1',
            'year' => 'digits:4',
            'manufacturer' => 'required',
            'model' => 'required',
            'engine_number' => 'required|digits_between:7,10',
            'milage' => 'integer|min:1',
            'engine_capacity' => 'integer|min:1',
            'cylinders' => 'integer|min:1',
            'purchase_cost' => 'required|integer|min:1',
            'sales_price' => 'required|integer|min:1',

        ]);
    	$item->update($request->all());
    	return redirect('/inventory/' . $item->id);
    }
    public function delete(InventoryItem $item) {
    	$item->delete();
    	return redirect('/inventory/');
    }
}
