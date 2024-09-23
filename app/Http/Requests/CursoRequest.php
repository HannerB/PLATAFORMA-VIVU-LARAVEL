<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoRequest extends FormRequest
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
			'codigo_curso' => 'required',
			'curso' => 'required|string',
			'jornada' => 'required|string',
			'horario' => 'required|string',
			'intensidad' => 'required|string',
			'fecha_inicio' => 'required',
			'municipio' => 'required|string',
			'direccion' => 'required|string',
			'formacion' => 'required|string',
			'centro' => 'required|string',
			'descripcion' => 'required|string',
			'nombre_grupo' => 'required|string',
			'estado' => 'required|string',
			'rol' => 'required|string',
			'fechaRegistro' => 'required',
        ];
    }
}
