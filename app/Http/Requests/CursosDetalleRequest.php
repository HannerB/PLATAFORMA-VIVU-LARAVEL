<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursosDetalleRequest extends FormRequest
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
			'id_cursos_detalle' => 'required',
			'id_users' => 'required',
			'id_gestion_cursos' => 'required',
			'fecha_registro' => 'required',
			'modo_Documento' => 'required|string',
        ];
    }
}
