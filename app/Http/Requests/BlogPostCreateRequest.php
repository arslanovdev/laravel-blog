<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return auth()->check();
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
            'title'       => 'required|min:5|max:200|unique:blog_post',
            'slug'        => 'max:200',
            'content_raw' => 'required|string|min:5|max:10000',
            'category_id'   => 'required|integer|exists:blog_categories,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Введите заголвок статьи',
            'content_raw.min' => 'Минимальная длина статьи [:min] символов',
        ];
    }
}
