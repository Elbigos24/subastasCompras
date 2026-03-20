<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompraRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'amount'  => 'required|integer|min:1',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Debe seleccionar un usuario.',
            'user_id.exists'   => 'El usuario seleccionado no existe.',
            'amount.required'  => 'El monto es obligatorio.',
            'amount.integer'   => 'El monto debe ser un número entero.',
            'amount.min'       => 'El monto debe ser al menos 1.',
        ];
    }
}
