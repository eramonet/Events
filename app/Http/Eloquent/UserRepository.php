<?php

namespace App\Http\Eloquent;

use App\Http\Interfaces\UserRepositoryInterface;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\HallDetailsResource;
use App\Http\Resources\HallResource;
use App\Http\Resources\PackageResource;
use App\Http\Resources\ProductResource;
use App\Models\Ad;
use App\Models\Brand;
use App\Models\CategoryHall;
use App\Models\ClientsAd;
use App\Models\Favourite;
use App\Models\Hall;
use App\Models\HallCategory;
use App\Models\Occasion;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Package;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class UserRepository implements UserRepositoryInterface
{
    public function home($lang)
    {
       $categories= HallCategory::where('id','!=',1)
       ->take(4)->orderBy('id','asc')->get();
        $allcats = array();
        $i = 0;
        foreach ($categories as $category) {
            $allcats[$i]['id'] = $category->id;
            $allcats[$i]['name'] =  $lang == 'en' ? $category->title_en : $category->title_ar;
            $allcats[$i]['icon'] = $category->image_url;
            $i++;
        }

        $getWeddingHalls=CategoryHall::where('category_id',6)->pluck('hall_id');
        $weddingsHalls=Hall::whereIn('id', $getWeddingHalls)
        ->take(2)
        ->latest()->get();
        $allweddingshalls = array();
        $i = 0;
        foreach ($weddingsHalls as $whall) {
            $allweddingshalls[$i]['id'] = $whall->id;
            $allweddingshalls[$i]['name'] =  $lang == 'en' ? $whall->title_en : $whall->title_ar;
            $allweddingshalls[$i]['image'] = $whall->primary_image_url;
            $allweddingshalls[$i]['rate'] = $whall->rate;
            $i++;
        }

        $getbirthdaysHalls = CategoryHall::where('category_id', 2)->pluck('hall_id');
        $birthdaysHalls = Hall::whereIn('id', $getbirthdaysHalls)
            ->take(2)
            ->latest()->get();
        $allbirthdayshalls = array();
        $i = 0;
        foreach ($birthdaysHalls as $bhall) {
            $allbirthdayshalls[$i]['id'] = $bhall->id;
            $allbirthdayshalls[$i]['name'] =  $lang == 'en' ? $bhall->title_en : $bhall->title_ar;
            $allbirthdayshalls[$i]['image'] = $bhall->primary_image_url;
            $allbirthdayshalls[$i]['rate'] = $bhall->rate;
            $i++;
        }

         $latestProducts = Product::where('status',1)->where('stock','>','0')
            ->take(4)
            ->latest()->get();
        $allproducts = array();
        $i = 0;
        foreach ($latestProducts as $prod) {
            $allproducts[$i]['id'] = $prod->id;
            $allproducts[$i]['name'] =  $lang == 'en' ? $prod->title_en : $prod->title_ar;
            $allproducts[$i]['desc'] =  $lang == 'en' ? $prod->description_en : $prod->description_ar;
            $allproducts[$i]['image'] = $prod->primary_image_url;
            $allproducts[$i]['real_price'] = $prod->real_price;
            $allproducts[$i]['fake_price'] = $prod->fake_price;
            $allproducts[$i]['percentage'] = number_format(($prod->real_price/$prod->fake_price)*100);
            $allproducts[$i]['category'] = $lang == 'en' ? $prod->category->title_en : $prod->category->title_ar;

            $i++;
        }

        $explorecategories = ProductCategory::whereNull('parent_id')->where('status',1)->get();
        $expcats = array();
        $i = 0;
        foreach ($explorecategories as $cat) {
            $expcats[$i]['id'] = $cat->id;
            $expcats[$i]['name'] =  $cat == 'en' ? $cat->title_en : $cat->title_ar;
            $expcats[$i]['image'] = $cat->image;
            $i++;
        }


        $getOrdersIds=Order::where('status','delivered')->pluck('id');
        $bestSellers=OrderProduct::
        select(DB::raw('COUNT(id) as cnt,product_id'))
        ->whereIn('order_id', $getOrdersIds)
        ->groupBy('product_id')
        ->orderBy('cnt','desc')->get();
         $allbestsellersproducts = array();
        $i = 0;
        foreach ($bestSellers as $bprods) {
            $allbestsellersproducts[$i]['id'] = $bprods->product_id;
            $productDetails=Product::where('id', $bprods->product_id)->first();
            $allbestsellersproducts[$i]['name'] = $lang == 'en' ? $productDetails->title_en : $productDetails->title_ar;
            $allbestsellersproducts[$i]['desc'] =  $lang == 'en' ? $productDetails->description_en : $productDetails->description_ar;
            $allbestsellersproducts[$i]['image'] = $productDetails->primary_image_url;
            $allbestsellersproducts[$i]['real_price'] = $productDetails->real_price;
            $allbestsellersproducts[$i]['fake_price'] = $productDetails->fake_price;
            $allbestsellersproducts[$i]['percentage'] = number_format(($productDetails->real_price / $productDetails->fake_price) * 100);
            $allbestsellersproducts[$i]['category'] = $lang == 'en' ? $productDetails->category->title_en  : $productDetails->category->title_ar;

            $i++;
        }

        $ocassions =  Occasion::get();
        $alloccasions = array();
        $i = 0;
        foreach ($ocassions as $ocassion) {
            $alloccasions[$i]['id'] = $ocassion->id;
            $alloccasions[$i]['name'] =  $lang == 'en' ? $ocassion->title_en : $ocassion->title_ar;
            $alloccasions[$i]['logo'] = $ocassion->primary_image;
            $i++;
        }

        $brands =  Brand::get();
        $allbrands = array();
        $i = 0;
        foreach ($brands as $brand) {
            $allbrands[$i]['id'] = $brand->id;
            $allbrands[$i]['name'] =  $lang == 'en' ? $brand->name_en : $brand->name_ar;
            $allbrands[$i]['logo'] = $brand->logo;
            $i++;
        }

        $ads =  ClientsAd::where('location', 'In Mobile App Home')->get();
        $allads = array();
        $i = 0;
        foreach ($ads as $ad) {
            $allads[$i]['id'] = $ad->id;
            $allads[$i]['image'] ='https://dashboard.the-events-app.com/user_assets/uploads/ads/' . $ad->ad->image;
            $allads[$i]['link_url'] = $ad->ad->link;
            $i++;
        }

        $getEngagementsHalls = CategoryHall::where('category_id', 3)->pluck('hall_id');
        $engagementsHalls = Hall::whereIn('id', $getEngagementsHalls)
            ->take(2)
            ->latest()->get();
        $allEngagementshalls = array();
        $i = 0;
        foreach ($engagementsHalls as $ehall) {
            $allEngagementshalls[$i]['id'] = $ehall->id;
            $allEngagementshalls[$i]['name'] =  $lang == 'en' ? $ehall->title_en : $ehall->title_ar;
            $allEngagementshalls[$i]['image'] = $ehall->primary_image_url;
            $allEngagementshalls[$i]['rate'] = $ehall->rate;
            $i++;
        }

        $getconferencesHalls = CategoryHall::where('category_id', 4)->pluck('hall_id');
        $conferencesHalls = Hall::whereIn('id', $getconferencesHalls)
            ->take(2)
            ->latest()->get();
        $allconferenceshalls = array();
        $i = 0;
        foreach ($conferencesHalls as $chall) {
            $allconferenceshalls[$i]['id'] = $chall->id;
            $allconferenceshalls[$i]['name'] =  $lang == 'en' ? $chall->title_en : $chall->title_ar;
            $allconferenceshalls[$i]['image'] = $chall->primary_image_url;
            $allconferenceshalls[$i]['rate'] = $chall->rate;
            $i++;
        }

       $data=[
        'categories'=> $allcats,
        'latest_wedings_halls'=> $allweddingshalls,
        'latest_birthdays_halls' => $allbirthdayshalls,
        'latest_products'=> $allproducts,
        'explore_categories'=> $expcats,
        'best_sellers'=> $allbestsellersproducts,
        'occasions'=> $alloccasions,
        'brands'=> $allbrands,
        'ads' => $allads,
        'latest_engagements_halls'=> $allEngagementshalls,
        'latest_conferences_halls'=> $allconferenceshalls
    ];
       return $data;


   }

   public function eventsCategories($lang)
   {
        $categories = HallCategory::where('id', '!=', 1)->latest()->get();
        return CategoryResource::collection($categories);

   }

   public function eventHalls($lang,$category_id)
   {
    $categoryHalls=CategoryHall::where('category_id',$category_id)->pluck('hall_id');
    $halls=Hall::whereIn('id',$categoryHalls)->get();
    return HallResource::collection($halls);
   }

   public function latestWedingsHalls($lang)
   {
        $getWeddingHalls = CategoryHall::where('category_id', 6)->pluck('hall_id');
        $weddingsHalls = Hall::whereIn('id', $getWeddingHalls)
            ->latest()->get();
        return HallResource::collection($weddingsHalls);
   }

    public function latestBirthdaysHalls($lang)
    {
        $getBirthdaysHalls = CategoryHall::where('category_id', 2)->pluck('hall_id');
        $birthdaysHalls = Hall::whereIn('id', $getBirthdaysHalls)
            ->latest()->get();
        return HallResource::collection($birthdaysHalls);
    }

    public function latestEngagementsHalls($lang)
    {
        $getEngagementsHalls = CategoryHall::where('category_id',3)->pluck('hall_id');
        $engagementsHalls = Hall::whereIn('id', $getEngagementsHalls)
            ->latest()->get();
        return HallResource::collection($engagementsHalls);
    }

    public function latestConferencesHalls($lang)
    {
        $getConferencesHalls = CategoryHall::where('category_id', 4)->pluck('hall_id');
        $conferencesHalls = Hall::whereIn('id', $getConferencesHalls)
            ->latest()->get();
        return HallResource::collection($conferencesHalls);
    }

    public function getProducts($lang)
    {

        $latestProducts = Product::where('status', 1)->where('stock', '>', '0')
            ->latest()->get();
        $allproducts = array();
        $i = 0;
        foreach ($latestProducts as $prod) {
            $allproducts[$i]['id'] = $prod->id;
            $allproducts[$i]['name'] =  $lang == 'en' ? $prod->title_en : $prod->title_ar;
            $allproducts[$i]['desc'] =  $lang == 'en' ? $prod->description_en : $prod->description_ar;
            $allproducts[$i]['image'] = $prod->primary_image_url;
            $allproducts[$i]['real_price'] = $prod->real_price;
            $allproducts[$i]['fake_price'] = $prod->fake_price;
            $allproducts[$i]['percentage'] = number_format(($prod->real_price / $prod->fake_price) * 100);
            $i++;
        }
        return $allproducts;
    }

    public function CheckFavProduct($user_id, $product_id,$hall_id)
    {
        $fav = Favourite::where('user_id',$user_id)->where('product_id',$product_id)
        ->orWhere('hall_id',$hall_id)->first();
        ;
        if ($fav) {
            $fav->delete();
            return 'false';
        }
    }
    public function addFavorite($request)
    {
        $fav = $this->CheckFavProduct($request->user_id,$request->product_id, $request->hall_id);
        if ($fav == 'false') {
            return "false";
        }
        Favourite::create(
            array(
                'user_id' =>$request->user_id,
                'product_id' => $request->product_id,
                'hall_id'=> $request->hall_id
            )
        );
        return "true";
    }


    public function getFavoriteList($user_id, $lang)
    {
        $user = User::where('id',$user_id)->first();
        $productsFav=Favourite::where('user_id',$user->id)
        ->whereNull('hall_id')->pluck('product_id');
        $latestProducts = Product::whereIn('id', $productsFav)->get();
        $allproducts = array();
        $i = 0;
        foreach ($latestProducts as $prod) {
            $allproducts[$i]['id'] = $prod->id;
            $allproducts[$i]['name'] =  $lang == 'en' ? $prod->title_en : $prod->title_ar;
            $allproducts[$i]['desc'] =  $lang == 'en' ? $prod->description_en : $prod->description_ar;
            $allproducts[$i]['image'] = $prod->primary_image_url;
            $allproducts[$i]['real_price'] = $prod->real_price;
            $allproducts[$i]['fake_price'] = $prod->fake_price;
            $allproducts[$i]['percentage'] = number_format(($prod->real_price / $prod->fake_price) * 100);
            $i++;
        }

        $hallsFav=Favourite::where('user_id',$user->id)
        ->whereNull('product_id')->pluck('hall_id');
        $halls=Hall::whereIn('id',$hallsFav)->get();
        $allhalls = array();
        $i = 0;
        foreach ($halls as $hall) {
            $allhalls[$i]['id'] = $hall->id;
            $allhalls[$i]['name'] =  $lang == 'en' ? $hall->title_en : $hall->title_ar;
            $allhalls[$i]['image'] = $hall->primary_image_url;
            $allhalls[$i]['rate'] = $hall->rate;
            $i++;
        }


        $data = [
            'products' => $allproducts,
            'halls' => $allhalls,
        ];
        return $data;
    }

    public function getBrandProducts($lang, $brand_id)
    {
        $brand=ProductBrand::where('brand_id',$brand_id)->pluck('product_id');
        $products = Product::whereIn('id',$brand)
        ->where('status', 1)
        ->where('stock', '>', '0')
        ->latest()->get();
        $allproducts = array();
        $i = 0;
        foreach ($products as $prod) {
            $allproducts[$i]['id'] = $prod->id;
            $allproducts[$i]['name'] =  $lang == 'en' ? $prod->title_en : $prod->title_ar;
            $allproducts[$i]['desc'] =  $lang == 'en' ? $prod->description_en : $prod->description_ar;
            $allproducts[$i]['image'] = $prod->primary_image_url;
            $allproducts[$i]['real_price'] = $prod->real_price;
            $allproducts[$i]['fake_price'] = $prod->fake_price;
            $allproducts[$i]['percentage'] = number_format(($prod->real_price / $prod->fake_price) * 100);
            $i++;
        }
        return $allproducts;
    }

    public function getCategoryProducts($lang, $category_id)
    {
        $category = ProductCategory::where('id', $category_id)->first();
        $products = Product::where('id', $category->id)
            ->where('status', 1)
            ->where('stock', '>', '0')
            ->latest()->get();
        $allproducts = array();
        $i = 0;
        foreach ($products as $prod) {
            $allproducts[$i]['id'] = $prod->id;
            $allproducts[$i]['name'] =  $lang == 'en' ? $prod->title_en : $prod->title_ar;
            $allproducts[$i]['desc'] =  $lang == 'en' ? $prod->description_en : $prod->description_ar;
            $allproducts[$i]['image'] = $prod->primary_image_url;
            $allproducts[$i]['real_price'] = $prod->real_price;
            $allproducts[$i]['fake_price'] = $prod->fake_price;
            $allproducts[$i]['percentage'] = number_format(($prod->real_price / $prod->fake_price) * 100);
            $i++;
        }
        return $allproducts;
    }

    public function getProduct($lang, $product_id)
    {
        $product = Product::where('id', $product_id)->get();
        return ProductResource::collection($product);
    }

    // public function getHall($lang, $hall_id)
    // {
    //     $hall = Hall::where('id', $hall_id)->get();
    //     return HallDetailsResource::collection($hall);
    // }

    public function getPackage($lang, $package_id)
    {
        $package = Package::where('id', $package_id)->get();
        return PackageResource::collection($package);
    }
}