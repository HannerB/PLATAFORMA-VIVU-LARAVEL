<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmprendimientoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
			'regional' => 'required|string',
			'centroFormacion' => 'required|string',
			'codigoProyecto' => 'required|string',
			'nombresPersonal' => 'required|string',
			'apellidosPersonal' => 'required|string',
			'documentoPersonal' => 'required|string',
			'fechaNacimiento' => 'required',
			'ciudadNacimiento' => 'required|string',
			'departamentoNacimiento' => 'required|string',
			'correoPersonal' => 'required|string',
			'genero' => 'required|string',
			'telefonoOficinaPersonal' => 'required|string',
			'telefonoMovilPersonal' => 'required|string',
			'direccionResidencia' => 'required|string',
			'ciudadResidencia' => 'required|string',
			'departamentoResidencia' => 'required|string',
			'tipoPoblacionPersonal' => 'required|string',
			'formacionAcademica' => 'required|string',
			'programaFormacion' => 'required|string',
			'institucionAcademica' => 'required|string',
			'estadoAcademica' => 'required|string',
			'servicioRequerido' => 'required|string',
			'nombreEmpresa' => 'required|string',
			'nitEmpresa' => 'required|string',
			'estatusEmpresa' => 'required|string',
			'fechaConstitucionEmpresa' => 'required',
			'representanteEmpresa' => 'required|string',
			'tamanoEmpresa' => 'required|string',
			'actividadEconomicaEmpresa' => 'required|string',
			'sectorEconomicoEmpresa' => 'required|string',
			'tipoSociedadEmpresa' => 'required|string',
			'direccionEmpresa' => 'required|string',
			'paginaWebEmpresa' => 'required|string',
			'ciudadEmpresa' => 'required|string',
			'departamentoEmpresa' => 'required|string',
			'correoEmpresa' => 'required|string',
			'empleadosFormales' => 'required|string',
			'empleadosInformales' => 'required|string',
			'descripcionProductosEmpresa' => 'required|string',
			'internetEmpresa' => 'required|string',
			'negocioEnCasa' => 'required|string',
        ];
    }
}
