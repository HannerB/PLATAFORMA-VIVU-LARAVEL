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
        Schema::create('cursos_detalle', function (Blueprint $table) {
            $table->id('id_cursos_detalle');
            $table->unsignedBigInteger('id_users');
            $table->unsignedBigInteger('id_gestion_cursos');
            $table->timestamp('fecha_registro')->useCurrent();
            $table->string('modo_Documento', 50);
            $table->unsignedBigInteger('id_Docuemnto')->nullable();

            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_gestion_cursos')->references('id_Gestion_Cursos')->on('gestion_cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos_detalle');
    }
};
