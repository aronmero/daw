<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComercioRequest extends FormRequest
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
            'categoria_id' => 'required|exists:categorias,id',
            'direccion' => 'required|string|min:3|max:255',
            'descripcion' => 'required|string|max:300|min:3',
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
            'categoria_id.required' => 'El ID de categoría es obligatorio.',
            'categoria_id.exists' => 'El ID de categoría seleccionado no es válido.',
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.string' => 'La dirección debe ser una cadena de caracteres.',
            'direccion.min' => 'La dirección debe tener al menos 3 caracteres.',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres.',

            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser una cadena de caracteres.',
            'descripcion.min' => 'La descripción debe tener al menos 3 caracteres.',
            'descripcion.max' => 'La descripción no puede tener más de 300 caracteres.',
        ];
    }
}
