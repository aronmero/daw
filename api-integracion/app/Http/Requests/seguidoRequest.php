<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class seguidoRequest extends FormRequest
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
            'seguidor_id' => [
                'required',
                Rule::unique('seguidos')->where(function ($query) {
                    return $query->where('seguido_id', $this->seguido_id);
                }), 'exists:particulares,usuario_id'
            ],
            'seguido_id' => [
                'required',
                Rule::unique('seguidos')->where(function ($query) {
                    return $query->where('seguidor_id', $this->seguidor_id);
                }), 'exists:comercios,usuario_id'
            ],
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
            'seguidor_id.required' => 'El campo "seguidor_id" es obligatorio.',
            'seguidor_id.exists' => 'El "seguidor_id" proporcionado no existe en la tabla de "particulares".',
            'seguido_id.required' => 'El campo "seguido_id" es obligatorio.',
            'seguido_id.exists' => 'El "seguido_id" proporcionado no existe en la tabla de "comercios".',
            'seguidor_id.unique' => 'Ya existe una entrada con el mismo "seguidor_id" y "seguido_id".',
            'seguido_id.unique' => 'Ya existe una entrada con el mismo "seguidor_id" y "seguido_id".',
        ];
    }
}
