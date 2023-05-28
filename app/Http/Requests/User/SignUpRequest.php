<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SignUpRequest extends FormRequest
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
            "email" => "required|email",
            "phone" => "required",
            "image" => "sometimes|image",
            "bdate" => "required|date",
            "gender" => "required",
            "city_id" => "required|integer",
            "region_id" => "required|integer",
            "firstname" => "required",
            "lastname" => "required",
            "address" => "required",
            "lat" => "required|integer",
            "lang" => "required|integer",
            "password" => "required|min:6",
            "repeatPassword" => "required|same:password",
        ];
    }

}
