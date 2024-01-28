<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActividadRequest extends FormRequest
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
            'lugar' => 'required|min:3',
            'duracion' => 'required|integer|between:1,720',
            'fecha' => 'required|date|after:yesterday',
            'horaInicio' => 'required|date_format:H:i|after_or_equal:08:00|before_or_equal:20:00',
            'profesores' => 'required|array|min:1',
            'grupos' => 'required|array|min:1',
        ];
    }

    public function messages()
    {
        return [
            'lugar' => [
                'required' => 'El lugar es obligatorio.',
                'min' => 'El lugar debe tener al menos 3 caracteres.',
            ],
            'duracion' => [
                'required' => 'La duración es obligatoria.',
                'integer' => 'La duración debe ser un número entero.',
                'between' => 'La duracion debe ser mayor a 0 y menor o igual a 720'
            ],
            'fecha' => [
                'required' => 'La fecha es obligatoria.',
                'date' => 'La fecha debe ser una fecha válida.',
                'after' => 'La fecha no debe ser anterior a hoy.',
            ],
            'horaInicio' => [
                'required' => 'La hora de inicio es obligatoria.',
                'after_or_equal' => 'La hora de inicio debe estar después o igual a las 08:00.',
                'before_or_equal' => 'La hora de inicio debe estar antes o igual a las 20:00.',
            ], 
            'profesores.required' => 'Debe seleccionar al menos un profesor.',
            'grupos.required' => 'Debe seleccionar al menos un grupo.',

        ];
    }
}
