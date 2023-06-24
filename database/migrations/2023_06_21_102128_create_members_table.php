<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->unsignedBigInteger('idPengguna');
            $table->foreign('idPengguna')
                ->references('idPengguna')
                ->on('users')
                ->onDelete('cascade')
                ->name('fk_members_idPengguna');
            $table->string('namaMember');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
}
