<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnInward extends Model
{
    use SoftDeletes;

    protected $fillable = [];

    protected $dates = ['deleted_at'];

    public function customer() {
    	return $this->belongsTo('App\Customer');
    }
    public function sales_invoice() {
    	return $this->belongsTo('App\SalesInvoice'):
    }
}
