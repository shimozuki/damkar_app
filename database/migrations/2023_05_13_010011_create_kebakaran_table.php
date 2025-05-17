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
        Schema::create('kebakaran', function (Blueprint $table) {
            $table->id();
            $table->string('pelapor')->nullable();
            $table->text('alamat');
            $table->string('asal_api');
            $table->string('spk_kembali');
            $table->string('jenis');
            $table->string('pemilik');
            $table->date('tanggal');
            $table->datetime('waktu_mulai');
            $table->datetime('waktu_selesai');
            $table->string('wilayah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebakaran');
    }
};
