<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'title' => 'bail|required|unique:posts|string|min:5|max:100',
            'summary' => 'bail|required|string|min:10|max:500',
            'body' => 'bail|required|string|min:10',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8048'
        ];
    }
}
