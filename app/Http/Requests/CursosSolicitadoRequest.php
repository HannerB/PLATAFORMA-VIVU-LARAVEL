<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursosSolicitadoRequest extends FormRequest
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
			'telefono' => 'required|string',
			'correo' => 'required|string',
			'nombreCursoSolicitado' => 'required|string',
			'fechaRegistro' => 'required|string',
        ];
    }
}
