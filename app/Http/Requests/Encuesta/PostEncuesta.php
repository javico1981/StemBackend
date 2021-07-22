<?php

namespace App\Http\Requests\Encuesta;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class PostEncuesta extends FormRequest
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
            'pregunta1' => 'required',
            'pregunta2' => 'nullable',
            'pregunta3' => 'nullable',
            'pregunta4' => 'nullable',
            'pregunta5' => 'nullable',
            'pregunta6' => 'required',
            'pregunta7' => 'required',
            'pregunta8' => 'nullable',
            'pregunta9' => 'required',
            'created_by' => 'required',
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
