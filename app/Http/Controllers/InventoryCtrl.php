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
    public function new() {
    	return view('inventory.new');
    }
    public function create(Request $request) {
    	$item = new InventoryItem;
    	$item->create($request->all());
    	return redirect('/inventory/' . $item->id);
    }
    public function edit(InventoryItem $item) {
    	return view('inventory.edit', ['item' => $item]);
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
