<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Emprendimiento
 *
 * @property $id
 * @property $regional
 * @property $centroFormacion
 * @property $codigoProyecto
 * @property $nombresPersonal
 * @property $apellidosPersonal
 * @property $documentoPersonal
 * @property $fechaNacimiento
 * @property $ciudadNacimiento
 * @property $departamentoNacimiento
 * @property $correoPersonal
 * @property $genero
 * @property $telefonoOficinaPersonal
 * @property $telefonoMovilPersonal
 * @property $direccionResidencia
 * @property $ciudadResidencia
 * @property $departamentoResidencia
 * @property $tipoPoblacionPersonal
 * @property $formacionAcademica
 * @property $programaFormacion
 * @property $institucionAcademica
 * @property $estadoAcademica
 * @property $servicioRequerido
 * @property $nombreEmpresa
 * @property $nitEmpresa
 * @property $estatusEmpresa
 * @property $fechaConstitucionEmpresa
 * @property $representanteEmpresa
 * @property $tamanoEmpresa
 * @property $actividadEconomicaEmpresa
 * @property $sectorEconomicoEmpresa
 * @property $tipoSociedadEmpresa
 * @property $direccionEmpresa
 * @property $paginaWebEmpresa
 * @property $ciudadEmpresa
 * @property $departamentoEmpresa
 * @property $correoEmpresa
 * @property $empleadosFormales
 * @property $empleadosInformales
 * @property $descripcionProductosEmpresa
 * @property $internetEmpresa
 * @property $negocioEnCasa
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Emprendimiento extends Model
{
    protected $table = 'emprendimiento';

    public $timestamps = false;
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['regional', 'centroFormacion', 'codigoProyecto', 'nombresPersonal', 'apellidosPersonal', 'documentoPersonal', 'fechaNacimiento', 'ciudadNacimiento', 'departamentoNacimiento', 'correoPersonal', 'genero', 'telefonoOficinaPersonal', 'telefonoMovilPersonal', 'direccionResidencia', 'ciudadResidencia', 'departamentoResidencia', 'tipoPoblacionPersonal', 'formacionAcademica', 'programaFormacion', 'institucionAcademica', 'estadoAcademica', 'servicioRequerido', 'nombreEmpresa', 'nitEmpresa', 'estatusEmpresa', 'fechaConstitucionEmpresa', 'representanteEmpresa', 'tamanoEmpresa', 'actividadEconomicaEmpresa', 'sectorEconomicoEmpresa', 'tipoSociedadEmpresa', 'direccionEmpresa', 'paginaWebEmpresa', 'ciudadEmpresa', 'departamentoEmpresa', 'correoEmpresa', 'empleadosFormales', 'empleadosInformales', 'descripcionProductosEmpresa', 'internetEmpresa', 'negocioEnCasa'];
}
