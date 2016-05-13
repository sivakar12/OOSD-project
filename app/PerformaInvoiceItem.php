<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerformaInvoiceItem extends Model
{
	use SoftDeletes;
	
    protected $fillable = ['performa_invoice_id', 'type', 'brand', 
    	'model', 'year', 'description', 'quantity', 'price'];

    protected $dates = ['deleted_at'];

    public function invoice() {
    	$this->belongsTo('App\PerformaInvoice');
    }
}
