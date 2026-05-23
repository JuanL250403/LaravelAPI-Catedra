<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Override;

class VideojeugoRequest extends FormRequest
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
            "nombre" => 'required|string|max:100',

            "descripcion" => 'nullable|string|max:1000',

            "cantidad" => 'required|integer|min:0',

            "requisitos_de_sistema" => 'required|string|max:1000',

            "calificacion" => 'required|numeric|min:0|max:5.0|decimal:1',

            "precio_unitario" => 'required|numeric|min:0.25|decimal:2',

            "categoria_id" => 'required|integer|exists:categorias,id'
        ];
    }

    public function messages(): array
    {
        return [

            'nombre.required' =>
            'El nombre del videojuego es obligatorio.',

            'nombre.string' =>
            'El nombre del videojuego debe ser texto.',

            'nombre.max' =>
            'El nombre no puede superar los 100 caracteres.',



            'descripcion.string' =>
            'La descripción debe ser texto.',

            'descripcion.max' =>
            'La descripción no puede superar los 1000 caracteres.',



            'cantidad.required' =>
            'La cantidad disponible es obligatoria.',

            'cantidad.integer' =>
            'La cantidad debe ser un número entero.',

            'cantidad.min' =>
            'La cantidad no puede ser negativa.',



            'requisitos_de_sistema.required' =>
            'Los requisitos del sistema son obligatorios.',

            'requisitos_de_sistema.string' =>
            'Los requisitos del sistema deben ser texto.',

            'requisitos_de_sistema.max' =>
            'Los requisitos del sistema no pueden superar los 1000 caracteres.',



            'calificacion.required' =>
            'La calificación es obligatoria.',

            'calificacion.numeric' =>
            'La calificación debe ser numérica.',

            'calificacion.min' =>
            'La calificación mínima es 0.',

            'calificacion.max' =>
            'La calificación máxima es 5.0',

            'calificacion.decimal' =>
            'La calificación debe tener exactamente 1 decimal.',



            'precio_unitario.required' =>
            'El precio unitario es obligatorio.',

            'precio_unitario.numeric' =>
            'El precio unitario debe ser numérico.',

            'precio_unitario.min' =>
            'El precio mínimo permitido es $0.25.',

            'precio_unitario.decimal' =>
            'El precio debe tener exactamente 2 decimales.',



            'categoria_id.required' =>
            'Debe seleccionar una categoría.',

            'categoria_id.integer' =>
            'La categoría seleccionada es inválida.',

            'categoria_id.exists' =>
            'La categoría seleccionada no existe.',
        ];
    }

    #[Override]
    protected function failedValidation(Validator $validator)
    {

        throw new HttpResponseException(response()->json([
            'success' => false,
            'errores' => $validator->errors()->all()
        ], 400));
    }
}
