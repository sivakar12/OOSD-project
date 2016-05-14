<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerformaInvoice extends Model
{
    use SoftDeletes;

    protected $fillable = ['supplier_id'];

    protected $dates = ['deleted_at'];

    public function supplier() {
    	return $this->belongsTo('App\Supplier');
    }
    public function items() {
    	return $this->hasMany('App\PerformaInvoiceItem');
    }
}
