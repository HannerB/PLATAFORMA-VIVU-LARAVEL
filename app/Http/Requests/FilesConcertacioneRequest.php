<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilesConcertacioneRequest extends FormRequest
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
			'id_file_concertaciones' => 'required',
			'mes_concertacion' => 'required|string',
			'vigencia' => 'required|string',
			'ruta' => 'required|string',
			'users_id' => 'required',
			'estado' => 'required|string',
			'tipo' => 'required|string',
        ];
    }
}
