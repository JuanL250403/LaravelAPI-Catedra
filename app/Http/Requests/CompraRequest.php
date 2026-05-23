<?php

namespace App\Http\Requests;

use App\Models\Videojuego;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Override;

class CompraRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "compra" => 'required',
            "compra.direccion_envio" => ['required', 'string'],
            "compra.metodo_pago_id" => ['required', 'exists:metodos_pagos,id'],
            "detalles" => ['required', 'array'],
            "detalles.*.videojuego_id" => ['required', 'integer', 'exists:videojuegos,id'],
            "detalles.*.cantidad" => [
                'required',
                'integer',
                'min:1',
                function ($atributo, $valor, $fallo) {
                    preg_match('/detalles\.(\d+)\.cantidad/', $atributo, $matches);
                    $index = $matches[1];
                    $cantidadJuego = Videojuego::where('id', $this->input("detalles.{$index}.videojuego_id"))->value('cantidad');

                    if ($cantidadJuego < $valor) {
                        $fallo("Cantidad de producto insuficiente");
                    }
                }
            ],
        ];
    }

    public function messages(): array
    {
        return [

            'compra.required' =>
            'La información de la compra es obligatoria.',

            'compra.direccion_envio.required' =>
            'La dirección de envío es obligatoria.',

            'compra.direccion_envio.string' =>
            'La dirección de envío debe ser texto.',

            'compra.metodo_pago_id.required' =>
            'Debe seleccionar un método de pago.',

            'compra.metodo_pago_id.exists' =>
            'El método de pago seleccionado no existe.',

            'detalles.required' =>
            'Debe agregar al menos un producto.',

            'detalles.array' =>
            'Los detalles de compra son inválidos.',

            'detalles.*.videojuego_id.required' =>
            'Debe seleccionar un videojuego.',

            'detalles.*.videojuego_id.integer' =>
            'El identificador del videojuego es inválido.',

            'detalles.*.videojuego_id.exists' =>
            'El videojuego seleccionado no existe.',

            'detalles.*.cantidad.required' =>
            'La cantidad es obligatoria.',

            'detalles.*.cantidad.integer' =>
            'La cantidad debe ser un número entero.',

            'detalles.*.cantidad.min' =>
            'La cantidad mínima permitida es 1.',
        ];
    }

    #[Override]
    function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errores' => $validator->errors()->all()
        ], 400));
    }
}
