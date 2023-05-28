<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class FirstAdvsRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "main_image" => "sometimes|mimes:jpeg,png,jpg",
            "small_text_en" => "required",
            "big_text_en" => "required",
            "small_text_ar" => "required",
            "big_text_ar" => "required",
            "link" => "required"
        ];
    }

    public function messages()
    {
        return [
            "main_image.mimes" => "invalid image" ,
            "small_text_en.required" => "samll text title in english is required" ,
            "big_text_en.required" => "big text in english is required" ,
            "small_text_ar.required" => "samll text in arabic title is required" ,
            "big_text_ar.required" => "big text in arabic is required" ,
            "link.required" => "link is required"
        ];
    }
}
