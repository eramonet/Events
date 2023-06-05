<?php

namespace App\Http\Resources;

use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = getLang();
        return [
            'id'               => $this->id,
            'fname'             => $this->fname,
            'lname'             => $this->lname,
            'email'            => $this->email,
            'phone'            => $this->phone,
            'verified_status'  => $this->verified_status == "1" ?  true : false,
            'status'           => $this->status == "0" ? false : true,
            'image'            => $this->image_url,
            'lang'             => $this->lang == "ar" ? "ar" : "en",
            'address'          => $this->address,
            'lat'              => $this->lat,
            'lng'              => $this->lng,
            'city_id'          => $this->city_id,
            'region_id'        => $this->region_id,
            "city_name"      => $lang == "ar" ? City::where('id', $this->city_id)->first()->title_ar : City::where('id', $this->city_id)->first()->title_en,
            "region_name"      => $lang == "ar" ? Region::where('id', $this->region_id)->first()->title_ar : Region::where('id', $this->region_id)->first()->title_en,
            'token'            => $request->bearerToken() != null ? 'Bearer ' . $request->bearerToken() : 'Bearer ' . $this->createToken('access_token')->plainTextToken,
        ];
    }
}