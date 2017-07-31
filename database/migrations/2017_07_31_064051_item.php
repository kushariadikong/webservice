<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Item extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
               Schema::create('item', function (Blueprint $table) {
            $table->increments('no_resi')->unique();
            $table->string('nama_item');
            $table->string('nama_penerima');
            $table->string('nama_pengirim');
            $table->string('alamat_pengirim');
            $table->text('alamat_penerima');
            $table->string('nomor_telepon_penerima');
            $table->string('nomor_telepon_pengantar');
            $table->integer('berat');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
