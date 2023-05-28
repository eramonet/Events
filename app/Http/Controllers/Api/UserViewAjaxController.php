<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\City;
use App\Models\CompareList;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\PromoCode;
use App\Models\Region;
use App\Models\UserAddress;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserViewAjaxController extends Controller
{

    public function get_city($country_id)
    {
        $cities = City::where("country_id", $country_id)->with("country", "regions")->get();
        return $cities;
    }

    public function get_region($city_id)
    {
        $region = Region::where("city_id", $city_id)->get();
        return $region;
    }

    public function get_product($id)
    {
        $product = Product::where("id", $id)->first();

        return $product;
    }

    public function filter_by_price($start_price, $end_price, $term, Request $request)
    {

        $final_array = [];

        $products = Product::where("title_en", 'LIKE', '%' . $term . '%')
            ->orWhere("title_ar", 'LIKE', '%' . $term . '%')
            ->orWhere("slug_ar", 'LIKE', '%' . $term . '%')
            ->orWhere("slug_en", 'LIKE', '%' . $term . '%')
            ->get();

        foreach ($products as $product) {
            if ($request->brands) {
                for ($index = 0; $index < count($request->brands); $index++) {
                    if ($product->category_id == $request->brands[$index]) {
                        if (!in_array($product, $final_array)) {
                            $final_array[] = $product;
                        }
                    }
                }
            }
            if ($product->colors->count() > 0) {
                if ($request->color) {
                    for ($color_index = 0; $color_index < $product->colors->count(); $color_index++) {
                        if ($product->colors[$color_index]->id == $request->color) {
                            if (!in_array($product, $final_array)) {
                                $final_array[] = $product;
                            }
                        }
                    }
                }
            }

            if ($product->sizes->count() > 0) {
                if ($request->sizes) {
                    for ($size_index = 0; $size_index < $product->sizes->count(); $size_index++) {
                        for ($request_size_index = 0; $request_size_index < count($request->sizes); $request_size_index++) {
                            if ($product->sizes[$size_index]->id == $request->sizes[$request_size_index]) {
                                if (!in_array($product, $final_array)) {
                                    $final_array[] = $product;
                                }
                            }
                        }
                    }
                }
            }
        }


        return $final_array;
    }

    public function add_to_compare_list($product_id)
    {
        // check if user guest or auth
        if (auth()->user()) {
            // auth
            $user_id = auth()->user()->id;
            if ($user_id) {
                // check if this product is exist
                $exist = CompareList::where([
                    ["user_id", $user_id],
                    ["product_id", $product_id]
                ])->first();
                if ($exist) {
                    $exist->delete();
                    return "deleted";
                } else {
                    $new_compare_item = CompareList::create([
                        "user_id" => $user_id,
                        "product_id" => $product_id
                    ]);
                    return "created";
                }
            } else {
                $new_compare_item = CompareList::create([
                    "user_id" => $user_id,
                    "product_id" => $product_id
                ]);
                return "created";
            }
        } else {
            // guest
            // check if this is guest before or not

            $guest_value = \Request::ip();

            if ($guest_value) {
                // check if this product is exist
                $exist = CompareList::where([
                    ["user_id", $guest_value],
                    ["product_id", $product_id]
                ])->first();
                if ($exist) {
                    $exist->delete();
                    return "deleted";
                } else {
                    $new_compare_item = CompareList::create([
                        "user_id" => $guest_value,
                        "product_id" => $product_id
                    ]);
                    return "created";
                }
            } else {
                $new_compare_item = CompareList::create([
                    "user_id" => $guest_value,
                    "product_id" => $product_id
                ]);
                return "created";
            }
        }
    }

    public function add_to_cart($product_id)
    {

        $product = Product::find($product_id);
        if ($product->limitation == 0) {
            return "out_of_limitation";
        }

        if ( $product->stock == 0 ) {
            return "out_of_stock";
        }
        // check if user guest or auth
        if (auth()->user()) {
            // auth
            $user_id = auth()->user()->id;

            if ($user_id) {
                // check if this product is exist
                $exist = Cart::where([
                    ["user_id", $user_id],
                    ["product_id", $product_id]
                ])->first();

                

                if ($exist) {
                    // getting product details
                    $product = Product::find($product_id);

                    if ($exist->quantity >= $product->limitation) {
                        return "out_of_limitation";
                    }

                    if ( $exist->quantity >= $product->stock ) {
                        return "out_of_stock";
                    }

                    $exist->update([
                        "quantity" => $exist->quantity + 1
                    ]);
                }else{
                    $new_cart_item = Cart::create([
                        "user_id" => $user_id,
                        "product_id" => $product_id,
                        "quantity" => 1,
                        "size" => $product->sizes->count() > 0 ? $product->sizes[0]->name : null,
                        "color" => $product->colors->count() > 0 ? $product->colors[0]->name : null,
                    ]);
                }
                
                
                
                $all_cart = Cart::with("product")->where("user_id", $user_id)->latest()->get();

                return $all_cart;
            }

            
        } else {
            // guest
            // check if this is guest before or not

            $guest_value = \Request::ip();

            if ($guest_value) {
                // check if this product is exist
                $exist = Cart::where([
                    ["user_id", $guest_value],
                    ["product_id", $product_id]
                ])->first();



                if ($exist) {
                    // getting product details
                    $product = Product::find($product_id);

                    if ($exist->quantity >= $product->limitation) {
                        return "out_of_limitation";
                    }

                    if ( $exist->quantity >= $product->stock ) {
                        return "out_of_stock";
                    }

                    $exist->update([
                        "quantity" => $exist->quantity + 1
                    ]);
                } else {
                    // getting this product
                    $product = Product::find($product_id);

                    $new_cart_item = Cart::create([
                        "user_id" => $guest_value,
                        "product_id" => $product_id,
                        "color" => count($product->colors) > 0 ? $product->colors[0]->name : null,
                        "size" => count($product->sizes) > 0 ? $product->sizes[0]->name : null,
                        "quantity" => 1
                    ]);
                }
            } else {
                $product = Product::find($product_id);
                $new_cart_item = Cart::create([
                    "user_id" => $guest_value,
                    "product_id" => $product_id,
                    "color" => count($product->colors) > 0 ? $product->colors[0]->name : null,
                    "size" => count($product->sizes) > 0 ? $product->sizes[0]->name : null,
                    "quantity" => 1
                ]);
            }

            $all_cart = Cart::with("product")->where("user_id", $guest_value)->latest()->get();

            return $all_cart;
        }
    }

    public function remove_item_from_cart($item_id)
    {
        if (auth()->user()) {
            // getting this element
            $exist = Cart::find($item_id);

            if ($exist) {
                $exist->delete();
            }

            $all_cart = Cart::with("product")->where("user_id", auth()->user()->id)->latest()->get();

            return $all_cart;
        } else {
            // getting this element
            $exist = Cart::find($item_id);

            if ($exist) {
                $exist->delete();
            }

            $all_cart = Cart::with("product")->where("user_id", \Request::ip())->latest()->get();

            return $all_cart;
        }
    }


    public function add_to_cart_from_modal($product, $quantity)
    {
        $product = Product::find($product);
        if ($product->limitation == 0) {
            return "out_of_limitation";
        }
        // check if user guest or auth
        if (auth()->user()) {
            // auth
            $user_id = auth()->user()->id;

            // check if this product is exist
            $exist = Cart::where([
                ["user_id", $user_id],
                ["product_id", $product->id]
            ])->first();

            if ($exist) {
                // getting product details
                $product_item = Product::find($product);

                if ($exist->quantity >= $product_item->limitation) {
                    return "out_of_limitation";
                }

                $exist->update([
                    "quantity" => $exist->quantity + $quantity
                ]);
            } else {
                $new_cart_item = Cart::create([
                    "user_id" => $user_id,
                    "product_id" => $product->id,
                    "quantity" => $quantity
                ]);
            }
            $all_cart = Cart::with("product")->where("user_id", $user_id)->latest()->get();

            return $all_cart;
        } else {
            // guest
            // check if this is guest before or not

            $guest_value = \Request::ip();

            $exist = Cart::where([
                ["user_id", $guest_value],
                ["product_id", $product->id]
            ])->first();

            if ($exist) {
                // getting product details
                $product_item = Product::find($product);

                if ($exist->quantity >= $product_item->limitation) {
                    return "out_of_limitation";
                }

                $exist->update([
                    "quantity" => $exist->quantity + $quantity
                ]);
            } else {
                $new_cart_item = Cart::create([
                    "user_id" => $guest_value,
                    "product_id" => $product->id,
                    "quantity" => $quantity
                ]);
            }

            $all_cart = Cart::with("product")->where("user_id", $guest_value)->latest()->get();

            return $all_cart;
        }
    }

    public function empty_cart_after_counter_down()
    {
        if (auth()->user()) {
            $allcart = Cart::where("user_id", auth()->user()->id)->get();
            if (count($allcart) > 0) {
                foreach ($allcart as $item) {
                    $item->delete();
                }
            }
        } else {
            $allcart = Cart::where("user_id", \Request::ip())->get();
            if (count($allcart) > 0) {
                foreach ($allcart as $item) {
                    $item->delete();
                }
            }
        }

        return "done";
    }

    public function add_to_wishlist($product_id)
    {
        if (auth()->user()) {
            // auth
            $user_id = auth()->user()->id;
            $exist = Wishlist::where([
                ["user_id", $user_id],
                ["product_id", $product_id]
            ])->first();

            if ($exist) {
                $exist->delete();
                return "deleted";
            }

            $create = Wishlist::create([
                "user_id" => $user_id,
                "product_id" => $product_id
            ]);

            return "created";
        } else {
            // guest
            $exist = Wishlist::where([
                ["user_id", \Request::ip()],
                ["product_id", $product_id]
            ])->first();

            if ($exist) {
                $exist->delete();
                return "deleted";
            }

            $create = Wishlist::create([
                "user_id" => \Request::ip(),
                "product_id" => $product_id
            ]);

            return "created";
        }
    }

    public function add_to_cart_user_view($product, Request $request)
    {
        $product_get = Product::find($product);
        if ($product_get->limitation == 0) {
            return "out_of_limitation";
        }

        if ($product_get->stock == 0) {
            return "out_of_stock";
        }

        // check if user guest or auth
        if (auth()->user()) {
            // auth
            $user_id = auth()->user()->id;

            $exist = Cart::where([
                ["user_id", $user_id],
                ["product_id", $product],
                ["color", $request->color],
                ["size", $request->size]
            ])->first();

            // getting product details
            $product_item = Product::find($product);

            // check limitation
            $get_cart_items = Cart::where([
                ["user_id", $user_id],
                ["product_id", $product],
            ])->get();

            $limitation_count = 0;
            if (count($get_cart_items) > 0) {
                foreach ($get_cart_items as $cart_items) {
                    $limitation_count += $cart_items->quantity;
                }
            }

            if ($limitation_count >= $product_item->limitation || $request->quantity > $product_item->limitation) {
                return "out_of_limitation";
            }

            if ($limitation_count >= $product_item->stock || $request->quantity > $product_item->stock) {
                return "out_of_stock";
            }

            if ($exist) {

                $exist->update([
                    "quantity" => $exist->quantity + $request->quantity
                ]);
            } else {
                $new_cart_item = Cart::create([
                    "user_id" => $user_id,
                    "product_id" => $product,
                    "quantity" => $request->quantity,
                    "color" => $request->color,
                    "size" => $request->size
                ]);
            }
            $all_cart = Cart::with("product")->where("user_id", $user_id)->latest()->get();

            return $all_cart;
        } else {
            // guest
            // check if this is guest before or not

            $guest_value = \Request::ip();

            $exist = Cart::where([
                ["user_id", $guest_value],
                ["product_id", $product],
                ["color", $request->color],
                ["size", $request->size]
            ])->first();

            // getting product details
            $product_item = Product::find($product);

            // check limitation
            $get_cart_items = Cart::where([
                ["user_id", $guest_value],
                ["product_id", $product],
            ])->get();

            $limitation_count = 0;
            foreach ($get_cart_items as $cart_items) {
                $limitation_count += $cart_items->quantity;
            }

            if ($limitation_count >= $product_item->limitation || $request->quantity > $product_item->limitation) {
                return "out_of_limitation";
            }

            if ($limitation_count >= $product_item->stock || $request->quantity > $product_item->stock) {
                return "out_of_stock";
            }
            

            if ($exist) {
                $exist->update([
                    "quantity" => $exist->quantity + $request->quantity
                ]);
            } else {
                $new_cart_item = Cart::create([
                    "user_id" => $guest_value,
                    "product_id" => $product,
                    "quantity" => $request->quantity,
                    "color" => $request->color,
                    "size" => $request->size
                ]);
            }

            $all_cart = Cart::with("product")->where("user_id", $guest_value)->latest()->get();

            return $all_cart;
        }
    }

    public function filter_category_page($sub_id)
    {
        if ($sub_id == "all") {
            $products = Product::latest()->get();
            return $products;
        }
        $products = Product::where("category_id", $sub_id)->with("category")->latest()->get();

        return $products;
    }

    public function update_cart_in_db_with_change_price($cart_item, $quntity)
    {
        $this_cart = Cart::where("id", $cart_item)->first();
        if ($this_cart) {
            $this_cart->update([
                "quantity" => $quntity
            ]);
        }

        return Cart::where("id", $cart_item)->with(["product" => function ($product) {
            $product->with("taxes");
        }])->first();
    }

    public function calculate_total_price_in_cart()
    {
        $user = "";
        $final_price = 0;
        $total_taxes = 0;
        $products_prices = 0;
        if (auth()->user()) {
            $user = auth()->user()->id;
        } else {
            $user = \Request::ip();
        }

        $all_cart = Cart::where("user_id", $user)->get();

        return $all_cart;
    }

    public function adding_new_address(Request $request)
    {
        if (!$request->address || !$request->country_id || !$request->city_id || !$request->region_id) {
            return "error1";
        }
        // check if exist
        $exist = UserAddress::where([
            ["user_id", auth()->user()->id],
            ["address", $request->address],
            ["country_id", $request->country_id],
            ["city_id", $request->city_id],
            ["region_id", $request->region_id]
        ])->first();

        if ($exist) {
            return "error2";
        }

        $adding_new_address = UserAddress::create([
            "address" => $request->address,
            "country_id" => $request->country_id,
            "city_id" => $request->city_id,
            "region_id" => $request->region_id,
            "user_id" => auth()->user()->id
        ]);
        return UserAddress::where("user_id", auth()->user()->id)->with("user", "country", "city", "region")->latest()->get();
    }

    public function remove_address($address_id)
    {
        UserAddress::find($address_id)->delete();
        return UserAddress::where("user_id", auth()->user()->id)->with("user", "country", "city", "region")->latest()->get();
    }

    public function validate_promo_code(Request $request)
    {
        if ($request->promocode) {
            // check coupon if exist or if expired or if status [ active || inactive ]

            $promo_code = PromoCode::where("title", $request->promocode)->first();

            if (!$promo_code || Carbon::now()->toDateTimeString() > $promo_code->to || $promo_code->status == 0) {
                return "invalid";
            }

            // check what this code assigned to [ all_users , females , males , special_user ]
            // [1] all users
            if ($promo_code->dedicated_to == "all_users") {
                return $promo_code;
            } else if ($promo_code->dedicated_to == "females") {
                if (auth()->user()->gender != "female") {
                    return "invalid";
                } else {
                    return $promo_code;
                }
                // [3] males
            } else if ($promo_code->dedicated_to == "male") {
                if (auth()->user()->gender != "male") {
                    return "invalid";
                } else {
                    return $promo_code;
                }
            } else if ($promo_code->dedicated_to == "spacial_user") {
                if ($promo_code->user_id != auth()->user()->id || $promo_code->user_id == null) {
                    return "invalid";
                } else {
                    return $promo_code;
                }
            }
        }
    }

    public function filter_product_page(Request $request)
    {
        $sub_category = ProductCategory::sub()->where("slug_en", $request->slug)->first();

        $products = [];
        if ($request->key == "First 50 Product" || $request->key == 'اول 50 منتج') {
            $products = Product::where('category_id', $sub_category->id)->limit(50)->with("category")->get();
        } else if ($request->key == "First 24 Product" || $request->key == 'اول 24 منتج') {
            $products = Product::where('category_id', $sub_category->id)->limit(24)->with("category")->get();
        } else if ($request->key == "All Products" || $request->key == 'كل المنتجات') {
            $products = Product::where('category_id', $sub_category->id)->with("category")->get();
        } else if ($request->key == "New" || $request->key == 'المنتجات الجديده فقظ') {
            $products = Product::where('category_id', $sub_category->id)->latest()->with("category")->get();
        } else if ($request->key == "Old" || $request->key == 'المنتجات القديمه فقط') {
            $products = Product::where('category_id', $sub_category->id)->with("category")->get();
        }
        return $products;
    }
}
