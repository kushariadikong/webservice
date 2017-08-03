<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Schedule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schedule', function (Blueprint $table){
        $table->increments('id')->unique();
        $table->string('item_detail');
        $table->text('lokasi');
        $table->integer('no_resi');
        $table->integer('id_kurir');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('schedule');
    }
}
