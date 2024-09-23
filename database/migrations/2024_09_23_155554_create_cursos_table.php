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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo_curso');
            $table->string('curso', 300);
            $table->string('jornada', 100);
            $table->string('horario', 100);
            $table->string('intensidad', 100);
            $table->date('fecha_inicio');
            $table->string('municipio', 100);
            $table->string('direccion', 100);
            $table->string('formacion', 100);
            $table->string('centro', 100);
            $table->string('descripcion', 500);
            $table->string('nombre_grupo', 100);
            $table->string('estado', 100);
            $table->string('rol', 100)->default('OFICINA');
            $table->timestamp('fechaRegistro')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
