<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoaRequest extends FormRequest
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
			'id_poa' => 'required',
			'id_asignar_municipios' => 'required',
			'Nombre_Poa' => 'required|string',
			'Persona_Enlace' => 'required|string',
			'Telefono_Enlace' => 'required|string',
			'Correo_Enlace' => 'required|string',
			'Poblacion' => 'required|string',
			'Ocupacion_Productiva' => 'required|string',
			'fecha_registro' => 'required',
			'estado' => 'string',
        ];
    }
}
