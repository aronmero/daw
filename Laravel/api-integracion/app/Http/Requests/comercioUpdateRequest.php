<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class comercioUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
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
            'categoria_id' => 'exists:categorias,id',
            'direccion' => 'string|min:3|max:255',
            'descripcion' => 'string|max:300|min:3',
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
            'categoria_id.exists' => 'El ID de categoría seleccionado no es válido.',

            'direccion.string' => 'La dirección debe ser una cadena de caracteres.',
            'direccion.min' => 'La dirección debe tener al menos 3 caracteres.',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres.',

            'descripcion.string' => 'La descripción debe ser una cadena de caracteres.',
            'descripcion.min' => 'La descripción debe tener al menos 3 caracteres.',
            'descripcion.max' => 'La descripción no puede tener más de 300 caracteres.',
        ];
    }
}
