<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Voucher;

class Vouchers extends Controller
{
    public function index() {
    	$vouchers = Voucher::all();
    	return view('vouchers.index', ['vouchers' => $vouchers]);
    }
    public function view(Voucher $voucher) {
    	return view('vouchers.view', ['voucher' => $voucher]);
    }
    public function new() {
    	return view('vouchers.new');
    }
    public function create(Request $request) {
    	$voucher = new Voucher;
    	$voucher->create($request->all());
    	return redirect('/vouchers/' . $voucher->id);
    }
    public function edit(Voucher $voucher) {
    	return view('vouchers.edit', ['voucher' => $voucher]);
    }
    public function update(Request $request, Voucher $voucher) {
    	$voucher->update($request->all());
    	return redirect('/vouchers/' . $voucher->id);
    }
    public function delete(Voucher $voucher) {
    	$voucher->delete();
    	return redirect('/vouchers/');
    }
}
