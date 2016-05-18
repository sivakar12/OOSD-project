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
            'chassis_number' => 'unique:inventory_items,chassis_number',
        ]);
    	$item = new InventoryItem;
    	$item->create($request->all());
    	return redirect('/inventory/' . $item->id);
    }
    public function edit(InventoryItem $item) {
    	return view('inventory.form', ['item' => $item, 'edit' => true]);
    }
    public function update(Request $request, InventoryItem $item) {
    	$item->update($request->all());
    	return redirect('/inventory/' . $item->id);
    }
    public function delete(InventoryItem $item) {
    	$item->delete();
    	return redirect('/inventory/');
    }
}
