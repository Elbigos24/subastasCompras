<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubastaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'product_id' => 'required|exists:products,id',
            'start_time' => 'required|date|after_or_equal:now',
            'end_time'   => 'required|date|after:start_time',
            'status'     => 'required|integer|in:0,1,2',
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required'  => 'Debe seleccionar un producto.',
            'product_id.exists'    => 'El producto seleccionado no existe.',
            'start_time.required'  => 'La fecha de inicio es obligatoria.',
            'start_time.date'      => 'La fecha de inicio no es válida.',
            'start_time.after_or_equal' => 'La fecha de inicio no puede ser en el pasado.',
            'end_time.required'    => 'La fecha de fin es obligatoria.',
            'end_time.date'        => 'La fecha de fin no es válida.',
            'end_time.after'       => 'La fecha de fin debe ser posterior a la de inicio.',
            'status.required'      => 'El estado es obligatorio.',
            'status.in'            => 'El estado debe ser: Pendiente, Activa o Finalizada.',
        ];
    }
}
