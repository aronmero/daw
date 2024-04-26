<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AyuntamientoRequest extends FormRequest
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
            'direccion' => 'required|string|min:3|max:255',
            'tokenVerification' => 'required|exists:tokens,valor',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.string' => 'La dirección debe ser una cadena de caracteres.',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres.',
            'direccion.min' => 'La dirección debe tener al menos 3 caracteres.',
            'tokenVerification.required' => 'El token de verificación es obligatorio.',
            'tokenVerification.exists' => 'El token de verificación seleccionado no es válido.',
        ];
    }
}
