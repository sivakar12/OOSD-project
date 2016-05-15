<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventory_items', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            
            $table->string('type');
            $table->string('chassis_number');
            $table->string('manufacturers_part');


            $table->string('year');
            $table->string('manufacturer');
            $table->string('model');

            $table->string('body_type');
            $table->string('primary_color');
            $table->string('engine_number');

            $table->string('milage');
            $table->string('transmission');
            $table->string('engine_capacity');

            $table->string('cylinders');
            $table->string('fuel_type');

            $table->string('purchase_cost');
            $table->string('sales_price');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('inventory_items');
    }
}
