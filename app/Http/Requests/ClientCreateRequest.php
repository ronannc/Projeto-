<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class ClientCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return User::hasThisPermission('add_clients');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|required|max:191',
            'cpf' => 'string|required|max:191',
            'sex' => 'string|required',
            'blood_type' =>'required|in:A+,B+,O+,A-,B-,O-,AB+,AB-',
            'phone' =>'required|string|max:191',
            'birthday' => 'required',
            'street' => 'required|string|max:191',
            'neighborhood' => 'required|string|max:191',
            'number' => 'required|integer|max:999999',
            'complement' => 'max:191',
            'zipcode' => 'required|string|max:20',
            'city_id' => 'required|integer|exists:cities,id',
            'company_id' => 'required|string|exists:companies,id',
            'email' => 'required|unique:clients'
        ];
    }
}
