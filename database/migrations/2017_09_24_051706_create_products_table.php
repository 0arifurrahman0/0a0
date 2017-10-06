<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('subcategory_id')->nullable();
            $table->unsignedInteger('warehouse_id');
            $table->string('product_name');
            $table->string('product_code')->nullable();
            $table->string('product_unit')->nullable();
            $table->integer('product_alertquantity')->nullable();
            $table->float('product_supplierPrice');
            $table->float('product_sellPrice');
            $table->float('product_tax')->nullable();
            $table->text('product_details')->nullable();
            $table->text('product_detailsforinvoice')->nullable();
            $table->string('product_image')->nullable();
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
        Schema::dropIfExists('products');
    }
}
