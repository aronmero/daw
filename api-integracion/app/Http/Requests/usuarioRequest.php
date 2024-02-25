<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255|unique:usuarios,email|regex:/^[a-zA-Z0-9._%+-]+@\S*\.\S*$/i',
            'nombre' => 'required|string|max:150|min:3',
            'password' => 'required|string|max:255|min:8',
            'municipio_id' => 'required|exists:municipios,id',
            'telefono' => 'required|string|max:9|min:9',
            'avatar' => 'nullable|string',
            'remember_token' => 'nullable|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */ public function messages()
    {
        return [
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.string' => 'El correo electrónico debe ser una cadena de caracteres.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',
            'email.unique' => 'El correo electrónico ya ha sido registrado.',
            'email.regex' => 'El formato del correo electrónico no es válido.',

            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser una cadena de caracteres.',
            'nombre.max' => 'El nombre no puede tener más de 150 caracteres.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',

            'password.required' => 'La contraseña es obligatoria.',
            'password.string' => 'La contraseña debe ser una cadena de caracteres.',
            'password.max' => 'La contraseña no puede tener más de 255 caracteres.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',

            'municipio_id.required' => 'El ID del municipio es obligatorio.',
            'municipio_id.exists' => 'El ID del municipio seleccionado no es válido.',

            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.string' => 'El teléfono debe ser una cadena de caracteres.',
            'telefono.max' => 'El teléfono no puede tener más de 9 caracteres.',
            'telefono.min' => 'El teléfono debe tener exactamente 9 caracteres.',

            'avatar.string' => 'El avatar debe ser una cadena de caracteres.',

            'remember_token.string' => 'El remember token debe ser una cadena de caracteres.',
        ];
    }
}
