<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsReciptTable extends Migration
{
    /**
     * Bảng danh sách sản phẩm trong hóa đơn bán
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_recipt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('recipt_id')->unsigned()->comment('Hóa đơn');
            $table->bigInteger('product_id')->unsigned()->comment('sản phẩm');
            $table->integer('quantitys')->comment('số lượng');
            $table->foreign('recipt_id')->references('id')->on('recipts');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('products_recipt');
    }
}
