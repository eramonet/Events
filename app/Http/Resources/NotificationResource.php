<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotificationResource extends JsonResource
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
            'title' => $lang == 'en' ? $this->title_en : $this->title_ar,
            'desc' => $lang == 'en' ? $this->desc_en : $this->desc_ar,
            'order_id'=>$this->order_id!=null?$this->order_id:0,
            'code_id' => $this->code_id != null ? $this->code_id : 0,
            'message_id' => $this->message_id != null ? $this->message_id : 0,
            'created_at' => $this->created_at,

        ];
    }
}