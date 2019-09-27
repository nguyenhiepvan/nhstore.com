<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Bảng sản phẩm
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('tên sản phẩm');
            $table->string('SKU')->comment('mã sản phẩm');
            $table->string('slug')->comment('đường dẫn sản phẩm');
            $table->bigInteger('material_id')->unsigned()->comment('chất liệu sản phẩm');
            $table->bigInteger('brand_id')->unsigned()->comment('thương hiệu sản phẩm');
            $table->bigInteger('country_id')->unsigned()->comment('xuất sứ sản phẩm');
            $table->bigInteger('supplier_id')->unsigned()->comment('nhà cung cấp sản phẩm');
            $table->foreign('material_id')->references('id')->on('materials');
            $table->foreign('brand_id')->references('id')->on('brands');
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->boolean('status')->default(true)->comment('trạng thái hiển thị của sản phẩm');
            $table->timestamps();
            $table->timestamp('deleted_at')->default(null);
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
