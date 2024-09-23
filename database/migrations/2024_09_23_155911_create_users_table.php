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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('sexo', 100);
            $table->string('tipodocumento', 30);
            $table->string('documento', 30);
            $table->date('fechaNacimiento');
            $table->string('telefono', 12);
            $table->string('tipoPoblacion', 200);
            $table->string('centro', 100)->nullable();
            $table->string('municipio', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 500);
            $table->string('rol', 200)->default('Administrador');
            $table->timestamp('fechaRegistro')->useCurrent();
            $table->date('fecha_sesion')->nullable();
            $table->string('img', 500)->default('default-user-img.jpg');
            $table->string('tipo_archivo', 100)->default('image/jpg');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
