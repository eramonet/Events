<?php

namespace App\Http\Resources;

use App\Models\Favourite;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Request;

class HallResource extends JsonResource
{
    public function fave($id)
    {
         $user = User::where('id',request()->user()->id)->first();
        $getfav = Favourite::where('hall_id', $id)->where('user_id', $user->id)->first();
        if ($getfav!=null) {
            return "1";
        } else {
            return "0";
        }
    }
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $lang = getLang();
        $user = User::where('id', isset($request->user()->id))->first();

        return [
            'id' => $this->id,
            'name' => $lang == 'en' ? $this->title_en : $this->title_ar,
            'image' => $this->primary_image_url,
            'rate' => $this->rate,
            'is_favourite' => Wishlist::where('hall_id', $this->id)->where('user_id', isset($request->user()->id))->first() != null ? "1" : "0",

        ];
    }
}