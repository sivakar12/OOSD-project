<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SalesInvoice;
use App\InventoryItem;
use App\Customer;

class SICtrl extends Controller
{
    public function index() {
        $all = SalesInvoice::all();
        return view('si.index', ['sis' => $all]);
    }
    public function view(SalesInvoice $si) {
        $receipt_total = 0;
        foreach($si->receipts as $receipt) {
            $receipt_total += $receipt->amount;
        }
        return view('si.view', ['si' => $si, 'receipt_total' => $receipt_total]);
    }
    public function addNew($chassis_number = null) {
        $all_customers = Customer::all();
        $vehicle = null;
        if ($chassis_number) {
            $vehicle = InventoryItem::where(
                'chassis_number', $chassis_number)->get()->first();
        }
        return view('si.new', ['customers' => $all_customers,
            'vehicle' => $vehicle]);
    }
    public function create(Request $request) {
        //return 'creating sit with customer_id ' . $request->customer_id . 
        //    ' and chassis_number ' . $request->chassis_number;
        $vehicle = InventoryItem::where('chassis_number', $request->chassis_number)
            ->get()->first();
        
        $si = new SalesInvoice;
        $si->customer_id = $request->customer_id;
        $si->chassis_number = $request->chassis_number;

        $si->make = $vehicle->manufacturer;
        $si->model = $vehicle->model;
        $si->year = $vehicle->year;
        $si->engine_number = $vehicle->engine_number;
        $si->color = $vehicle->primary_color;
        $si->milage = $vehicle->milage;
        $si->body_type = $vehicle->body_type;
        $si->fuel_type = $vehicle->fuel_type;
        $si->engine_capacity = $vehicle->engine_capacity;

        $si->price = $request->price;
        $si->purchase_method = $request->purchase_method;
        $si->deposit = $request->deposit;
        $si->save();
        return redirect('/si/'. $si->id);
    }
    public function edit(SalesInvoice $si) {
        return view('si.edit');
    }
    public function update(Request $request, SalesInvoice $si) {
        $si->update($request->all());
        return redirect('/si/' . $si->id);
    }

    public function viewReceipts(SalesInvoice $si) {
        return view('receipts.index', ['receipts' => $si->receipts]);
    }
    public function viewReturns(SalesInvoice $si) {
        return view('returns.index', ['returns' => $si->returns]);
    }
    public function delete(SalesInvoice $si) {
        foreach($si->receipts as $receipt) {
            $receipt->delete();
        }foreach($si->returns as $return) {
            $return->delete();
        }
        $si->delete();
        return redirect('/si');
    }
}
