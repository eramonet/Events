<?php

namespace App\Http\Requests\UserFront;

use Illuminate\Foundation\Http\FormRequest;

class OurFeaturesRequest extends FormRequest
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
            "icon" => "sometimes|mimes:jpeg,png,jpg" ,
            "title_en" => "required" ,
            "sub_title_en" => "required",
            "title_ar" => "required" ,
            "sub_title_ar" => "required"
        ];
    }

    function messages()
    {
        return [
            "icon.mimes" => "invalid image" ,
            "title_en.required" => "title in english is required" ,
            "sub_title_en.required" => "sub title in english is required" ,
            "title_ar.required" => "title in arabic is required" ,
            "sub_title_ar.required" => "sub title in arabic is required"
        ];
    }
}
