<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ActividadRequestUpdate extends FormRequest
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
            'lugar' => 'min:3',
            'duracion' => 'integer|between:1,720',
            'fecha' => 'date|after:yesterday',
            'horaInicio' => 'date_format:H:i|after_or_equal:06:00|before_or_equal:22:00',
            'profesores' => [
                'array',
                'min:1',
                Rule::exists('profesores', 'id')->where(function ($query) {
                    $query->where('id', '>', 1);
                }),
            ],
            'grupos' => 'array|min:1|exists:grupos,id',
        ];
    }

    public function messages()
    {
        return [
            'lugar' => [
                'min' => 'El lugar debe tener al menos 3 caracteres.',
            ],
            'duracion' => [
            
                'integer' => 'La duración debe ser un número entero.',
                'between' => 'La duracion debe ser mayor a 0 y menor o igual a 720'
            ],
            'fecha' => [
            
                'date' => 'La fecha debe ser una fecha válida.',
                'after' => 'La fecha no debe ser anterior a hoy.',
            ],
            'horaInicio' => [
            
                'date_format' => 'La hora debe ser una hora válida',
                'after_or_equal' => 'La hora de inicio debe estar después o igual a las 06:00.',
                'before_or_equal' => 'La hora de inicio debe estar antes o igual a las 22:00.',
            ],  
            'profesores' => [
               
                'array' => 'Debe seleccionar al menos un profesor.',
                'min' => 'Debe seleccionar al menos un profesor.',
                'exists'=> 'Uno o más de los profesores seleccionados no son válidos.'
            ],
            'grupos' => [
               
                'array' => 'Debe seleccionar al menos un grupo.',
                'min' => 'Debe seleccionar al menos un grupo.',
                'exists'=> 'Uno o más de los grupos seleccionados no son válidos.'
            ],

        ];
    }
}
