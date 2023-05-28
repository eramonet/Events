<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\CategoryHall;
use App\Models\ClientsAd;
use App\Models\Hall;
use App\Models\Occasion;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home_page()
    {
        $home_page_ads = ClientsAd::active()->mainHome()->get();

        // Events Category Section
        $events_category_section = Occasion::get();

        // Latest wedding halls
        $weddingHalls = [] ;
        $weddingHallsArray = [] ;

        $wedding_occasion = Occasion::where("title_en" , "wedding")->first();

        if( $wedding_occasion ){
            $weddingHalls = Hall::with([ "category" => function($category) use ( $wedding_occasion ) {
                $category->where("category_id" , $wedding_occasion->id) ;
            }])->limit("5")->latest()->active()->get() ;
        }

        if( count( $weddingHalls ) > 0 ){
            foreach( $weddingHalls as $halls ){
                if( $halls->category->count() > 0 ){
                    $weddingHallsArray[] = $halls ;
                }
            }
        }

        // latest products [ 6 only ]
        $main_categories = ProductCategory::with([ "products" => function($products){
            $products->latest()->limit(6);
        }])->latest()->get() ;

        // return $main_categories ;

        return view('user.welcome' , compact('home_page_ads' , 'events_category_section' , 'weddingHallsArray' , 'main_categories'));
    }
}
