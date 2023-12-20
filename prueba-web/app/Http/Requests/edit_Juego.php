<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class edit_Juego extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre del juego es obligatorio.',
            'nombre.min' => 'El nombre del juego debe tener al menos 3 caracteres.'
        ];
    }
}
