<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

/**
 * Class UserUpdateRequest
 *
 * @package App\Http\Requests
 */
class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return User::hasThisPermission('edit_users');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->segment(1) == 'profile' ? Auth::user()->id : $this->segment(2);

        return [
            'name'      => 'string|max:100',
            'is_active' => 'boolean',
            'password' => 'required|confirmed',
            'email'     => [
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($id)->where(function ($query) {
                    $query->where('company_id', auth()->user()->company_id);
                })
            ],
        ];
    }
}
