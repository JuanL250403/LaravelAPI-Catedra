<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Override;

class UsuarioRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6']
        ];
    }

    public function messages(): array
    {
        return [

            'name.required' =>
            'El nombre es obligatorio.',

            'name.string' =>
            'El nombre debe ser texto.',


            'email.required' =>
            'El correo electrónico es obligatorio.',

            'email.email' =>
            'Debe ingresar un correo electrónico válido.',
            'email.unique' =>
            'El correo ya se encuentra registrado',


            'password.required' =>
            'La contraseña es obligatoria.',

            'password.min' =>
            'La contraseña debe tener al menos 6 caracteres.',
        ];
    }

    #[Override]
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errores' => $validator->errors()->all()
        ], 400));
    }
}
