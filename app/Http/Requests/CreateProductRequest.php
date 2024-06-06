<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'categoria' => 'required|integer',
            'nombreProduct' => 'required|string',
            'descripcionProduct' => 'required|max:255',
            'cantidadProduct' => 'required|integer',
            'precioProduct' => 'required|integer'
        ];
    }


    public function messages():array{
        return [
            'nombreProduct.required' => 'El nombre del producto es obligatorio',
            'nombreProduct.string' => 'El nombre del producto debe ser un string',
            'categoria.required' => 'La categoría es obligatoria',
            'categoria.integer' => 'El valor de la categoría es incorrecto',
            'descripcionProduct.max' => 'La descripción debe ser menor a 255',
            'descripcionProduct.required' => 'La descripción es obligatoria',
            'cantidadProduct.required' => 'La cantidad es obligatoria' ,
            'cantidadProduct.integer' => 'El valor cantidad debe ser numérico',
            'precioProduct.integer' => 'El precio debe ser numérico',
            'precioProduct.required' => 'El precio es obligatorio'
        ];
    }
}
