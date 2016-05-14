<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'address', 'telephone', 'email', 'website'];

    protected $dates = ['deleted_at'];

    public function performa_invoices() {
    	return $this->hasMany('App\PerformaInvoice');
    }

    public function purchase_orders() {
    	return $this->hasMany('App\PurchaseOrder');
    }
}
