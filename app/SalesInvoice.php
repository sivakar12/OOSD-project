<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesInvoice extends Model
{
    use SoftDeletes;

    protected $fillable = ['customer_id', 'chassis_number', 'make', 'model',
    	'year', 'engine_number', 'color', 'milage', 'body_type',
    	'fuel_type', 'engine_capacity', 'price', 'purchase_method', 'deposit'];

    protected $dates = ['deleted_at'];

    public function customer() {
    	return $this->belongsTo('App\Customer');
    }
    public function receipts() {
    	return $this->hasMany('App\Receipt');
    }
    public function returns() {
    	return $this->hasMany('App\ReturnInward');
    }
    public function due_amount() {
        $receipt_total = 0;
        foreach($this->receipts as $receipt) {
            $receipt_total += $receipt->amount;
        }
        return $this->price - $this->deposit - $receipt_total;
    }
}
