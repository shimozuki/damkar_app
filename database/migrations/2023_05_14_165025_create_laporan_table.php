<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->unsignedBigInteger('id_kebakaran');
            $table->string('nomor');
            $table->enum('sifat', ['Biasa']);
            $table->string('lampiran')->nullable();
            $table->string('perihal');
            $table->date('tgl_buat');
            $table->timestamps();

            $table->foreign('id_kebakaran')->references('id')->on('kebakaran')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};