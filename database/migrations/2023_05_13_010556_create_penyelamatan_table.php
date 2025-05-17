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
        Schema::create('penyelamatan', function (Blueprint $table) {
            $table->id();
            $table->string('anggota');
            $table->string('armada');
            $table->string('pelapor');
            $table->string('jenis');
            $table->date('tanggal');
            $table->time('waktu');
            $table->string('lokasi');
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyelamatan');
    }
};
