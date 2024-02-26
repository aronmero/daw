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
            'titulo' => 'required|string|max:30|min:3',
            'descripcion' => 'required|string|max:150|min:3',
            'tipo_id' => 'required|exists:tipo_publicaciones,id',
            'fecha_publicacion' => 'required|date',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'comercios' => 'required|array|min:1|exists:comercios,usuario_id',
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
                'max' => 'El título no puede tener más de 30 caracteres.',
                'min' => 'El titulo debe tener al menos 3 caracteres.',
            ],
            'descripcion' => [
                'required' => 'La descripción es obligatoria.',
                'max' => 'La descripción no puede tener más de 150 caracteres.',
                'min' => 'La descripcion debe tener al menos 3 caracteres.',
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
            'comercios' => [
                'required' => 'Debe seleccionar al menos un comercio.',
                'array' => 'Debe seleccionar al menos un comercio.',
                'min' => 'Debe seleccionar al menos un comercio.',
                'exists'=> 'Uno o más de los comercios seleccionados no son válidos.'
            ],
        ];
        
    }
}
