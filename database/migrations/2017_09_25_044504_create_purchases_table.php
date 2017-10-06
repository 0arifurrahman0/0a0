<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('supplier_id');
            $table->integer('purchase_invoiceNo')->nullable();
            $table->string('purchase_status');
            $table->date('purchase_date')->nullable();
            $table->integer('purchase_cartoon')->nullable();
            $table->string('purchase_quantity');
            $table->float('purchase_rate');
            $table->float('purchase_total')->nullable();
            $table->integer('edited_by')->nullable();
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
        Schema::dropIfExists('purchases');
    }
}
