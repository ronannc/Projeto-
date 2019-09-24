<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class WorkoutUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return User::hasThisPermission('edit_workout');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'start' => 'required|date',
            'next_workout' => 'required|date',
            'interval' => 'required|string|max:191',
            'frequency' => 'required|string|max:191',
            'goal_id' => 'required|string|exists:goals,id',
            'client_id' => 'required|string|exists:clients,id',
        ];
    }
}
