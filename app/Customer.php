<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'address', 'telephone', 'email'];

    protected $dates = ['deleted_at'];

    public function sales_invoices() {
    	return $this->hasMany('App\SalesInvoice');
    }
    public function receipts() {
    	return $this->hasMany('App\Receipt');
    }
    public function return_inwards() {
    	return $this->hasMany('App\ReturnInward');
    }
}
