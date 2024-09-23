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
        Schema::create('competencias', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('sexo', 12);
            $table->string('correo', 100);
            $table->string('tipodocumento', 100);
            $table->string('documento', 100);
            $table->date('fechaNacimiento');
            $table->string('municipio', 100);
            $table->string('telefono', 100);
            $table->string('poblacion', 100);
            $table->string('ocupacion', 100);
            $table->timestamp('fechaRegistro')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('competencias');
    }
};
