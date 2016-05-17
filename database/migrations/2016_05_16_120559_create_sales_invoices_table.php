<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');

            $table->string('chassis_number');
            $table->string('make');
            $table->string('model');
            $table->integer('year');
            $table->bigInteger('engine_number');
            $table->string('color');
            $table->decimal('milage', 10, 3);
            $table->string('body_type');
            $table->string('fuel_type');
            $table->string('engine_capacity');
            
            $table->decimal('price', 12, 2);
            $table->string('purchase_method');
            $table->decimal('deposit', 12, 2);
            
            $table->timestamps();
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
        Schema::drop('sales_invoices');
    }
}
