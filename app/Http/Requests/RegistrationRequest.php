<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name' => 'min:3|max:25',
            'nickname' => 'required|min:3|max:25|regex:/^[A-Za-z][A-Za-z0-9_]{3,25}$/|unique:users',
            'email' => 'email|required|min:5|max:255|unique:users',
            'password' => 'required|min:8|max:255|confirmed',
        ];
    }
}
