<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrderItem extends Model
{
    use SoftDeletes;
	
    protected $fillable = ['purchase_order_id', 'type', 'brand', 
    	'model', 'year', 'description', 'quantity', 'price'];

    protected $dates = ['deleted_at'];

    public function order() {
    	return $this->belongsTo('App\PurchaseOrder');
    }}
