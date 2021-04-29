<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'site_name' => 'required|string|max:255|min:3',
            'mobile' => 'required|string|max:20|min:7',
            'phone' => 'required|string|max:20|min:7',
            'favicon'=> 'required_without:id|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'logo'=> 'required_without:id|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|string|email|max:255|unique:settings,email,'.$this->id,
            'address'=> 'required|string|max:255|min:5',
            'facebook_url'=> 'required|url',
            'twitter_url'=> 'required|url',
            'telegram_url'=> 'required|url',
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
            'url' => __('validation.url'),
            'email' => __('validation.email'),
        ];
    }
}
