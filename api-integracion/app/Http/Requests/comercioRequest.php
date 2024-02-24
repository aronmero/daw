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
            'usuario_id' => 'required|exists:usuarios,id',
            'categoria_id' => 'required|exists:categorias,id',
            'direccion' => 'required|string',
            'descripcion' => 'required|string|max:300',
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
            'usuario_id.required' => 'El ID de usuario es obligatorio.',
            'usuario_id.exists' => 'El ID de usuario seleccionado no es válido.',
            'categoria_id.required' => 'El ID de categoría es obligatorio.',
            'categoria_id.exists' => 'El ID de categoría seleccionado no es válido.',
            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.string' => 'La dirección debe ser una cadena de caracteres.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'descripcion.string' => 'La descripción debe ser una cadena de caracteres.',
            'descripcion.max' => 'La descripción no puede tener más de :max caracteres.',
        ];
    }
}
