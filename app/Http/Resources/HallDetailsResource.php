<?php

namespace App\Http\Resources;

use App\Models\Available_date;
use App\Models\CategoryHall;
use App\Models\Hall;
use App\Models\HallMedia;
use App\Models\HallPackage;
use App\Models\Package;
use App\Models\PackageOption;
use App\Models\PackageOptionCategory;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class HallDetailsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function packages($id, $lang)
    {
        // $getPackages = Package::where('hall_id', $id)->pluck('package_id');
        $packages = Package::where('hall_id', $id)->get();
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

    public function decorations($id, $lang)
    {
        $decorations = PackageOptionCategory::where('hall_id', $id)->get();

        $alldecorations = array();
        $i = 0;
        foreach ($decorations as $decoration) {
            $alldecorations[$i]['id'] = $decoration->id;
            $alldecorations[$i]['name'] =  $lang == 'en' ? $decoration->title_en : $decoration->title_ar;
            $alldecorations[$i]['image'] = $decoration->image_url;
            if ($lang == 'en') {
                $getOptions = PackageOption::where('category_id', $decoration->id)
                    ->select('id', 'title_en as title', 'image as image_url', 'limitation', 'price')
                    ->get();
            } else {
                $getOptions = PackageOption::where('category_id', $decoration->id)
                    ->select('id', 'title_ar as title', 'image as image_url', 'limitation', 'price')
                    ->get();
            }
            $alldecorations[$i]['options'] = $getOptions;
            $i++;
        }
        return $alldecorations;
    }

    public function toArray($request)
    {
        $lang = getLang();

        return [
            'id' => $this->id,
            'image' => $this->primary_image_url,
            'name' => $lang == 'en' ? $this->title_en : $this->title_ar,
            'address' => $lang == 'en' ? $this->address_en : $this->address_ar,
            'city' => $lang == 'en' ? $this->city->title_en : $this->city->title_ar,
            'lat' => $this->latitude,
            'lng' => $this->longitude,
            'rate' => $this->rate,
            'extra_guests' => $this->guests_capacity,
            'about' => $lang == 'en' ? $this->description_en : $this->description_ar,
            'packages' => $this->packages($this->id, $lang),
            'decorations' => $this->decorations($this->id, $lang),
            'sliders' => HallMedia::where('hall_id', $this->id)->select('id', 'image as image_url')->get(),
            'available_dates' => Available_date::where('hall_id', $this->id)->get(),
        ];
    }
}
