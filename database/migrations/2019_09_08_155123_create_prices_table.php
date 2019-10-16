<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Bảng giá sản phẩm
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned()->comment('sản phẩm');
            $table->foreign('product_id')->references('id')->on('products');
            $table->bigInteger('in_price')->comment('giá nhập');
            $table->bigInteger('out_price')->comment('giá bán');
            $table->bigInteger('general_price')->nullable()->comment('giá thị trường');
            $table->bigInteger('sale_price')->comment('giá khuyến mãi')->nullable();
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
        Schema::dropIfExists('prices');
    }
}
