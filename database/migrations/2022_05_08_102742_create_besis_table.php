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
        Schema::create('besis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_besi');
            $table->unsignedBigInteger('id_jenis_besi');
            $table->unsignedBigInteger('id_ukuran_besi');
            $table->timestamps();

            $table->foreign('id_jenis_besi')->references('id')->on('jenisbesis')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_ukuran_besi')->references('id')->on('ukuranbesis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('besis');
    }
};
