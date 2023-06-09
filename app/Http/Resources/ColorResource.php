<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ColorResource extends JsonResource
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
        'id'=>$this->id,
        'name'=> $lang == 'en' ? $this->name : $this->name_ar,
        'code'=>$this->code
        ];
    }
}