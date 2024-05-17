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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->unsignedBigInteger('kategoris_id');
            $table->foreign('kategoris_id')->references('id')->on('kategoris')->onDelete('cascade');
            $table->unsignedBigInteger('satuans_id');
            $table->foreign('satuans_id')->references('id')->on('satuans')->onDelete('cascade');
            $table->integer('jumlah');
            $table->integer('status_barang');
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
        Schema::dropIfExists('barangs');
    }
};
