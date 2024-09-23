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
        Schema::create('gestion_cursos', function (Blueprint $table) {
            $table->id('id_Gestion_Cursos');
            $table->string('Municipio_Curso', 50);
            $table->string('Centro_Formacion', 50);
            $table->string('Nivel_Formacion', 50);
            $table->string('Nombre_Curso', 200);
            $table->string('categoria', 50);
            $table->string('Mes_Poa', 50);
            $table->string('Estado_Curso', 50);
            $table->string('Jornada_Curso', 50);
            $table->string('Direccion', 50);
            $table->unsignedBigInteger('id_nombre_poa')->default(0);
            $table->timestamp('fechaRegistro')->useCurrent();
            $table->string('cupo', 50);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gestion_cursos');
    }
};
