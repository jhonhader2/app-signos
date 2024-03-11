<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTomaSignosRequest extends FormRequest
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
            //
            'paciente_id' => 'required|exists:users,id',
            'temperatura' => 'nullable|numeric',
            'tension_arterial' => 'nullable|numeric',
            'saturacion_oxigeno' => 'required|numeric',
            'frecuencia_cardiaca' => 'required|numeric',
            'peso' => 'nullable|numeric',
            'talla' => 'nullable|numeric',
            'observaciones' => 'nullable|string'
        ];
    }
}
