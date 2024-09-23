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
        Schema::create('poa', function (Blueprint $table) {
            $table->id('id_poa');
            $table->unsignedBigInteger('id_asignar_municipios');
            $table->string('Nombre_Poa', 50);
            $table->string('Persona_Enlace', 50)->default('0');
            $table->string('Telefono_Enlace', 50);
            $table->string('Correo_Enlace', 50);
            $table->string('Poblacion', 50);
            $table->string('Ocupacion_Productiva', 50);
            $table->timestamp('fecha_registro')->useCurrent();
            $table->string('estado', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poa');
    }
};
