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
        Schema::create('lombas', function (Blueprint $table) {
            $table->string('idLomba')->primary();
            $table->string('namaLomba');
            $table->string('kategoriLomba');
            $table->integer('kapasitas');
            $table->date('batasPendaftaran');
            $table->string('penyelenggara');
            $table->string('biaya');
            $table->string('deskripsi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lombas');
    }
};
