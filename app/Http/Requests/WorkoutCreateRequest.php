<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class WorkoutCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return User::hasThisPermission('add_workout');;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start' => 'required',
            'next_workout' => 'required',
            'interval' => 'required|string|max:191',
            'frequency' => 'required|string|max:191',
            'client_id' => 'required|string|exists:clients,id',
        ];
    }
}
