<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AlianzaMunicipioRequest extends FormRequest
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
			'id_alianza' => 'required',
			'id_User' => 'required',
			'municipio' => 'required|string',
			'periodo' => 'required|string',
			'enlace_poblacion' => 'required|string',
			'cargo' => 'required|string',
			'estado' => 'required|string',
			'poa_id' => 'required',
        ];
    }
}
