<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRegisterRequest extends FormRequest
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
            'full_name'         => 'required|min:2|max:25',
            'email'             => 'required|email|unique:users',
            'password'          => 'required|min:6',
            'phone_number'      => 'required|numeric|min:9|max:11'
        ];
    }

    public function messages()
    {
        return [
            'required'          => 'This is required',
            'full_name.min'     => 'Name must be at least 2 characters.',
            'full_name.max'     => 'Name should not be greater than 50 characters.',
            'password.min'      => 'Password must be at least 6 characters.',
        ];
    }
}
