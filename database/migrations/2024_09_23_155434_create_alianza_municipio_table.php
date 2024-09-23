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
        Schema::create('alianza_municipio', function (Blueprint $table) {
            $table->id('id_alianza');
            $table->unsignedBigInteger('id_User');
            $table->string('municipio', 50);
            $table->string('periodo', 50);
            $table->string('enlace_poblacion', 50);
            $table->string('cargo', 50);
            $table->string('estado', 50);
            $table->unsignedBigInteger('poa_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alianza_municipio');
    }
};
