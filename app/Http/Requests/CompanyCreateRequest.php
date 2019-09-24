<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CompanyCreateRequest
 *
 * @package App\Http\Requests
 */
class CompanyCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return User::hasThisPermission('add_companies');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required|string|max:255',
            'social_reason' => 'required|string|max:255',
            'street'        => 'required|string|max:255',
            'neighborhood'  => 'nullable|string|max:255',
            'number'        => 'nullable|string|max:10',
            'complement'    => 'nullable|string|max:255',
            'zipcode'       => 'required|string|size:8',
            'city_id'       => 'required|integer|exists:cities,id',
        ];
    }
}
