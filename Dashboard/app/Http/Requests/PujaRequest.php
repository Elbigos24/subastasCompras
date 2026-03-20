<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PujaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'user_id'    => 'required|exists:users,id',
            'subasta_id' => 'required|exists:subastas,id',
            'amount'     => 'required|integer|min:1',
            'price'      => 'required|integer|min:1',
            'date_hour'  => 'required|date',
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required'    => 'Debe seleccionar un usuario.',
            'user_id.exists'      => 'El usuario seleccionado no existe.',
            'subasta_id.required' => 'Debe seleccionar una subasta.',
            'subasta_id.exists'   => 'La subasta seleccionada no existe.',
            'amount.required'     => 'La cantidad es obligatoria.',
            'amount.integer'      => 'La cantidad debe ser un número entero.',
            'amount.min'          => 'La cantidad debe ser al menos 1.',
            'price.required'      => 'El precio de puja es obligatorio.',
            'price.integer'       => 'El precio debe ser un número entero.',
            'price.min'           => 'El precio debe ser mayor a 0.',
            'date_hour.required'  => 'La fecha y hora son obligatorias.',
            'date_hour.date'      => 'La fecha y hora no son válidas.',
        ];
    }
}
