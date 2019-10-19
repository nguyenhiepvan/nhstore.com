<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSizeColumnImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->string('242X314')->nullable();
            $table->string('255X311')->nullable();
            $table->string('263X341')->nullable();
            $table->string('75X75')->nullable();
            $table->string('394X511')->nullable();
            $table->string('470X610')->nullable();
            $table->boolean('is_thumbnail')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn(['242X314','255X311','263X341','75X75','394X511','470X610','is_thumbnail']);
        });
    }
}
