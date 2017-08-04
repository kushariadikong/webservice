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
            $table->integer('no_resi');
            $table->increments('id_item');
            $table->string('nama_penerima');
            $table->text('alamat_penerima');
            $table->string('nomor_telepon_penerima');
            $table->integer('id_pengantar')->unsigned();
            $table->integer('berat');
            $table->integer('biaya');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('item');
    }
}
