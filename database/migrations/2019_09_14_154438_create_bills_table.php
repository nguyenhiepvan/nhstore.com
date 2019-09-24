<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Bảng hóa đơn nhập sản phẩm
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->comment('mã hóa đơn');
            $table->bigInteger('product_id')->unsigned()->comment('sản phẩm');
            $table->bigInteger('color_id')->unsigned()->comment('Màu sắc');
            $table->bigInteger('material_id')->unsigned()->comment('Chất liệu');
            $table->bigInteger('brand_id')->unsigned()->comment('Thương hiệu');
            $table->bigInteger('country_id')->unsigned()->comment('Xuất sứ');
            $table->bigInteger('supplier_id')->unsigned()->comment('Nhà cung cấp');
            $table->bigInteger('quantitys')->comment('số lượng');
            $table->bigInteger('prices')->comment('Giá cả');
            $table->bigInteger('user_id')->unsigned()->comment('Người nhập');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('color_id')->references('id')->on('colors');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('bills');
    }
}
