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
        Schema::create('pelatihans', function (Blueprint $table) {
            $table->id();
            $table->string('judul')->nullable();
            $table->string('id_kategori')->nullable();
            $table->string('slug')->nullable();

            $table->string('image')->nullable();
            $table->string('tanggal')->nullable();
            $table->string('status')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('materi')->nullable();
            $table->string('tujuan')->nullable();
            $table->string('instruktur')->nullable();
            $table->string('file')->nullable();
            $table->string('harga')->nullable();
            $table->string('keterangan')->nullable();

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
        Schema::dropIfExists('pelatihans');
    }
};
