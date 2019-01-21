<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BicepsStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'exercicios' => 'Required',
            'descricao' => 'Required',
        ];
    }

    public function messages()
    {
        return [
            'exercicios.required' => 'O campo Rede é obrigatório.',
            'descricao.required' => "O campo Posto é obrigatório.",
        ];
    }
}
