<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformaInvoiceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performa_invoice_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('performa_invoice_id');
            $table->string('type');
            $table->string('brand');
            $table->string('model');
            $table->integer('year');
            $table->string('description');
            $table->integer('quantity');
            $table->decimal('price');
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
        Schema::drop('performa_invoice_items');
    }
}
