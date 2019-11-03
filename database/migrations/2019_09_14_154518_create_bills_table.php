<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Bảng hóa đơn bán hàng (dành cho khách hàng)
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->comment('mã hóa đơn');
            $table->string('customer_id')->comment('khách hàng');
            $table->string('message')->comment('lời nhắn');
            $table->bigInteger('amount')->comment('Thành tiền');
            $table->integer('is_confirmed')->default(0)->comment('xác thực đơn hàng: 1 xác thực, 0 không xác thực');
            $table->integer('payment_status')->comment('trạng thái thanh toán: 1 đã thanh toán, 0 chưa thanh toán');
            $table->integer('status')->comment('trạng thái hóa đơn: 1 hoàn thành, 0 đã hủy,2 đang vận chuyển');
            $table->bigInteger('user_id')->unsigned()->nullable()->comment('Người xác thực thanh toán (trong trường hợp khách hàng thanh toán bằng tiền mặt) nếu thanh toán bằng thẻ mặc định là null');
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
