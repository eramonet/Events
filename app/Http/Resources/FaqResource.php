<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FaqResource extends JsonResource
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
            'id' => $this->id,
            'question' => $lang == 'en' ? $this->question_en : $this->question_ar,
            'answer' => $lang == 'en' ? $this->answer_en : $this->answer_ar,
        ];
    }
}