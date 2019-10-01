<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Bảng thương hiệu sản phẩm
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('tên thương hiệu');
            $table->string('acronym')->comment('viết tắt');
            $table->string('slug')->comment('đường dẫn');
            $table->bigInteger('origin')->unsigned()->comment('xuất xứ thương hiệu');
            $table->foreign('origin')->references('id')->on('countries');
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
        Schema::dropIfExists('brands');
    }
}
