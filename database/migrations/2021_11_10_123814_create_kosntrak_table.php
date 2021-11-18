<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKosntrakTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kosntrak', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('nama_tempat');
            $table->string('alamat');
            $table->string('maps');
            $table->string('keterangan');
            $table->integer('harga_sewa');
            $table->string('gambar');
            $table->string('status_kamar');
            $table->string('status_kamarmandi');
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
        Schema::dropIfExists('kosntrak');
    }
}
