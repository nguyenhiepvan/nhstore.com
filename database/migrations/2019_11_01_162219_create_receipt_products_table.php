<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipt_products', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->bigInteger('product_id')->unsigned()->comment('sản phẩm');
           $table->bigInteger('color_id')->unsigned()->comment('Màu sắc');
           $table->bigInteger('size_id')->unsigned()->comment('kích thước');
           $table->bigInteger('quantitys')->comment('số lượng');
           $table->bigInteger('price')->comment('đơn giá');
           $table->foreign('product_id')->references('id')->on('products');
           $table->foreign('color_id')->references('id')->on('colors');
           $table->foreign('size_id')->references('id')->on('sizes');
           $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receipt_products');
    }
}
