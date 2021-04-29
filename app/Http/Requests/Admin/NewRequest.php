<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class NewRequest extends FormRequest
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
            'title' => 'required|string|max:255|min:3|unique:news,title,'.$this->id,
            'slug' => 'required|string|max:255|min:3|unique:news,slug,'.$this->id,
            'details' => 'nullable|string|min:10',
            'image' => 'required_without:id|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'publishDate' => 'required|date',
            'publishTime' => 'required',
            'category_id' => 'required',
        ];
    }

    /**
     * Show the validation messages that apply to the request.
     * @return array
     */
    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'string' =>  __('validation.string'),
            'max' => __('validation.max.string'),
            'min' => __('validation.min.string'),
            'required_without' => __('validation.required_without'),
            'mimes' => __('validation.mimes'),
            'image' => __('validation.image'),
            'date' => __('validation.date'),
        ];
    }
}
