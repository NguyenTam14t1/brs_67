<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:5|max:32',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => trans('login.msg.email_required'),
            'email.email' => trans('login.msg.email_format'),
            'password.required' => trans('login.msg.password_required'),
            'password.min' => trans('login.msg.password_min'),
            'password.max' => trans('login.msg.password_max'),
        ];
    }
}
