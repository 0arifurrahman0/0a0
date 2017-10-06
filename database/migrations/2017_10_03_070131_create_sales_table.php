<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('customer_id');
            $table->integer('sale_invoiceNo')->nullable();
            $table->string('sale_status');
            $table->date('sale_date')->nullable();
            $table->integer('sale_cartoon')->nullable();
            $table->string('sale_quantity');
            $table->float('sale_rate');
            $table->float('sale_total')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
