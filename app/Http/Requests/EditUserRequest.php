<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
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
            'name' => 'required|max:50',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('admin.msg.name_required'),
            'name.max' => trans('admin.msg.name_max'),
            'email.required' => trans('admin.msg.email_required'),
            'email.email' => trans('admin.msg.email_format'),
        ];
    }
}
