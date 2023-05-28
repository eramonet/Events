<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class MainSliderRequest extends FormRequest
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
            "intro_title_en" => "required",
            "big_text_en" => "required",
            "intro_title_ar" => "required",
            "big_text_ar" => "required",
            "description_en" => "required",
            "description_ar" => "required",
            "link" => "required"
        ];
    }

    public function messages()
    {
        return [
            "main_image.mimes" => "invalid image" ,
            "intro_title_en.required" => "introduction title in english is required" ,
            "big_text_en.required" => "big text in english is required" ,

            "intro_title_ar.required" => "introduction title in arabic is required" ,
            "big_text_ar.required" => "big text in arabic is required" ,

            "description_en.required" => "description in english is required" ,
            "description_ar.required" => "description in arabic is required" ,
            "link.required" => "link is required"
        ];
    }
}
