<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PackageResource extends JsonResource
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
            'photographer'=>$this->photographer,
            'number_of_guests'=>$this->number_of_guests,
            'number_of_tables'=>$this->number_of_tables,
            'meal_description'=> $lang == 'en' ? $this->description_en : $this->description_ar,
            'lighting_description' => $lang == 'en' ? $this->lighting_description_en : $this->lighting_description_en,
            'sound_description' => $lang == 'en' ? $this->sound_description_en : $this->sound_description_en,
            'plan_of_the_day_description' => $lang == 'en' ? $this->plan_of_the_day_description_en : $this->plan_of_the_day_description_en,
            'flowers_description' => $lang == 'en' ? $this->flowers_description_en : $this->flowers_description_en,
            'decoration_description' => $lang == 'en' ? $this->decoration_description_en : $this->decoration_description_en,

        ];
    }
}
