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
        Schema::create('concertaciones', function (Blueprint $table) {
            $table->id();
            $table->string('id_concertacion', 50);
            $table->string('id_usuario', 50)->default('0');
            $table->string('id_gestion_cursos', 50);
            $table->timestamp('fecha_registro')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concertaciones');
    }
};
