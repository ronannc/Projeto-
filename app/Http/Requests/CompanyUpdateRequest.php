<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CompanyUpdateRequest
 *
 * @package App\Http\Requests
 */
class CompanyUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return User::hasThisPermission('edit_companies');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'               => 'string|max:255',
            'social_reason'      => 'string|max:255',
            'street'             => 'string|max:255',
            'neighborhood'       => 'string|max:255',
            'number'             => 'string|max:10',
            'complement'         => 'nullable|string|max:255',
            'zipcode'            => 'string|size:9',
            'city_id'            => 'integer|exists:cities,id',
            'notify_days_before' => 'integer|min:2|max:10',
        ];
    }
}
