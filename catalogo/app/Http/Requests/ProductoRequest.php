<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(Request $request): array
    {
        return [
            //'producto'=>'required|unique:productos,producto|min:3|max:50',
            //'producto' => 'required|unique:productos,producto,'.$this->id_producto.',id_producto|min:3|max:50',
            'producto'=>'required|'.Rule::unique('productos','producto')
                                            ->ignore( $request->id, 'id_producto').'|min:3|max:50',
            'precio'=>'required|numeric|min:0',
            //'id_marca'=>'required|integer|exists:marcas,id_marca',
            'id_marca'=>Rule::exists('marcas','id_marca'),
            //'id_categoria'=>'required|integer|exists:categorias,id_categoria',
            'id_categoria'=>Rule::exists('categorias','id_categoria'),
            'descripcion'=>'max:1000',
            'imagen'=>'mimes:png,jpg,jpeg,webp,svg,gif|max:3072',
            'destacado'=>'boolean',
            'activo'=>'boolean',
        ];
    }
    public function messages(): array
    {
        return [
            'producto.required' => 'El campo "Producto" es obligatorio.',
            'producto.unique' => 'Ya existe un producto con ese nombre.',
            'producto.min' => 'El campo "Producto" debe tener al menos 3 caracteres.',
            'producto.max' => 'El campo "Producto" debe tener 50 caracteres como máximo.',
            'precio.required' => 'El campo "Precio" es obligatorio.',
            'precio.numeric' => 'El campo "Precio" debe ser numérico.',
            'precio.min' => 'El campo "Precio" debe ser al menos 0.',
            'id_marca.required' => 'El campo "Marca" es obligatorio.',
            'id_marca.integer' => 'El campo "Marca" debe ser numérico.',
            'id_marca.exists' => 'Seleccione una marca existente.',
            'id_categoria.required' => 'El campo "Categoria" es obligatorio.',
            'id_categoria.integer' => 'El campo "Categoria" debe ser numérico.',
            'id_categoria.exists' => 'Seleccione una categoria existente.',
            'descripcion.max' => 'El campo "Descripcion" debe tener 1000 caracteres como máximo.',
            'imagen.mimes' => 'Debe ser un archivo de tipo png, jpg, jpeg, webp, svg o gif.',
            'imagen.max' => 'Debe ser una imagen de 3MB como máximo.',
            'destacado.boolean' => 'El campo "Destacado" debe ser booleano.',
            'activo.boolean' => 'El campo "Activo" debe ser booleano.',
        ];
    }
}
