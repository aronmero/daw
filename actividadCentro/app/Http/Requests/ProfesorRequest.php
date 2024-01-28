<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesorRequest extends FormRequest
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
            'nombre' => 'required|min:3',
            'email' => 'required|unique:profesores,email|regex:/^[a-zA-Z0-9._%+-]+@\S*\.\S*$/i',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [
            'password' => [
                'required' => 'La contraseña es obligatoria.',
                'min' => 'La contraseña debe tener al menos 8 caracteres.',
            ],
            'nombre' => [
                'required' => 'El nombre de usuario es obligatorio.',
                'min' => 'El nombre de usuario debe tener al menos 3 caracteres.',
            ],
            'email' => [
                'required' => 'El correo es obligatorio.',
                'unique' => 'Este correo ya está registrado.',
                'regex' => 'Utilice un correo correcto'
            ],

        ];
    }
}
