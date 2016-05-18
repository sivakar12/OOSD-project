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
            $table->bigInteger('chassis_number')->unique();
            $table->string('manufacturers_part');


            $table->string('year');
            $table->string('manufacturer');
            $table->string('model');

            $table->string('body_type');
            $table->string('primary_color');
            $table->bigInteger('engine_number');

            $table->decimal('milage', 10, 3);
            $table->string('transmission');
            $table->string('engine_capacity');

            $table->string('cylinders');
            $table->string('fuel_type');

            $table->decimal('purchase_cost', 12 ,2);
            $table->decimal('sales_price', 12, 2);

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
