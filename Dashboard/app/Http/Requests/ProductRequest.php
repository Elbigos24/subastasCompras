<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price'       => 'required|numeric|min:0.01',
            'stock'       => 'required|integer|min:0',
            'user_id'     => 'required|exists:users,id',
            'Img'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => 'El nombre del producto es obligatorio.',
            'name.max'             => 'El nombre no puede superar 255 caracteres.',
            'description.required' => 'La descripción es obligatoria.',
            'description.max'      => 'La descripción no puede superar 1000 caracteres.',
            'price.required'       => 'El precio es obligatorio.',
            'price.numeric'        => 'El precio debe ser un número.',
            'price.min'            => 'El precio debe ser mayor a 0.',
            'stock.required'       => 'El stock es obligatorio.',
            'stock.integer'        => 'El stock debe ser un número entero.',
            'stock.min'            => 'El stock no puede ser negativo.',
            'user_id.required'     => 'Debe seleccionar un usuario.',
            'user_id.exists'       => 'El usuario seleccionado no existe.',
            'Img.image'            => 'El archivo debe ser una imagen.',
            'Img.mimes'            => 'La imagen debe ser jpeg, png, jpg o gif.',
            'Img.max'              => 'La imagen no puede superar 2MB.',
        ];
    }
}
