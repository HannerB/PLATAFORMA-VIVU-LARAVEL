<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoInscritosSofiapluRequest extends FormRequest
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
			'id_sofiaPlus' => 'required',
			'pais_nacimiento' => 'required|string',
			'departamento_nacimiento' => 'required|string',
			'municipio_nacimiento' => 'required|string',
			'fecha_exped_cedula' => 'required|string',
			'pais_cedula' => 'required|string',
			'departamento_cedula' => 'required|string',
			'municipio_cedula' => 'required|string',
			'id_users' => 'required',
			'registro_sofia' => 'required|string',
			'curso_id' => 'required',
        ];
    }
}
