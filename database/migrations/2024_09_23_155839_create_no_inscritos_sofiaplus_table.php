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
         Schema::create('no_inscritos_sofiaplus', function (Blueprint $table) {
            $table->id('id_sofiaPlus');
            $table->string('pais_nacimiento', 50)->default('');
            $table->string('departamento_nacimiento', 50)->default('');
            $table->string('municipio_nacimiento', 50)->default('');
            $table->string('fecha_exped_cedula', 50)->default('');
            $table->string('pais_cedula', 50)->default('');
            $table->string('departamento_cedula', 50)->default('');
            $table->string('municipio_cedula', 50)->default('');
            $table->unsignedBigInteger('id_users');
            $table->string('registro_sofia', 50)->default('');
            $table->unsignedBigInteger('curso_id');

            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('curso_id')->references('id')->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('no_inscritos_sofiaplus');
    }
};
