<?php

namespace App\Http\Resources;

use App\Models\Favourite;
use App\Models\Product;
use App\Models\ProductMedia;
use App\Models\ProductProductWith;
use App\Models\ProductTax;
use App\Models\Tax;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function fave($id)
    {
        $user = User::where('id', request()->user()->id)->first();
        $getfav = Favourite::where('product_id', $id)->where('user_id', $user->id)->first();
        if ($getfav != null) {
            return "1";
        } else {
            return "0";
        }
    }
    public function taxes($id)
    {
        $reaL_price=Product::where('id',$id)->first();
        $productTaxes = ProductTax::where('product_id', $id)->pluck('tax_id');
        $taxes=Tax::whereIn('id',$productTaxes)->sum('percentage');
        if ($taxes != null) {
            $div= $taxes/100;
            $total=$div * $reaL_price->real_price;
            return $total;
        } else {
            return 0;
        }
    }

    public function buy($id,$lang)
    {
        $productsWith=ProductProductWith::where('product_id',$id)->pluck('product_with_id');
        $products=Product::whereIn('id', $productsWith)
        ->take(3)
        ->get();
        $allproducts = array();
        $i = 0;
        foreach ($products as $prod) {
            $allproducts[$i]['id'] = $prod->id;
            $allproducts[$i]['name'] =  $lang == 'en' ? $prod->title_en : $prod->title_ar;
             $allproducts[$i]['image'] = $prod->primary_image_url;
            $allproducts[$i]['real_price'] = $prod->real_price;
             $i++;
        }
        return $allproducts;
     }

    public function toArray($request)
    {
        $lang = getLang();
        $user = User::where('id', isset($request->user()->id))->first();
        return [
            'id'=>$this->id,
            'name' => $lang == 'en' ? $this->title_en : $this->title_ar,
            'is_favourite' => Wishlist::where('product_id', $this->id)->where('user_id', isset($request->user()->id))->first() != null ? "1" : "0",
            'category' => $lang == 'en' ? $this->category->title_en : $this->category->title_ar,
            'availability' => $this->status,
            'model_number' => $this->model_number,
            'in_stock'=>$this->in_stock,
            'in_stock_left'=>$this->in_stock_left,
            'primary_image' => $this->primary_image_url,
            'real_price' => $this->real_price,
            'fake_price' => $this->fake_price,
            'taxes_cost'=> $this->taxes($this->id),
            'model_number' => $this->model_number,
            'sliders'=>ProductMedia::where('product_id',$this->id)->select('id', 'image')->get(),
            'buy_it_with'=> $this->buy($this->id,$lang),
            'features' => $lang == 'en' ? $this->features_en : $this->features_ar,
            'extras' => $lang == 'en' ? $this->extras_en : $this->extras_ar,
            'instructions' => $lang == 'en' ? $this->instructions_en : $this->instructions_ar,

        ];
    }
}