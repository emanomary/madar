<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'title'=> 'required|string|max:255|min:5',
            'description'=> 'required|string|min:10',
            'url'=>'nullable|regex:/https:\/\/www\.youtube\.com\/watch\?v=[^&]+/',
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'string' =>  __('validation.string'),
            'max' => __('validation.max.string'),
            'min' => __('validation.min.string'),
            'regex' => __('validation.mimes'),
        ];
    }
}
