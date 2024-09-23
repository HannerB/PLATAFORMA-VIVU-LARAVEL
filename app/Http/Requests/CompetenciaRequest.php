<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetenciaRequest extends FormRequest
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
			'nombres' => 'required|string',
			'apellidos' => 'required|string',
			'sexo' => 'required|string',
			'correo' => 'required|string',
			'tipodocumento' => 'required|string',
			'documento' => 'required|string',
			'fechaNacimiento' => 'required',
			'municipio' => 'required|string',
			'telefono' => 'required|string',
			'poblacion' => 'required|string',
			'ocupacion' => 'required|string',
			'fechaRegistro' => 'required',
        ];
    }
}
