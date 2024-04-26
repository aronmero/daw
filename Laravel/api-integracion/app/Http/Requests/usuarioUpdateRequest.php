<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class usuarioUpdateRequest extends FormRequest
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
            'nombre' => 'string|max:150|min:3',
            'email' => [
                'regex:/^[a-zA-Z0-9._%+-]+@\S*\.\S*$/i', 'max:255'
            ],
            'password' => 'string|max:255|min:8',
            'municipio_id' => 'exists:municipios,id',
            'telefono' => 'string|max:9|min:9',
            'avatar' => 'nullable|string',
            'remember_token' => 'nullable|string',
        ];
    }
    public function messages()
{
    return [
        'nombre.string' => 'El nombre debe ser una cadena de caracteres.',
        'nombre.max' => 'El nombre no puede tener más de :max caracteres.',
        'nombre.min' => 'El nombre debe tener al menos :min caracteres.',
        'email.regex' => 'El formato del correo electrónico no es válido.',
        'email.max' => 'El correo electrónico no puede tener más de :max caracteres.',
        'password.string' => 'La contraseña debe ser una cadena de caracteres.',
        'password.max' => 'La contraseña no puede tener más de :max caracteres.',
        'password.min' => 'La contraseña debe tener al menos :min caracteres.',
        'municipio_id.exists' => 'El ID del municipio seleccionado no es válido.',
        'telefono.string' => 'El teléfono debe ser una cadena de caracteres.',
        'telefono.max' => 'El teléfono no puede tener más de :max caracteres.',
        'telefono.min' => 'El teléfono debe tener exactamente :min caracteres.',
        'avatar.nullable' => 'El avatar debe ser una cadena de caracteres o nulo.',
        'remember_token.nullable' => 'El remember token debe ser una cadena de caracteres o nulo.',
    ];
}

}
