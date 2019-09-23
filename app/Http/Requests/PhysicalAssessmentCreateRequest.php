<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class PhysicalAssessmentCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return User::hasThisPermission('add_physical_assessment');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'neck' => 'integer|required|min:1|max:9999999',
            'shoulder' => 'integer|required|min:1|max:9999999',
            'chest' => 'integer|required|min:1|max:9999999',
            'right_arm' => 'integer|required|min:1|max:9999999',
            'left_arm' => 'integer|required|min:1|max:9999999',
            'right_forearm' => 'integer|required|min:1|max:9999999',
            'left_forearm' => 'integer|required|min:1|max:9999999',
            'waist' => 'integer|required|min:1|max:9999999',
            'abdomen' => 'integer|required|min:1|max:9999999',
            'hip' => 'integer|required|min:1|max:9999999',
            'right_thigh' => 'integer|required|min:1|max:9999999',
            'left_thigh' => 'integer|required|min:1|max:9999999',
            'right_calf' => 'integer|required|min:1|max:9999999',
            'left_calf' => 'integer|required|min:1|max:9999999',
            'height' => 'numeric|required|min:1|max:5',
            'weight' => 'numeric|required|min:1|max:500',
            'blood_pressure' => 'string|required'
        ];
    }
}
