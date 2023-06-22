<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTimsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_tims', function (Blueprint $table) {
            $table->unsignedBigInteger('idTim');
            $table->unsignedBigInteger('idPengguna');

            $table->foreign('idTim')
                ->references('idTim')
                ->on('tims')
                ->onDelete('cascade')
                ->name('fk_user_tims_idTim');

            $table->foreign('idPengguna')
                ->references('idPengguna')
                ->on('users')
                ->onDelete('cascade')
                ->name('fk_user_tims_idPengguna');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tims');
    }
};
