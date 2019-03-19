<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTCelana extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_celana', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_celana',150);
            $table->string('ukuran_celana',5);
            $table->string('bahan',150);
            $table->string('tipe_celana',150);
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
        Schema::dropIfExists('t_celana');
    }
}
