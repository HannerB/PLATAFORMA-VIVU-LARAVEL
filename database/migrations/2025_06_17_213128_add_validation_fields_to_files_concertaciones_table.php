<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('files_concertaciones', function (Blueprint $table) {
            if (!Schema::hasColumn('files_concertaciones', 'estado')) {
                $table->enum('estado', ['por validar', 'Acta valida', 'Acta No valida'])
                    ->default('por validar')
                    ->after('ruta');
            }
            
            if (!Schema::hasColumn('files_concertaciones', 'tipo')) {
                $table->enum('tipo', ['concertacion', 'GestionCursos'])
                    ->default('concertacion')
                    ->after('estado');
            }
            
            if (!Schema::hasColumn('files_concertaciones', 'observaciones')) {
                $table->text('observaciones')->nullable()->after('tipo');
            }
            
            if (!Schema::hasColumn('files_concertaciones', 'fecha_validacion')) {
                $table->timestamp('fecha_validacion')->nullable()->after('observaciones');
            }
            
            if (!Schema::hasColumn('files_concertaciones', 'validado_por')) {
                $table->unsignedBigInteger('validado_por')->nullable()->after('fecha_validacion');
                $table->foreign('validado_por')->references('id')->on('users');
            }
        });
    }

    public function down()
    {
        Schema::table('files_concertaciones', function (Blueprint $table) {
            $table->dropForeign(['validado_por']);
            $table->dropColumn(['estado', 'tipo', 'observaciones', 'fecha_validacion', 'validado_por']);
        });
    }
};