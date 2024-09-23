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
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_gestion_cursos');
            $table->timestamp('fecha_registro')->useCurrent();

            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_gestion_cursos')->references('id_Gestion_Cursos')->on('gestion_cursos');
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
