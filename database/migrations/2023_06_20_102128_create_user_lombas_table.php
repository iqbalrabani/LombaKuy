<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLombasTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_lombas', function (Blueprint $table) {
            $table->unsignedBigInteger('idLomba');
            $table->unsignedBigInteger('idPengguna');

            $table->foreign('idLomba')
                ->references('idLomba')
                ->on('lombas')
                ->onDelete('cascade')
                ->name('fk_user_lombas_idLomba');

            $table->foreign('idPengguna')
                ->references('idPengguna')
                ->on('users')
                ->onDelete('cascade')
                ->name('fk_user_lombas_idPengguna');

            // Tambahkan kolom-kolom lainnya sesuai kebutuhan
            // $table->string('nama');
            // $table->integer('umur');

            $table->timestamps();
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
