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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kode_pemesanan')->nullable();
            $table->string('id_pemesanan')->unique();
            $table->unsignedBigInteger('id_besi');
            $table->string('nama_motif');
            $table->string('harga_motif');
            $table->foreignId('provinsi')->nullable();
            $table->foreignId('kabupaten')->nullable();
            $table->foreignId('kecamatan')->nullable();
            $table->foreignId('desa')->nullable();
            $table->enum('status', ['0', '1'])->nullable();
            $table->string('jumlah');
            $table->string('harga');
            $table->timestamps();

            $table->foreign('id_besi')->references('id')->on('besis')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanans');
    }
};
