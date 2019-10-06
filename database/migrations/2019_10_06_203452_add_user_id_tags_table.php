<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tags', function (Blueprint $table) {
         $table->unsignedBigInteger('user_id');
         $table->foreign('user_id')->references('id')->on('users');
         $table->timestamp('deleted_at')->nullable();
         $table->string('acronym');
         $table->string('slug');
     });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tags', function (Blueprint $table) {
          $table->dropForeign(['user_id']);
          $table->dropColumn(['user_id','deleted_at','acronym','slug']);
      });
    }
}
