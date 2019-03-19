<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTBaju extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_baju', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_baju',150);
            $table->string('ukuran_baju',5);
            $table->string('bahan',150);
            $table->string('tipe_baju',150);
            $table->integer('stok');
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
        Schema::dropIfExists('t_baju');
    }
}
