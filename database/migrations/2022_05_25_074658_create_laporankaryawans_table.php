<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporankaryawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_anggota');
            $table->unsignedBigInteger('id_pemesanan');
            $table->date('tgl_lokasi');
            $table->unsignedBigInteger('id_ukuran')->nullable();
            $table->string('hargaukuran')->nullable();
            $table->string('rangeukuran')->nullable();
            $table->string('panjang')->nullable();
            $table->string('lebar')->nullable();
            $table->timestamps();

            $table->foreign('id_anggota')->references('id')->on('karyawans')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ukuran')->references('id')->on('ukuranbesis')->onDelete('cascade');
            $table->foreign('id_pemesanan')->references('id')->on('pemesanans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporankaryawans');
    }
};
