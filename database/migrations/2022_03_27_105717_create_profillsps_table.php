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
        Schema::create('profillsps', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->text('tentang')->nullable();
            $table->text('legalitas')->nullable();
            $table->text('ruang_lingkup')->nullable();
            $table->text('landasan_hukun')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('mutu')->nullable();
            $table->text('lokasi')->nullable();
            $table->text('alamat')->nullable();
            $table->string('email')->nullable();
            $table->string('no')->nullable();
            $table->string('facebook')->nullable();
            $table->string('ig')->nullable();
            $table->string('twitter')->nullable();
            $table->string('wa')->nullable();
            $table->text('linkregister')->nullable();


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
        Schema::dropIfExists('profillsps');
    }
};
