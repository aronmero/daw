<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfesorPasswordRequest extends FormRequest
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
            'password_actual' => 'required',
            'password' => 'required|confirmed|min:8',
        ];
    }

    public function messages()
    {
        return [
            'password' => [
                'required' => 'La contraseña es obligatoria.',
                'min' => 'La contraseña debe tener al menos 8 caracteres.',
                'confirmed' => 'Las contraseñas no coinciden'
            ], 'password_actual' => [
                'required' => 'La contraseña actual es obligatoria.',
                'min' => 'La contraseña debe tener al menos 8 caracteres.',
            ]

        ];
    }
}
