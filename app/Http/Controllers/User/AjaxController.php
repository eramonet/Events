<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\City;
use App\Models\Region;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function get_region( $city_id )
    {
        return Region::where("city_id" , $city_id)->latest()->get() ;
    }

    public function add_to_cart( $product_id , $quantity )
    {
        $user = $this->get_current_user() ;

        // find if this is found
        $exist = $this->get_data_with_multi_constrants(Cart::class , "product_id" , $product_id , "user_id" , $user);

        if( $exist ){
            $input["quantity"] = $exist->quantity + $quantity ;
            $this->update_fun(Cart::class , $exist->id , $input);

            return true ;
        }else{
            $inputs["product_id"] = $product_id ;
            $inputs["user_id"] = $user ;
            $this->create_fun(Cart::class , $inputs);

            return true ;
        }

    }

    public function get_my_cart()
    {
        return Cart::where("user_id" , $this->get_current_user())->with("product")->get();
    }

    public function remove_item_from_cart( $item_id )
    {
        $this->delete_fun(Cart::class , $item_id);
    }

    public function increase_cart_quantity( $item_id )
    {
        $item = $this->show_fun(Cart::class , "id" , $item_id) ;

        $input["quantity"] = $item->quantity + 1 ;

        $this->update_fun(Cart::class , $item->id , $input);

        return Cart::with("product")->find($item_id);
    }

    public function decrease_cart_quantity( $item_id )
    {
        $item = $this->show_fun(Cart::class , "id" , $item_id) ;

        if( $item->quantity == 1 ){
            $input["quantity"] = 1 ;
        }else{
            $input["quantity"] = $item->quantity - 1 ;
        }

        $this->update_fun(Cart::class , $item->id , $input);

        return Cart::with("product")->find($item_id);
    }
}
