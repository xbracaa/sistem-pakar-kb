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
        Schema::create('kondisis', function (Blueprint $table) {
            $table->string('id', 5)->primary(); // Untuk nyimpen K01, K02
            $table->string('nama_kondisi');     // Untuk nyimpen nama gejalanya
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisis');
    }
};
