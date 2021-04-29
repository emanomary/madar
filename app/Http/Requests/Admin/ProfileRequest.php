<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'name'=> 'required|string|max:255',
            'email'=> 'required|string|email|max:255|unique:users,email,'.$this->id,
            'password'=> 'confirmed|min:8|nullable|string',
            'avatar'=> 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'mimes' => __('validation.mimes'),
            'image' => __('validation.image'),
            'date' => __('validation.date'),
            'email' => __('validation.email'),
            'confirmed' => __('validation.date'),
        ];
    }
}
