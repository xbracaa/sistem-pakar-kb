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
        Schema::create('aturans', function (Blueprint $table) {
            $table->id();
            $table->string('id_aturan', 5); // Untuk R01, R02
            $table->string('premis');       // Untuk K01 AND K02
            $table->string('konklusi');     // Untuk M01, M02
            $table->string('kategori_mec', 10)->nullable();
            $table->float('cf_pakar');      // Untuk nilai 0.90, -1.00
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aturans');
    }
};
