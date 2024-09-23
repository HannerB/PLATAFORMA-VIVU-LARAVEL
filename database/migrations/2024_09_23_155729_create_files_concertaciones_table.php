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
        Schema::create('files_concertaciones', function (Blueprint $table) {
            $table->id('id_file_concertaciones');
            $table->string('mes_concertacion', 50)->default('');
            $table->string('vigencia', 50);
            $table->string('ruta', 50)->default('');
            $table->string('users_id', 50)->default('');
            $table->string('estado', 50)->default('');
            $table->string('tipo', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files_concertaciones');
    }
};
