<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GestionCursoRequest extends FormRequest
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
			'id_Gestion_Cursos' => 'required',
			'Municipio_Curso' => 'required|string',
			'Centro_Formacion' => 'required|string',
			'Nivel_Formacion' => 'required|string',
			'Nombre_Curso' => 'required|string',
			'categoria' => 'required|string',
			'Mes_Poa' => 'required|string',
			'Estado_Curso' => 'required|string',
			'Jornada_Curso' => 'required|string',
			'Direccion' => 'required|string',
			'id_nombre_poa' => 'required',
			'fechaRegistro' => 'required',
			'cupo' => 'required|string',
        ];
    }
}
