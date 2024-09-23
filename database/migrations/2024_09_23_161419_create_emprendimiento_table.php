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
        Schema::create('emprendimiento', function (Blueprint $table) {
            $table->id();
            $table->string('regional', 100);
            $table->string('centroFormacion', 100);
            $table->string('codigoProyecto', 100);
            $table->string('nombresPersonal', 100);
            $table->string('apellidosPersonal', 100);
            $table->string('documentoPersonal', 100);
            $table->date('fechaNacimiento');
            $table->string('ciudadNacimiento', 100);
            $table->string('departamentoNacimiento', 100);
            $table->string('correoPersonal', 200);
            $table->string('genero', 20);
            $table->string('telefonoOficinaPersonal', 20);
            $table->string('telefonoMovilPersonal', 20);
            $table->string('direccionResidencia', 100);
            $table->string('ciudadResidencia', 100);
            $table->string('departamentoResidencia', 100);
            $table->string('tipoPoblacionPersonal', 100);
            $table->string('formacionAcademica', 100);
            $table->string('programaFormacion', 100);
            $table->string('institucionAcademica', 100);
            $table->string('estadoAcademica', 100);
            $table->string('servicioRequerido', 100);
            $table->string('nombreEmpresa', 100);
            $table->string('nitEmpresa', 100);
            $table->string('estatusEmpresa', 100);
            $table->date('fechaConstitucionEmpresa');
            $table->string('representanteEmpresa', 100);
            $table->string('tamanoEmpresa', 100);
            $table->string('actividadEconomicaEmpresa', 100);
            $table->string('sectorEconomicoEmpresa', 100);
            $table->string('tipoSociedadEmpresa', 100);
            $table->string('direccionEmpresa', 100);
            $table->string('paginaWebEmpresa', 100);
            $table->string('ciudadEmpresa', 100);
            $table->string('departamentoEmpresa', 100);
            $table->string('correoEmpresa', 100);
            $table->string('empleadosFormales', 10);
            $table->string('empleadosInformales', 10);
            $table->string('descripcionProductosEmpresa', 500);
            $table->string('internetEmpresa', 100);
            $table->string('negocioEnCasa', 100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emprendimiento');
    }
};
