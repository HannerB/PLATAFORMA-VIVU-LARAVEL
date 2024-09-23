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
        Schema::create('asignar_municipios', function (Blueprint $table) {
            $table->id();
            $table->string('municipio', 50);
            $table->unsignedBigInteger('id_responsable');
            $table->string('periodo', 50);
            $table->string('estado', 50);
            $table->timestamp('fecha_registro')->useCurrent();

            $table->foreign('id_responsable')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignar_municipios');
    }
};
