<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryItem extends Model
{
    use SoftDeletes;
	
    protected $fillable = [
    	'type', 'chassis_number', 'manufacturers_part',
    	'year', 'manufacturer', 'model',
    	'body_type', 'primary_color', 'engine_number',
    	'milage', 'transmission', 'engine_capacity',
    	'cylinders', 'fuel_type',
    	'purchase_cost', 'sales_price',
    ];

    protected $dates = ['deleted_at'];

}
