<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Bảng admin
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('avatar',255)->nullable()->comment('ảnh nhà tuyển dụng');
            $table->string('email');
            $table->string('quote')->nullable();
            $table->string('facebook')->nullable();
            $table->string('google')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('note')->nullable();
            $table->string('phone',11)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default('false');
            $table->rememberToken();
            $table->boolean('is_actived')->default(false)->comment('tình trạng hoạt động của tài khoản: 1: hoạt động, 0: không, mặc định là 0');
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
        Schema::dropIfExists('users');
    }
}
