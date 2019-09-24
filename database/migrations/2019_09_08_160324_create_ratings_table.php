<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatingsTable extends Migration
{
    /**
     * Bảng đánh giá của khách hàng về sản phẩm
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned()->comment('id sản phẩm');
            $table->foreign('product_id')->references('id')->on('products');
            $table->bigInteger('customer_id')->unsigned()->comment('id khách hàng');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('rate')->comment('đánh giá sản phẩm');
            $table->mediumText('comment')->comment('bình luận sản phẩm');
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
        Schema::dropIfExists('ratings');
    }
}
