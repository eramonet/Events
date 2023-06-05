<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function my_cart()
    {
        $user = $this->get_current_user();

        $my_cart = Cart::where("user_id", $user)->with("product")->latest()->get();

        // return $my_cart[0]->product->taxes[0]->tax ;

        return view('user.cart', compact('my_cart'));
    }
}
