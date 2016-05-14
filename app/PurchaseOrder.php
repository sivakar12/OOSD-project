<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use SoftDeletes;
    protected $fillable = ['supplier_id','performa_invoice_id'];

    protected $dates = ['deleted_at'];

    public function supplier() {
    	return $this->belongsTo('App\Supplier');
    }
    public function performa_invoice() {
    	return $this->belongsTo('App\PerformaInvoice');
    }
    public function items() {
    	return $this->hasMany('App\PurchaseOrderItem');
    }
}
