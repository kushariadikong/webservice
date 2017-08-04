<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pengirim extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengirim', function (Blueprint $table) {
              $table->increments('id')->unique();
              $table->string('nama');
              $table->string('nomor_telepon');
              $table->string('alamat');
              $table->integer('ktp')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengirim');
    }
}
