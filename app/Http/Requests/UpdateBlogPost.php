<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogPost extends FormRequest
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
            'title' => [
                'required',
                'string',
                Rule::unique('posts')->ignore($this->post->id),
            ],
            'summary' => 'bail|required|string|min:10|max:500',
            'body' => 'bail|required|string|min:10',
            'thumbnail' => 'bail|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:8048'
        ];
    }
}
