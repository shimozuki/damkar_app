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
        Schema::table('penyelamatan', function (Blueprint $table) {
            $table->text('deskripsi')->nullable()->after('lokasi');
            $table->string('status')->nullable()->after('deskripsi');
            $table->double('latitude')->nullable()->after('status');
            $table->double('longitude')->nullable()->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penyelamatan', function (Blueprint $table) {
            $table->dropColumn(['deskripsi', 'status', 'latitude', 'longitude']);
        });
    }
};
