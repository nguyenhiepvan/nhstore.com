<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Bảng nhà cung cấp sản phẩm
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('tên nhà cung cấp');
            // $table->string('acronym')->comment('viết tắt');
            $table->string('slug')->comment('đường dẫn');
            $table->string('phone')->comment('số điện thoại');
            $table->string('address')->comment('địa chỉ');
            $table->string('tax_code')->nullable()->comment('mã số thuế');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('suppliers');
    }
}
