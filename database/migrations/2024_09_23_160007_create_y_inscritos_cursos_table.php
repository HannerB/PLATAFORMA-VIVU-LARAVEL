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
        Schema::create('y_inscritos_cursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_curso')->nullable();
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->integer('estado')->default(1);
            $table->timestamp('fecha_reg')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('y_inscritos_cursos');
    }
};
