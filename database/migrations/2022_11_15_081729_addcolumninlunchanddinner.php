<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Addcolumninlunchanddinner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lunch_menus', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->string('description')->nullable();
        });

        Schema::table('dinner_menus', function (Blueprint $table) {
            $table->string('image')->nullable();
            $table->string('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lunch_menus', function (Blueprint $table) {
            //
        });

        Schema::table('dinner_menus', function (Blueprint $table) {
            //
        });
    }
}
