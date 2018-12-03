<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
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
            'title' => 'required|max:50',
            'author' => 'required|max:50',
            'publish_date' => 'required',
            'category_id' => 'required',
            'introduction' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => trans('admin.msg.name_required'),
            'title.max' => trans('admin.msg.name_max'),
            'author.required' => trans('admin.msg.author_required'),
            'author.max' => trans('admin.msg.author_max'),
            'publish_date.required' => trans('admin.msg.publish_date_required'),
            'category_id.required' => trans('admin.msg.category_id_required'),
            'introduction.required' => trans('admin.msg.introduction_required'),
            'content.required' => trans('admin.msg.content_required'),
        ];
    }
}
