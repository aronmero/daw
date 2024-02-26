<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParticularRequest extends FormRequest
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
            'primer_apellido' => 'required|string|max:50|min:3',
            'segundo_apellido' => 'required|string|max:50|min:3',
            'sexo' => 'required|string|in:m,h',
            'fecha_nacimiento' => 'required|date',
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
            'primer_apellido.required' => 'El primer apellido es obligatorio.',
            'primer_apellido.string' => 'El primer apellido debe ser una cadena de caracteres.',
            'primer_apellido.max' => 'El primer apellido no puede tener más de 50 caracteres.',
            'primer_apellido.min' => 'El primer apellido debe tener al menos 3 caracteres.',

            'segundo_apellido.required' => 'El segundo apellido es obligatorio.',
            'segundo_apellido.string' => 'El segundo apellido debe ser una cadena de caracteres.',
            'segundo_apellido.max' => 'El segundo apellido no puede tener más de 50 caracteres.',
            'segundo_apellido.min' => 'El segundo apellido debe tener al menos 3 caracteres.',

            'sexo.required' => 'El campo sexo es obligatorio.',
            'sexo.string' => 'El sexo debe ser una cadena de caracteres.',
            'sexo.in' => 'El sexo debe ser "m" o "h".',
            'fecha_nacimiento.required' => 'La fecha de nacimiento es obligatoria.',
            'fecha_nacimiento.date' => 'La fecha de nacimiento debe ser una fecha válida.',
        ];
    }
}
