<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostUser extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:150',
            'email' => 'required|email|min:3|max:150|unique:users,email',
            'password' => 'required|min:3|max:150',
            'tipo_usuario' => 'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = [
            "message" => "Error: Hubo un fallo al Guardar",
            "errors" => $validator->errors()
        ];
        throw new HttpResponseException(response()->json($response, 200));
    }
}
