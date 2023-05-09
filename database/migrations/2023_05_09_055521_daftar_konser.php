<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DaftarKonser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_daftar_konser', function (Blueprint $table) {
            $table->increments('id_daftar');
            $table->string('ID', 5);
            $table->string('nama', 20);
            $table->string('telp', 15);
            $table->foreignId('id_user')->references('id')->on('users');
            $table->string('ket', 10);
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
        //
    }
}
