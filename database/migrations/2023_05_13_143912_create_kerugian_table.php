<?php

use App\Models\Kebakaran;
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
        Schema::create('kerugian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kebakaran');
            $table->string('korban_manusia');
            $table->string('benda');
            $table->timestamps();

            $table->foreign('id_kebakaran')->references('id')->on('kebakaran')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerugian');
    }
};