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
        Schema::create('t_juegos', function (Blueprint $table) {
            $table->id('id_juego');
            $table->string('nombre', 150);
            $table->string('anio', 150);
            $table->string('empresa', 150);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_juegos');
    }
};
