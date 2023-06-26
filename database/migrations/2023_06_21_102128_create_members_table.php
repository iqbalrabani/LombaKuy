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
            $table->unsignedBigInteger('idTim');
            $table->foreign('idTim')
                ->references('idTim')
                ->on('tims')
                ->onDelete('cascade')
                ->name('fk_members_idTim');
            $table->string('namaMember')->primary();
            $table->string('kedudukan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropForeign('fk_members_idTim');
        });

        Schema::dropIfExists('members');
    }
}
