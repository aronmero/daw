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
            'direccion' => 'string',
            'descripcion' => 'string|max:300',
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
            'descripcion.string' => 'La descripción debe ser una cadena de caracteres.',
            'descripcion.max' => 'La descripción no puede tener más de 300 caracteres.',
        ];
    }
}
