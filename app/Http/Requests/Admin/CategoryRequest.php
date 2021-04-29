<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|string|max:100|min:3|unique:categories,name,'.$this->id,
            'slug' => 'required|string|max:100|min:3|unique:categories,slug,'.$this->id,
            'parent_id'=>'nullable',
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
        ];
    }
}
