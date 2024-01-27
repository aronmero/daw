<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateGrupo extends FormRequest
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
            'nombre' => 'required|min:3|unique:grupos,nombre'
        ];
    }

    public function messages()
    {
        return [
            'nombre' => [
                'required' => 'El nombre de usuario es obligatorio.',
                'min' => 'El nombre de usuario debe tener al menos 3 caracteres.',
                'unique' => 'Este grupo ya está registrado.',
            ]
        ];
    }
}
