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
        Schema::create('metode_kbs', function (Blueprint $table) {
            $table->string('id', 5)->primary(); // Untuk nyimpen M01, M02
            $table->string('nama_metode');      // Untuk nyimpen nama KB
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metode_kbs');
    }
};
