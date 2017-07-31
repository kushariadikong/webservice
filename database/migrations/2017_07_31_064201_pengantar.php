<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Pengantar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengantar', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('nama');
            $table->string('nomor_telepon');
            $table->text('alamat');
            $table->string('ktp');
            $table->string('jenis_kelamin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengantar', function (Blueprint $table) {
            //
        });
    }
}
