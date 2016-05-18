<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Voucher;

use Log;

class VouchersCtrl extends Controller
{
    public function index() {
    	$vouchers = Voucher::all();
    	return view('vouchers.index', ['vouchers' => $vouchers]);
    }
    public function view(Voucher $voucher) {
    	return view('vouchers.view', ['voucher' => $voucher]);
    }
    public function addNew() {
    	return view('vouchers.new');
    }
    public function create(Request $request) {
        $this->validate($request, [
            'vendor' => 'required',
            'amount' => 'required|integer|min:1'
        ]);
    	$voucher = new Voucher;
    	$voucher->create($request->all());
    	return redirect('/vouchers/' . $voucher->id);
    }
    public function edit(Voucher $voucher) {
    	return view('vouchers.edit', ['voucher' => $voucher]);
    }
    public function update(Request $request, Voucher $voucher) {
        $this->validate($request, [
            'vendor' => 'required',
            'amount' => 'required|integer|min:1'
        ]);
    	$voucher->update($request->all());
    	return redirect('/vouchers/' . $voucher->id);
    }
    public function delete(Voucher $voucher) {
    	$voucher->delete();
    	return redirect('/vouchers/');
    }
}
