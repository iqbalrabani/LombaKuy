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
        Schema::create('user_lombas', function (Blueprint $table) {
            $table->string('idLomba')
                ->references('idLomba')
                ->on('lombas')
                ->onDelete('cascade');
            $table->string('idPengguna')
                ->references('idPengguna')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_lombas');
    }
};
