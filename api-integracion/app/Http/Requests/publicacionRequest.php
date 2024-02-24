<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class publicacionRequest extends FormRequest
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
            'imagen' => 'required|string',
            'titulo' => 'required|string|max:30',
            'descripcion' => 'required|string|max:150',
            'tipo_id' => 'required|exists:tipo_publicaciones,id',
            'fecha_publicacion' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'activo' => 'required|boolean',
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
            'imagen' => [
                'required' => 'La imagen es obligatoria.',
            ],
            'titulo' => [
                'required' => 'El título es obligatorio.',
                'max' => 'El título no puede tener más de :max caracteres.',
            ],
            'descripcion' => [
                'required' => 'La descripción es obligatoria.',
                'max' => 'La descripción no puede tener más de :max caracteres.',
            ],
            'tipo_id' => [
                'required' => 'El tipo de publicación es obligatorio.',
                'exists' => 'El tipo de publicación seleccionado no es válido.',
            ],
            'fecha_publicacion' => [
                'required' => 'La fecha de publicación es obligatoria.',
                'date' => 'La fecha de publicación debe ser una fecha válida.',
            ],
            'fecha_inicio' => [
                'required' => 'La fecha de inicio es obligatoria.',
                'date' => 'La fecha de inicio debe ser una fecha válida.',
            ],
            'fecha_fin' => [
                'required' => 'La fecha de fin es obligatoria.',
                'date' => 'La fecha de fin debe ser una fecha válida.',
            ],
            'activo' => [
                'required' => 'El campo activo es obligatorio.',
                'boolean' => 'El campo activo debe ser verdadero o falso.',
            ],
        ];
        
    }
}
