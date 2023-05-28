<?php

namespace App\Http\Resources;

use App\Models\HallPackage;
use App\Models\Package;
use Illuminate\Http\Resources\Json\JsonResource;

class HallDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function packages($id,$lang)
    {
        $getPackages=HallPackage::where('hall_id',$id)->pluck('package_id');
        $packages=Package::whereIn('id',$getPackages)->get();
        $allpackages = array();
        $i = 0;
        foreach ($packages as $package) {
            $allpackages[$i]['id'] = $package->id;
            $allpackages[$i]['name'] =  $lang == 'en' ? $package->title_en : $package->title_ar;
            $allpackages[$i]['description'] =  $lang == 'en' ? $package->description_en : $package->description_ar;
            $allpackages[$i]['image'] = $package->image_url;
            $allpackages[$i]['real_price'] = $package->real_price;
            $i++;
        }
        return $allpackages;
    }

    // public function options($id, $lang)
    // {

    // }

    public function toArray($request)
    {
        $lang = getLang();

        return [
            'id'=>$this->id,
            'image' => $this->primary_image_url,
            'name' => $lang == 'en' ? $this->title_en : $this->title_ar,
            'address' => $lang == 'en' ? $this->address_en : $this->address_ar,
            'city' => $lang == 'en' ? $this->city->title_en: $this->city->title_ar,
            'lat' => $this->latitude,
            'lng' => $this->longitude,
            'rate' => $this->rate,
            'about' => $lang == 'en' ? $this->description_en : $this->description_ar,
            'packages'=>$this->packages($this->id,$lang),
         //   'extrea_decorations'=> $this->options($this->id, $lang),
        ];
    }
}