<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Cart;
use App\Models\City;
use App\Models\Color;
use App\Models\ContactMessage;
use App\Models\ContactUs;
use App\Models\Country;
use App\Models\FirstAdv;
use App\Models\MainSlider;
use App\Models\Notification;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderTaxes;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\ProductMedia;
use App\Models\ProductSize;
use App\Models\ProductTax;
use App\Models\ProductWith;
use App\Models\PromoCode;
use App\Models\SecondAdvs;
use App\Models\Size;
use App\Models\Splash;
use App\Models\Tax;
use App\Models\TermsAndConditions;
use App\Models\Wishlist;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class HomeController extends Controller
{
    public function categories()
    {
        $lang =  (Request()->hasHeader('lang')) ? Request()->header('lang') : 'en';
        if ($lang == 'en') {
            $categories = ProductCategory::select('id','title_en as title')->latest()->get();
            return response()->json(["all_main_cats" => $categories]);
        } else {
            $categories = ProductCategory::select('id', 'title_ar as title')->latest()->get();
            return response()->json(["all_main_cats" => $categories]);
        }
    }

    public function get_category($id)
    {

        // $category = ProductCategory::with("sub_catagories")->where(["slug_ar" => $slug])->orWhere(["slug_en" => $slug])->first();

        // if (!$category) {
        //     return response()->json(["errors" => "invalid catgeory"], 404);
        // }
        // return response($category);
        $lang =  (Request()->hasHeader('lang')) ? Request()->header('lang') : 'en';
        $category = ProductCategory::where('id',$id)->get();
        if (!isset($category)) {
            if ($lang == "en") {
                return response()->json(["errors" => "invalid catgeory"], 404);
            } else {
                return response()->json(["errors" => "القسم غير موجود"], 404);
            }
        } else {
            $categoryData = array();
            $i = 0;
            foreach ($category as $c) {
                $categoryData[$i]['id'] = $c->id;
                $categoryData[$i]['title'] = $lang == "en" ? $c->title_en : $c->title_ar;
                $categoryData[$i]['slug'] = $lang == "en" ? $c->slug_en : $c->slug_ar;
                $categoryData[$i]['summary'] = $lang == "en" ? $c->summary_en : $c->summary_ar;
                $categoryData[$i]['description'] = $lang == "en" ? $c->description_en : $c->description_ar;
                $categoryData[$i]['keywords'] = $lang == "en" ? $c->keywords_en : $c->keywords_ar;
                $categoryData[$i]['image'] = $c->image;
                $categoryData[$i]['status'] = $c->status;
                $categoryData[$i]['admin_id'] = $c->admin_id;
                $categoryData[$i]['parent_id'] = $c->parent_id;
                $categoryData[$i]['created_at'] = $c->created_at;
                $categoryData[$i]['updated_at'] = $c->updated_at;
                $categoryData[$i]['deleted_at'] = $c->deleted_at;
                $categoryData[$i]['image_url'] = $c->image_url;
                $categoryData[$i]['type'] = $c->type;
                $subcategories = ProductCategory::where('parent_id', $c->id)->get();
                $res_subs_item = [];
                $res_subs_list = [];
                foreach ($subcategories as $sub) {
                    $res_subs_item['id'] = $sub->id;
                    $res_subs_item['title'] = $lang == "en" ? $sub->title_en : $sub->title_ar;
                    $res_subs_item['slug'] = $lang == "en" ? $sub->slug_en : $sub->slug_ar;
                    $res_subs_item['summary'] = $lang == "en" ? $sub->summary_en : $sub->summary_ar;
                    $res_subs_item['description'] = $lang == "en" ? $sub->description_en : $sub->description_ar;
                    $res_subs_item['keywords'] = $lang == "en" ? $sub->keywords_en : $sub->keywords_ar;
                    $res_subs_item['image'] = $sub->image;
                    $res_subs_item['status'] = $sub->status;
                    $res_subs_item['admin_id'] = $sub->admin_id;
                    $res_subs_item['parent_id'] = $sub->parent_id;
                    $res_subs_item['created_at'] = $sub->created_at;
                    $res_subs_item['updated_at'] = $sub->updated_at;
                    $res_subs_item['deleted_at'] = $sub->deleted_at;
                    $res_subs_item['image_url'] = $sub->image_url;
                    $res_subs_item['type'] = $sub->type;
                    $res_subs_list[] = $res_subs_item;
                }

                $categoryData[$i]['sub_categories'] = $res_subs_list;
                $i++;
            }
            return response($categoryData);
        }
    }

    public function latest_products()
    {
        $lang =  (Request()->hasHeader('lang')) ? Request()->header('lang') : 'en';
        if ($lang == 'en') {
            $latest_products = Product::select('id','real_price', 'purchase_price', 'title_en as title', 'slug_en as slug')->latest()->take(4)->get();

            return response()->json(["all_products" => $latest_products]);
        } else {
            $latest_products = Product::select('id', 'real_price', 'purchase_price', 'title_ar as title', 'slug_ar as slug')->latest()->take(4)->get();

            return response()->json(["all_products" => $latest_products]);
        }
    }

    public function all_products()
    {
        $lang =  (Request()->hasHeader('lang')) ? Request()->header('lang') : 'en';
        $products = Product::get();
        $allproducts = array();
        $i = 0;
        foreach ($products as $product) {
            $allproducts[$i]['id'] = $product->id;
            $allproducts[$i]['title'] =  $lang == 'en' ? $product->title_en : $product->title_ar;
            $allproducts[$i]['slug'] =  $lang == 'en' ? $product->slug_en : $product->slug_ar;
            $allproducts[$i]['sku_number'] = $product->sku_number;
            $allproducts[$i]['model_number'] = $product->model_number;
            $allproducts[$i]['description'] = $lang == 'en' ? $product->description_en : $product->description_ar;
            $allproducts[$i]['keywords'] = $lang == 'en' ? $product->keywords_en : $product->keywords_ar;
            $allproducts[$i]['primary_image'] = $product->primary_image;
            $allproducts[$i]['to'] = $product->to;
            $allproducts[$i]['details'] = $lang == 'en' ? $product->details_en : $product->details_ar;
            $allproducts[$i]['summary'] = $lang == 'en' ? $product->summary_en : $product->summary_ar;
            $allproducts[$i]['instructions'] = $lang == 'en' ? $product->instructions_en : $product->instructions_ar;
            $allproducts[$i]['features'] = $lang == 'en' ? $product->features_en : $product->features_ar;
            $allproducts[$i]['extras'] = $lang == 'en' ? $product->extras_en : $product->extras_ar;
            $allproducts[$i]['material'] = $product->material;
            $allproducts[$i]['video'] = $product->video;
            $allproducts[$i]['limitation'] = $product->limitation;
            $allproducts[$i]['shipping'] = $product->shipping;
            $allproducts[$i]['fake_price'] = $product->fake_price;
            $allproducts[$i]['real_price'] = $product->real_price;
            $allproducts[$i]['purchase_price'] = $product->purchase_price;
            $allproducts[$i]['number_of_sales'] = $product->number_of_sales;
            $allproducts[$i]['stock'] = $product->stock;
            $allproducts[$i]['views'] = $product->views;
            $allproducts[$i]['status'] = $product->status;
            $allproducts[$i]['add_products_together'] = $product->add_products_together;
            $allproducts[$i]['admin_id'] = $product->admin_id;
            $allproducts[$i]['category_id'] = $product->category_id;
            $allproducts[$i]['main_category_id'] = $product->main_category_id;
            $allproducts[$i]['city_id'] = $product->city_id;
            $allproducts[$i]['featured_product'] = $product->featured_product;
            $allproducts[$i]['created_at'] = $product->created_at;
            $allproducts[$i]['updated_at'] = $product->updated_at;
            $allproducts[$i]['deleted_at'] = $product->deleted_at;
            $allproducts[$i]['primary_image_url'] = $product->primary_image_url;
            $allproducts[$i]['profit_percent'] = $product->profit_percent;
            $allproducts[$i]['price_after_taxes'] = $product->price_after_taxes;
            $allproducts[$i]['average_rating'] = $product->average_rating;
            $productTaxes = ProductTax::where('product_id', $product->id)->pluck('tax_id');
            $taxes = Tax::whereIn('id', $productTaxes)->select(
                'id',
                'title_' . $lang . ' as title',
                'status',
                'percentage',
                'admin_id',
                'created_at',
                'updated_at',
                'deleted_at'
            )->get();
            $allproducts[$i]['taxes'] = $taxes;
            $i++;
        }

        return response()->json(["all_products" => $allproducts]);
    }

    public function get_product($id)
    {
        $lang =  (Request()->hasHeader('lang')) ? Request()->header('lang') : 'en';

        //$product = Product::where(["slug_ar" => $slug])->orWhere(["slug_en" => $slug])->orWhere(["id" => $slug])->with("colors", "sizes", "products_with", "media")->get();
        $product = Product::where('id',$id)->get();
        if (!$product) {
            if($lang=="en"){
            return response()->json(["errors" => "invalid product"], 404);
            }else{
                return response()->json(["errors" => "المنتح غير موجود"], 404);
            }
        }else{
            $getproduct = array();
            $i = 0;
            foreach ($product as $p) {
                $getproduct[$i]['id'] = $p->id;
                $getproduct[$i]['title'] =  $lang == 'en' ? $p->title_en : $p->title_ar;
                $getproduct[$i]['slug'] =  $lang == 'en' ? $p->slug_en : $p->slug_ar;
                $getproduct[$i]['sku_number'] = $p->sku_number;
                $getproduct[$i]['model_number'] = $p->model_number;
                $getproduct[$i]['description'] = $lang == 'en' ? $p->description_en : $p->description_ar;
                $getproduct[$i]['keywords'] = $lang == 'en' ? $p->keywords_en : $p->keywords_ar;
                $getproduct[$i]['primary_image'] = $p->primary_image;
                $getproduct[$i]['to'] = $p->to;
                $getproduct[$i]['details'] = $lang == 'en' ? $p->details_en : $p->details_ar;
                $getproduct[$i]['summary'] = $lang == 'en' ? $p->summary_en : $p->summary_ar;
                $getproduct[$i]['instructions'] = $lang == 'en' ? $p->instructions_en : $p->instructions_ar;
                $getproduct[$i]['features'] = $lang == 'en' ? $p->features_en : $p->features_ar;
                $getproduct[$i]['extras'] = $lang == 'en' ? $p->extras_en : $p->extras_ar;
                $getproduct[$i]['material'] = $p->material;
                $getproduct[$i]['video'] = $p->video;
                $getproduct[$i]['limitation'] = $p->limitation;
                $getproduct[$i]['shipping'] = $p->shipping;
                $getproduct[$i]['fake_price'] = $p->fake_price;
                $getproduct[$i]['real_price'] = $p->real_price;
                $getproduct[$i]['purchase_price'] = $p->purchase_price;
                $getproduct[$i]['number_of_sales'] = $p->number_of_sales;
                $getproduct[$i]['stock'] = $p->stock;
                $getproduct[$i]['views'] = $p->views;
                $getproduct[$i]['status'] = $p->status;
                $getproduct[$i]['add_products_together'] = $p->add_products_together;
                $getproduct[$i]['admin_id'] = $p->admin_id;
                $getproduct[$i]['category_id'] = $p->category_id;
                $getproduct[$i]['main_category_id'] = $p->main_category_id;
                $getproduct[$i]['city_id'] = $p->city_id;
                $getproduct[$i]['featured_product'] = $p->featured_product;
                $getproduct[$i]['created_at'] = $p->created_at;
                $getproduct[$i]['updated_at'] = $p->updated_at;
                $getproduct[$i]['deleted_at'] = $p->deleted_at;
                $getproduct[$i]['primary_image_url'] = $p->primary_image_url;
                $getproduct[$i]['profit_percent'] = $p->profit_percent;
                $getproduct[$i]['price_after_taxes'] = $p->price_after_taxes;
                $getproduct[$i]['average_rating'] = $p->average_rating;
                $productColors = ProductColor::where('product_id', $p->id)->pluck('color_id');
                $colors = Color::whereIn('id', $productColors)->select(
                    'id',
                    'name',
                    'code',
                    'created_at',
                    'updated_at'
                )->get();
                $getproduct[$i]['colors'] = $colors;

                $productSizes = ProductSize::where('product_id', $p->id)->pluck('size_id');
                $sizes = Size::whereIn('id', $productSizes)->select(
                    'id',
                    'name',
                    'created_at',
                    'updated_at'
                )->get();
                $getproduct[$i]['sizes'] = $sizes;


                $getRelated=ProductWith::where('product_id',$p->id)->pluck('product_with_id');
                $relatedProducts=Product::whereIn('id',$getRelated)->get();

                $allproducts = array();
                $i = 0;
                foreach ($relatedProducts as $product) {
                    $allproducts[$i]['id'] = $product->id;
                    $allproducts[$i]['title'] =  $lang == 'en' ? $product->title_en : $product->title_ar;
                    $allproducts[$i]['slug'] =  $lang == 'en' ? $product->slug_en : $product->slug_ar;
                    $allproducts[$i]['sku_number'] = $product->sku_number;
                    $allproducts[$i]['model_number'] = $product->model_number;
                    $allproducts[$i]['description'] = $lang == 'en' ? $product->description_en : $product->description_ar;
                    $allproducts[$i]['keywords'] = $lang == 'en' ? $product->keywords_en : $product->keywords_ar;
                    $allproducts[$i]['primary_image'] = $product->primary_image;
                    $allproducts[$i]['to'] = $product->to;
                    $allproducts[$i]['details'] = $lang == 'en' ? $product->details_en : $product->details_ar;
                    $allproducts[$i]['summary'] = $lang == 'en' ? $product->summary_en : $product->summary_ar;
                    $allproducts[$i]['instructions'] = $lang == 'en' ? $product->instructions_en : $product->instructions_ar;
                    $allproducts[$i]['features'] = $lang == 'en' ? $product->features_en : $product->features_ar;
                    $allproducts[$i]['extras'] = $lang == 'en' ? $product->extras_en : $product->extras_ar;
                    $allproducts[$i]['material'] = $product->material;
                    $allproducts[$i]['video'] = $product->video;
                    $allproducts[$i]['limitation'] = $product->limitation;
                    $allproducts[$i]['shipping'] = $product->shipping;
                    $allproducts[$i]['fake_price'] = $product->fake_price;
                    $allproducts[$i]['real_price'] = $product->real_price;
                    $allproducts[$i]['purchase_price'] = $product->purchase_price;
                    $allproducts[$i]['number_of_sales'] = $product->number_of_sales;
                    $allproducts[$i]['stock'] = $product->stock;
                    $allproducts[$i]['views'] = $product->views;
                    $allproducts[$i]['status'] = $product->status;
                    $allproducts[$i]['add_products_together'] = $product->add_products_together;
                    $allproducts[$i]['admin_id'] = $product->admin_id;
                    $allproducts[$i]['category_id'] = $product->category_id;
                    $allproducts[$i]['main_category_id'] = $product->main_category_id;
                    $allproducts[$i]['city_id'] = $product->city_id;
                    $allproducts[$i]['featured_product'] = $product->featured_product;
                    $allproducts[$i]['created_at'] = $product->created_at;
                    $allproducts[$i]['updated_at'] = $product->updated_at;
                    $allproducts[$i]['deleted_at'] = $product->deleted_at;
                    $allproducts[$i]['primary_image_url'] = $product->primary_image_url;
                    $allproducts[$i]['profit_percent'] = $product->profit_percent;
                    $allproducts[$i]['price_after_taxes'] = $product->price_after_taxes;
                    $allproducts[$i]['average_rating'] = $product->average_rating;
                    $productTaxes = ProductTax::where('product_id', $product->id)->pluck('tax_id');
                    $taxes = Tax::whereIn('id', $productTaxes)->select(
                        'id',
                        'title_' . $lang . ' as title',
                        'status',
                        'percentage',
                        'admin_id',
                        'created_at',
                        'updated_at',
                        'deleted_at'
                    )->get();
                    $allproducts[$i]['taxes'] = $taxes;
                    $i++;
                }

                $getproduct[$i]['products_with'] = $allproducts;




















                $medias = ProductMedia::where('product_id', $p->id)->get();
                 $getproduct[$i]['media'] = $medias;

                $productTaxes = ProductTax::where('product_id', $p->id)->pluck('tax_id');
                $taxes = Tax::whereIn('id', $productTaxes)->select(
                    'id',
                    'title_' . $lang . ' as title',
                    'status',
                    'percentage',
                    'admin_id',
                    'created_at',
                    'updated_at',
                    'deleted_at'
                )->get();
                $getproduct[$i]['taxes'] = $taxes;
                $i++;
            }

            return response()->json(["all_products" => $getproduct]);
        }
        //return response()->json(["all_products" => $product]);
    }

    // cart functionality
    public function add_to_cart(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        App::setLocale($lang);

        $validator = Validator::make($request->all(), [
            "cart" => 'required'
        ]);



        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        // validate if item out of stock
        foreach (json_decode($request->cart) as $item) {
            $product = Product::find($item->product_id);

            if (!$product) {
                if ($lang == 'en') {
                    return response()->json(["errors" => "product not found !"], 404);
                } else {
                    return response()->json(["errors" => "! المنتج غير موجود"], 404);
                }
            }

            if ($item->quantity > $product->stock) {
                if ($lang == 'en') {
                    return response()->json(["errors" => "out of stock !"], 404);
                } else {
                    return response()->json(["errors" => "! لا يوجد منتجات متوفره للكميه المطلوبه"], 404);
                }
            }
        }

        // looping throught cart
        foreach (json_decode($request->cart) as $item) {
            $arr = [];
            // validat product
            $product = Product::find($item->product_id);

            if (!$product) {
                if ($lang == 'en') {
                    return response()->json(["errors" => "product not found !"], 404);
                } else {
                    return response()->json(["errors" => "! المنتج غير موجود"], 404);
                }
            }

            // validate quantity
            if ($item->quantity <= 0) {
                if ($lang == 'en') {
                    return response()->json(["errors" => "invalid quantity !"], 404);
                } else {
                    return response()->json(["errors" => "! كمية غير صحيحة"], 404);
                }
            }

            // limitation
            if ($item->quantity >= $product->limitation) {
                if ($lang == 'en') {
                    return response()->json(["errors" => "out of limitation !"], 404);
                } else {
                    return response()->json(["errors" => "! لا يمكن طلب اكثر من الحد المحدد"], 404);
                }
            }

            $arr["user_id"] = Auth::user()->id;
            $arr["product_id"] = $item->product_id;
            $arr["quantity"] = $item->quantity;

            // check if this user added this product or not
            $check = Cart::where([["user_id", $arr["user_id"]], ["product_id", $arr["product_id"]]])->first();

            if ($check) {
                if ($check->quantity >= $product->limitation) {
                    if ($lang == 'en') {
                        return response()->json(["errors" => "out of limitation !"], 404);
                    } else {
                        return response()->json(["errors" => "! لا يمكن طلب اكثر من الحد المحدد"], 404);
                    }
                }
                $check->update([
                    "quantity" => $check->quantity + $arr["quantity"]
                ]);
            } else {
                // saving data to cart
                $cart = Cart::create([
                    "quantity" => $arr["quantity"],
                    "user_id" => $arr["user_id"],
                    "product_id" => $arr["product_id"]
                ]);
            }
        }
        if ($lang == 'en') {
            return response()->json(["msg" => "added to cart successfully !"], 200);
        } else {
            return response()->json(["msg" => "! تم اضافة المنتج للسلة بنجاح"], 200);
        }
    }

    public function my_cart()
    {
        $my_cart = Cart::with("product")->where("user_id", Auth::user()->id)->get();

        $total_price = 0;
        $total_taxes = 0;

        foreach ($my_cart as $item) {
            if (count($item->product["taxes"]) > 0) {
                foreach ($item->product["taxes"] as $tax) {
                    if ($tax->status == 1) {
                        $total_taxes += $item->product->real_price * ($tax->percentage / 100);
                    }
                }
            }

            $total_price += $item->product['real_price'] * $item->quantity;
        }

        // total price and taxes
        $total_price += $total_taxes;
        // return response()->json(["cart" => $my_cart , "total_price" => $total_price]);
        return response()->json(["cart_data" => $my_cart]);
    }

    public function delete_item_from_cart(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        App::setLocale($lang);

        $validator = Validator::make($request->all(), [
            "item_id" => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        $check = Cart::find($request->item_id);
        if (!$check) {
            if ($lang == 'en') {
                return response()->json(["errors" => "item not found ! "], 404);
            } else {
                return response()->json(["errors" => "! المنتج غير موجود"], 404);
            }
        }

        $check->delete();
        if ($lang == 'en') {
            return response()->json(["msg" => "item deleted successfully"]);
        } else {
            return response()->json(["msg" => "تم حذف المنتج بنجاح"]);
        }
    }

    public function empty_cart(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';

        $cart = Cart::where("user_id", Auth::user()->id)->get();
        foreach ($cart as $item) {
            $item->delete();
        }
        if ($lang == 'en') {
            return response()->json(["msg" => "cart is empty"]);
        } else {
            return response()->json(["msg" => "البطاقه خاليه"]);
        }
    }

    // wishlist functionality
    public function add_remove_item_wishlist(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        App::setLocale($lang);

        $validator = Validator::make($request->all(), [
            "products" => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        // check if this product is exist
        foreach (json_decode($request->products) as $product) {
            $exist = Product::find($product);
            if (!$exist) {
                if ($lang == 'en') {
                    return response()->json(["errors" => "product not found !"], 404);
                } else {
                    return response()->json(["errors" => "! المنتج غير موجود"], 404);
                }
            }

            // check if found to remove it
            $remove_item = Wishlist::where([["user_id", Auth::user()->id], ["product_id", $product]])->first();
            if ($remove_item) {
                $remove_item->delete();
            } else {
                // creating new item inside wishlist
                $wishlist = Wishlist::create([
                    "product_id" => $product,
                    "user_id" => Auth::user()->id
                ]);
            }
        }
        if ($lang == 'en') {
            return response()->json(["msg" => "wishlist updated successfully ! "]);
        } else {
            return response()->json(["msg" => "! تم تحديث قائمة الرغبات بنجاح"]);
        }
    }

    public function my_wishlist()
    {
        $wishlist = Wishlist::with("product")->where("user_id", Auth::user()->id)->get();

        return response($wishlist);
    }

    public function empty_wishlist(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        App::setLocale($lang);

        $wishlist = Wishlist::where("user_id", Auth::user()->id)->get();
        foreach ($wishlist as $item) {
            $item->delete();
        }
        if ($lang == 'en') {
            return response()->json(["msg" => "wishlist is empty"]);
        } else {
            return response()->json(["msg" => "قائمة الرغبات فارغة"]);
        }
    }

    public function home_page_search(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        App::setLocale($lang);

        $validator = Validator::make($request->all(), [
            'key' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        $products = Product::where("title_en", 'LIKE', '%' . $request->key . '%')
            ->orWhere("title_ar", 'LIKE', '%' . $request->key . '%')
            ->orWhere("slug_ar", 'LIKE', '%' . $request->key . '%')
            ->orWhere("slug_en", 'LIKE', '%' . $request->key . '%')
            ->get();
        $allproducts = array();
        $i = 0;
        foreach ($products as $product) {
            $allproducts[$i]['id'] = $product->id;
            $allproducts[$i]['title'] =  $lang == 'en' ? $product->title_en : $product->title_ar;
            $allproducts[$i]['slug'] =  $lang == 'en' ? $product->slug_en : $product->slug_ar;
            $allproducts[$i]['sku_number'] = $product->sku_number;
            $allproducts[$i]['model_number'] = $product->model_number;
            $allproducts[$i]['description'] = $lang == 'en' ? $product->description_en : $product->description_ar;
            $allproducts[$i]['keywords'] = $lang == 'en' ? $product->keywords_en : $product->keywords_ar;
            $allproducts[$i]['primary_image'] = $product->primary_image;
            $allproducts[$i]['to'] = $product->to;
            $allproducts[$i]['details'] = $lang == 'en' ? $product->details_en : $product->details_ar;
            $allproducts[$i]['summary'] = $lang == 'en' ? $product->summary_en : $product->summary_ar;
            $allproducts[$i]['instructions'] = $lang == 'en' ? $product->instructions_en : $product->instructions_ar;
            $allproducts[$i]['features'] = $lang == 'en' ? $product->features_en : $product->features_ar;
            $allproducts[$i]['extras'] = $lang == 'en' ? $product->extras_en : $product->extras_ar;
            $allproducts[$i]['material'] = $product->material;
            $allproducts[$i]['video'] = $product->video;
            $allproducts[$i]['limitation'] = $product->limitation;
            $allproducts[$i]['shipping'] = $product->shipping;
            $allproducts[$i]['fake_price'] = $product->fake_price;
            $allproducts[$i]['real_price'] = $product->real_price;
            $allproducts[$i]['purchase_price'] = $product->purchase_price;
            $allproducts[$i]['number_of_sales'] = $product->number_of_sales;
            $allproducts[$i]['stock'] = $product->stock;
            $allproducts[$i]['views'] = $product->views;
            $allproducts[$i]['status'] = $product->status;
            $allproducts[$i]['add_products_together'] = $product->add_products_together;
            $allproducts[$i]['admin_id'] = $product->admin_id;
            $allproducts[$i]['category_id'] = $product->category_id;
            $allproducts[$i]['main_category_id'] = $product->main_category_id;
            $allproducts[$i]['city_id'] = $product->city_id;
            $allproducts[$i]['featured_product'] = $product->featured_product;
            $allproducts[$i]['created_at'] = $product->created_at;
            $allproducts[$i]['updated_at'] = $product->updated_at;
            $allproducts[$i]['deleted_at'] = $product->deleted_at;
            $allproducts[$i]['primary_image_url'] = $product->primary_image_url;
            $allproducts[$i]['profit_percent'] = $product->profit_percent;
            $allproducts[$i]['price_after_taxes'] = $product->price_after_taxes;
            $allproducts[$i]['average_rating'] = $product->average_rating;
            $productTaxes = ProductTax::where('product_id', $product->id)->pluck('tax_id');
            $taxes = Tax::whereIn('id', $productTaxes)->select(
                'id',
                'title_' . $lang . ' as title',
                'status',
                'percentage',
                'admin_id',
                'created_at',
                'updated_at',
                'deleted_at'
            )->get();
            $allproducts[$i]['taxes'] = $taxes;
            $i++;
        }


        return response($allproducts);
    }

    public function terms_and_conditions(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        if ($lang == 'en') {
            $terms_and_conditions = TermsAndConditions::select('term_and_condition_en as term_and_condition_')->get();
            return response($terms_and_conditions);
        } else {
            $terms_and_conditions = TermsAndConditions::select('term_and_condition_ar as term_and_condition_')->get();
            return response($terms_and_conditions);
        }
    }

    public function contact_us()
    {
        $contact_us = ContactUs::get();
        return response($contact_us);
    }

    public function send_message(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        App::setLocale($lang);

        $validator = Validator::make($request->all(), [
            "name" => 'required',
            "email" => 'required|email',
            "phone" => 'required|min:10',
            "subject" => 'required',
            "message" => 'required',
            "iam_not_robot" => 'required|in:true,false'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        if ($request->iam_not_robot != true) {
            if ($lang == 'en') {
                return response()->json(["errors" => "you not confirm i am not robot checker"], 404);
            } else {
                return response()->json(["errors" => "أنت لا تؤكد أنني لست مدقق روبوت"], 404);
            }
        }

        $contact_us_message = ContactMessage::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "subject" => $request->subject,
            "message" => $request->message,
            "ip_address" => $request->ip()
        ]);
        if ($lang == 'en') {
            return response()->json(["msg" => "message is sent !"]);
        } else {
            return response()->json(["msg" => "تم إرسال الرسالة!"]);
        }
    }

    public function about_us(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        if ($lang == 'en') {
            $about_us = AboutUs::select('about_us_en as about_us')->get();
            return response($about_us);
        } else {
            $about_us = AboutUs::select('about_us_ar as about_us')->get();
            return response($about_us);
        }
    }

    public function send_query(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "fullname" => 'required',
            "email" => 'required|email',
            "phone" => 'required|min:10',
            "message" => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }
        return $request;
    }

    public function myNotifications(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        $notifications = Notification::where("user_id", Auth::user()->id)->get();
        $allnotifications = array();
        $i          = 0;
        foreach ($notifications as $notification) {
            $allnotifications[$i] = array(
                'title'     => $lang == "en" ? $notification->title_en : $notification->title_ar,
                'body'     => $lang == "en" ? $notification->desc_en : $notification->desc_ar,
                'image' => $notification->image != null ? $notification->image : null,
                'link' => $notification->link != null ? $notification->link : null,
                'time' => $notification->created_at,
                'orderId' => $notification->order_id != null ? $notification->order_id : null,

            );
            $i++;
        }
        return response($allnotifications);
    }

    public function ads(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        if ($lang == 'en') {
            $ads = FirstAdv::select(
                'id',
                'small_text_en as small_text',
                'big_text_en as big_text',
                'link',
                'created_at',
                'updated_at'
            )->get();
            return response($ads);
        } else {
            $ads = FirstAdv::select(
                id,
                'small_text_ar as small_text',
                'big_text_ar as big_text',
                'link',
                'created_at',
                'updated_at'
            )->get();
            return response($ads);
        }
    }

    public function AllSpecialOffers()
    {
        $offers = SecondAdvs::latest()->get();
        return response()->json(["partners" => $offers]);
    }

    public function splash(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        if ($lang == 'en') {
            $screens = Splash::where('status', '1')->select(
                'id',
                'number',
                'title_en as title',
                'image',
                'details_en as details'
            )->get();
            return response()->json(["all_screens" => $screens]);
        } else {
            $screens = Splash::where('status', '1')->select(
                'id',
                'number',
                'title_ar as title',
                'image',
                'details_ar as details'
            )->get();
            return response()->json(["all_screens" => $screens]);
        }
    }

    public function homepage_slider()
    {
        $homepage_sliders = MainSlider::latest()->get();
        return response()->json(["homepage_sliders" => $homepage_sliders]);
    }

    public function featured_products(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';
        $featured_products = Product::featured()->latest()->get();
        $allproducts = array();
        $i = 0;
        foreach ($featured_products as $product) {
            $allproducts[$i]['id'] = $product->id;
            $allproducts[$i]['title'] =  $lang == 'en' ? $product->title_en : $product->title_ar;
            $allproducts[$i]['slug'] =  $lang == 'en' ? $product->slug_en : $product->slug_ar;
            $allproducts[$i]['sku_number'] = $product->sku_number;
            $allproducts[$i]['model_number'] = $product->model_number;
            $allproducts[$i]['description'] = $lang == 'en' ? $product->description_en : $product->description_ar;
            $allproducts[$i]['keywords'] = $lang == 'en' ? $product->keywords_en : $product->keywords_ar;
            $allproducts[$i]['primary_image'] = $product->primary_image;
            $allproducts[$i]['to'] = $product->to;
            $allproducts[$i]['details'] = $lang == 'en' ? $product->details_en : $product->details_ar;
            $allproducts[$i]['summary'] = $lang == 'en' ? $product->summary_en : $product->summary_ar;
            $allproducts[$i]['instructions'] = $lang == 'en' ? $product->instructions_en : $product->instructions_ar;
            $allproducts[$i]['features'] = $lang == 'en' ? $product->features_en : $product->features_ar;
            $allproducts[$i]['extras'] = $lang == 'en' ? $product->extras_en : $product->extras_ar;
            $allproducts[$i]['material'] = $product->material;
            $allproducts[$i]['video'] = $product->video;
            $allproducts[$i]['limitation'] = $product->limitation;
            $allproducts[$i]['shipping'] = $product->shipping;
            $allproducts[$i]['fake_price'] = $product->fake_price;
            $allproducts[$i]['real_price'] = $product->real_price;
            $allproducts[$i]['purchase_price'] = $product->purchase_price;
            $allproducts[$i]['number_of_sales'] = $product->number_of_sales;
            $allproducts[$i]['stock'] = $product->stock;
            $allproducts[$i]['views'] = $product->views;
            $allproducts[$i]['status'] = $product->status;
            $allproducts[$i]['add_products_together'] = $product->add_products_together;
            $allproducts[$i]['admin_id'] = $product->admin_id;
            $allproducts[$i]['category_id'] = $product->category_id;
            $allproducts[$i]['main_category_id'] = $product->main_category_id;
            $allproducts[$i]['city_id'] = $product->city_id;
            $allproducts[$i]['featured_product'] = $product->featured_product;
            $allproducts[$i]['created_at'] = $product->created_at;
            $allproducts[$i]['updated_at'] = $product->updated_at;
            $allproducts[$i]['deleted_at'] = $product->deleted_at;
            $allproducts[$i]['primary_image_url'] = $product->primary_image_url;
            $allproducts[$i]['profit_percent'] = $product->profit_percent;
            $allproducts[$i]['price_after_taxes'] = $product->price_after_taxes;
            $allproducts[$i]['average_rating'] = $product->average_rating;
            $productTaxes = ProductTax::where('product_id', $product->id)->pluck('tax_id');
            $taxes = Tax::whereIn('id', $productTaxes)->
            select('id',
                'title_' . $lang . ' as title','status','percentage','admin_id',
                'created_at',
                'updated_at',
                'deleted_at')->get();
            $allproducts[$i]['taxes'] = $taxes;
            $i++;
        }
        return response()->json(["featured_products" => $allproducts]);
    }

    public function latest_deals(Request $request)
    {
        $lang = ($request->hasHeader('lang')) ? $request->header('lang') : 'en';

        $today = Carbon::now();

        $all_deals = [];

        $products = Product::latest()->get();
        // foreach ($products as $product) {
        //     if ($product->to > $today->toDateTimeString()) {
        //         if (!in_array($product, $all_deals)) {
        //             $all_deals[] = $product;
        //         }
        //     }
        // }

        // return $all_deals;
        $allproducts = array();
        $i = 0;
        foreach ($products as $product) {
            if ($product->to > $today->toDateTimeString()) {
                if (!in_array($product, $all_deals)) {
                    $allproducts[$i]['id'] = $product->id;
                    $allproducts[$i]['title'] =  $lang == 'en' ? $product->title_en : $product->title_ar;
                    $allproducts[$i]['slug'] =  $lang == 'en' ? $product->slug_en : $product->slug_ar;
                    $allproducts[$i]['sku_number'] = $product->sku_number;
                    $allproducts[$i]['model_number'] = $product->model_number;
                    $allproducts[$i]['description'] = $lang == 'en' ? $product->description_en : $product->description_ar;
                    $allproducts[$i]['keywords'] = $lang == 'en' ? $product->keywords_en : $product->keywords_ar;
                    $allproducts[$i]['primary_image'] = $product->primary_image;
                    $allproducts[$i]['to'] = $product->to;
                    $allproducts[$i]['details'] = $lang == 'en' ? $product->details_en : $product->details_ar;
                    $allproducts[$i]['summary'] = $lang == 'en' ? $product->summary_en : $product->summary_ar;
                    $allproducts[$i]['instructions'] = $lang == 'en' ? $product->instructions_en : $product->instructions_ar;
                    $allproducts[$i]['features'] = $lang == 'en' ? $product->features_en : $product->features_ar;
                    $allproducts[$i]['extras'] = $lang == 'en' ? $product->extras_en : $product->extras_ar;
                    $allproducts[$i]['material'] = $product->material;
                    $allproducts[$i]['video'] = $product->video;
                    $allproducts[$i]['limitation'] = $product->limitation;
                    $allproducts[$i]['shipping'] = $product->shipping;
                    $allproducts[$i]['fake_price'] = $product->fake_price;
                    $allproducts[$i]['real_price'] = $product->real_price;
                    $allproducts[$i]['purchase_price'] = $product->purchase_price;
                    $allproducts[$i]['number_of_sales'] = $product->number_of_sales;
                    $allproducts[$i]['stock'] = $product->stock;
                    $allproducts[$i]['views'] = $product->views;
                    $allproducts[$i]['status'] = $product->status;
                    $allproducts[$i]['add_products_together'] = $product->add_products_together;
                    $allproducts[$i]['admin_id'] = $product->admin_id;
                    $allproducts[$i]['category_id'] = $product->category_id;
                    $allproducts[$i]['main_category_id'] = $product->main_category_id;
                    $allproducts[$i]['city_id'] = $product->city_id;
                    $allproducts[$i]['featured_product'] = $product->featured_product;
                    $allproducts[$i]['created_at'] = $product->created_at;
                    $allproducts[$i]['updated_at'] = $product->updated_at;
                    $allproducts[$i]['deleted_at'] = $product->deleted_at;
                    $allproducts[$i]['primary_image_url'] = $product->primary_image_url;
                    $allproducts[$i]['profit_percent'] = $product->profit_percent;
                    $allproducts[$i]['price_after_taxes'] = $product->price_after_taxes;
                    $allproducts[$i]['average_rating'] = $product->average_rating;
                    $productTaxes = ProductTax::where('product_id', $product->id)->pluck('tax_id');
                    $taxes = Tax::whereIn('id', $productTaxes)->select(
                        'id',
                        'title_' . $lang . ' as title',
                        'status',
                        'percentage',
                        'admin_id',
                        'created_at',
                        'updated_at',
                        'deleted_at'
                    )->get();
                    $allproducts[$i]['taxes'] = $taxes;
                    $i++;
                }
            }
        }
        return $allproducts;
    }




    public function checkout(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "order_from" => 'required',
            "payment_type" => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }

        $user = Auth::user();

        $promo_code_value = "";
        $promo_code_type = "";

        // validate promocode if found
        if ($request->promocode) {
            // validate promo code
            $exist = PromoCode::where("title", $request->promocode)->first();

            if (!$exist || Carbon::now()->toDateTimeString() > $exist->to || $exist->status == 0) {
                return response()->json(["errors" => "invalid promocode"], 404);
            }

            // check which this promocode assign to ?
            if ($exist->user_id != null) {
                if ($user->id != $exist->user_id) {
                    return response()->json(["errors" => "invalid promocode"], 404);
                }
            }

            if ($exist->dedicated_to == "females") {
                if ($user->gender != "females") {
                    return response()->json(["errors" => "invalid promocode"], 404);
                }
            }

            if ($exist->dedicated_to == "male") {
                if ($user->gender != "male") {
                    return response()->json(["errors" => "invalid promocode"], 404);
                }
            }
        }

        $total_products_price = 0;
        $total_taxes = 0;


        $cart = Cart::where("user_id", $user->id)->latest()->get();

        foreach ($cart as $item) {

            $total_products_price += $item->product->real_price * $item->quantity; // 9000 * 1

            foreach ($item->product->taxes as $taxe) {
                $total_taxes += ($taxe->percentage / 100) * ($item->product->real_price * $item->quantity);
            }
        }

        if (!$user->addresses->count() > 0) {
            return response()->json(["errors" => "you not have any addresses please insert address"], 404);
        }


        $creating_new_order = Order::create([
            "order_number" => Order::latest()->first() ? "order_" . Order::latest()->first()->id + 1 : "order_" . 1,
            "customer_name" => $user->name,
            "customer_email" => $user->email,
            "customer_address" =>  $user->addresses[0]->address,
            "customer_phone" => $user->phone,
            "customer_promo_code_title" => $request->promocode ? $request->promocode : null,
            "customer_promo_code_value" => $request->promocode ? $promo_code_value : null,
            "customer_promo_code_type" => $request->coupon ? $promo_code_type : null,
            "product_total_price" => $total_products_price,
            "total_taxes_price" => $total_taxes,
            "shipping_fees" => $user->addresses[0]->shipping->cost,
            "order_from" => $request->order_from,
            // "cancelled_from",
            "payment_type" => $request->payment_type
        ]);

        // creating order products
        foreach ($cart as $item) {
            $creating_order_products = OrderProduct::create([
                "product_id" => $item->product->id,
                "order_number" => $creating_new_order->order_number,
                "product_title" => $item->product->title_en,
                "price" => $item->product->real_price,
                "product_quantity" => $item->quantity
            ]);


            foreach ($item->product->taxes as $taxe) {
                // creating order taxes
                OrderTaxes::create([
                    "order_number" => $creating_new_order->order_number,
                    "product_name" => $creating_order_products->product_title,
                    "taxe_title" => $taxe->title_en,
                    "taxe_percentage" => $taxe->percentage
                ]);
            }
        }

        foreach ($cart as $item) {
            $item->delete();
        }

        return response()->json(["msg" => "order is created successfully ! "]);
    }

    public function order_details($order_number)
    {
        $this_order = Order::where([
            "customer_phone" => Auth::user()->phone,
            "order_number" => $order_number
        ])->with(["order_products" => function ($order_product) {
            $order_product->with("order_taxes", "products");
        }])->first();

        if (!$this_order) {
            return response()->json(["errors" => "order not found"], 404);
        }

        return response()->json(["order_details" => $this_order]);
    }








































































    public function catpProducts(Request $request,$id)
    {
        $lang =  (Request()->hasHeader('lang')) ? Request()->header('lang') : 'en';
        $validator = Validator::make($request->all(), [
            "key" => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(["errors" => $validator->errors()], 404);
        }
        $key=$request->key;
        if($key=="1"){
        $products = Product::where('category_id',$id)->get();
        $allproducts = array();
        $i = 0;
        foreach ($products as $product) {
            $allproducts[$i]['id'] = $product->id;
            $allproducts[$i]['title'] =  $lang == 'en' ? $product->title_en : $product->title_ar;
            $allproducts[$i]['slug'] =  $lang == 'en' ? $product->slug_en : $product->slug_ar;
            $allproducts[$i]['sku_number'] = $product->sku_number;
            $allproducts[$i]['model_number'] = $product->model_number;
            $allproducts[$i]['description'] = $lang == 'en' ? $product->description_en : $product->description_ar;
            $allproducts[$i]['keywords'] = $lang == 'en' ? $product->keywords_en : $product->keywords_ar;
            $allproducts[$i]['primary_image'] = $product->primary_image;
            $allproducts[$i]['to'] = $product->to;
            $allproducts[$i]['details'] = $lang == 'en' ? $product->details_en : $product->details_ar;
            $allproducts[$i]['summary'] = $lang == 'en' ? $product->summary_en : $product->summary_ar;
            $allproducts[$i]['instructions'] = $lang == 'en' ? $product->instructions_en : $product->instructions_ar;
            $allproducts[$i]['features'] = $lang == 'en' ? $product->features_en : $product->features_ar;
            $allproducts[$i]['extras'] = $lang == 'en' ? $product->extras_en : $product->extras_ar;
            $allproducts[$i]['material'] = $product->material;
            $allproducts[$i]['video'] = $product->video;
            $allproducts[$i]['limitation'] = $product->limitation;
            $allproducts[$i]['shipping'] = $product->shipping;
            $allproducts[$i]['fake_price'] = $product->fake_price;
            $allproducts[$i]['real_price'] = $product->real_price;
            $allproducts[$i]['purchase_price'] = $product->purchase_price;
            $allproducts[$i]['number_of_sales'] = $product->number_of_sales;
            $allproducts[$i]['stock'] = $product->stock;
            $allproducts[$i]['views'] = $product->views;
            $allproducts[$i]['status'] = $product->status;
            $allproducts[$i]['add_products_together'] = $product->add_products_together;
            $allproducts[$i]['admin_id'] = $product->admin_id;
            $allproducts[$i]['category_id'] = $product->category_id;
            $allproducts[$i]['main_category_id'] = $product->main_category_id;
            $allproducts[$i]['city_id'] = $product->city_id;
            $allproducts[$i]['featured_product'] = $product->featured_product;
            $allproducts[$i]['created_at'] = $product->created_at;
            $allproducts[$i]['updated_at'] = $product->updated_at;
            $allproducts[$i]['deleted_at'] = $product->deleted_at;
            $allproducts[$i]['primary_image_url'] = $product->primary_image_url;
            $allproducts[$i]['profit_percent'] = $product->profit_percent;
            $allproducts[$i]['price_after_taxes'] = $product->price_after_taxes;
            $allproducts[$i]['average_rating'] = $product->average_rating;
            $productTaxes = ProductTax::where('product_id', $product->id)->pluck('tax_id');
            $taxes = Tax::whereIn('id', $productTaxes)->select(
                'id',
                'title_' . $lang . ' as title',
                'status',
                'percentage',
                'admin_id',
                'created_at',
                'updated_at',
                'deleted_at'
            )->get();
            $allproducts[$i]['taxes'] = $taxes;
            $i++;
        }

        return response()->json(["all_products" => $allproducts]);
    }else{
            $subategories=ProductCategory::where('parent_id',$id)->pluck('id');
            $products = Product::whereIn('category_id', $subategories)->get();
            $allproducts = array();
            $i = 0;
            foreach ($products as $product) {
                $allproducts[$i]['id'] = $product->id;
                $allproducts[$i]['title'] =  $lang == 'en' ? $product->title_en : $product->title_ar;
                $allproducts[$i]['slug'] =  $lang == 'en' ? $product->slug_en : $product->slug_ar;
                $allproducts[$i]['sku_number'] = $product->sku_number;
                $allproducts[$i]['model_number'] = $product->model_number;
                $allproducts[$i]['description'] = $lang == 'en' ? $product->description_en : $product->description_ar;
                $allproducts[$i]['keywords'] = $lang == 'en' ? $product->keywords_en : $product->keywords_ar;
                $allproducts[$i]['primary_image'] = $product->primary_image;
                $allproducts[$i]['to'] = $product->to;
                $allproducts[$i]['details'] = $lang == 'en' ? $product->details_en : $product->details_ar;
                $allproducts[$i]['summary'] = $lang == 'en' ? $product->summary_en : $product->summary_ar;
                $allproducts[$i]['instructions'] = $lang == 'en' ? $product->instructions_en : $product->instructions_ar;
                $allproducts[$i]['features'] = $lang == 'en' ? $product->features_en : $product->features_ar;
                $allproducts[$i]['extras'] = $lang == 'en' ? $product->extras_en : $product->extras_ar;
                $allproducts[$i]['material'] = $product->material;
                $allproducts[$i]['video'] = $product->video;
                $allproducts[$i]['limitation'] = $product->limitation;
                $allproducts[$i]['shipping'] = $product->shipping;
                $allproducts[$i]['fake_price'] = $product->fake_price;
                $allproducts[$i]['real_price'] = $product->real_price;
                $allproducts[$i]['purchase_price'] = $product->purchase_price;
                $allproducts[$i]['number_of_sales'] = $product->number_of_sales;
                $allproducts[$i]['stock'] = $product->stock;
                $allproducts[$i]['views'] = $product->views;
                $allproducts[$i]['status'] = $product->status;
                $allproducts[$i]['add_products_together'] = $product->add_products_together;
                $allproducts[$i]['admin_id'] = $product->admin_id;
                $allproducts[$i]['category_id'] = $product->category_id;
                $allproducts[$i]['main_category_id'] = $product->main_category_id;
                $allproducts[$i]['city_id'] = $product->city_id;
                $allproducts[$i]['featured_product'] = $product->featured_product;
                $allproducts[$i]['created_at'] = $product->created_at;
                $allproducts[$i]['updated_at'] = $product->updated_at;
                $allproducts[$i]['deleted_at'] = $product->deleted_at;
                $allproducts[$i]['primary_image_url'] = $product->primary_image_url;
                $allproducts[$i]['profit_percent'] = $product->profit_percent;
                $allproducts[$i]['price_after_taxes'] = $product->price_after_taxes;
                $allproducts[$i]['average_rating'] = $product->average_rating;
                $productTaxes = ProductTax::where('product_id', $product->id)->pluck('tax_id');
                $taxes = Tax::whereIn('id', $productTaxes)->select(
                    'id',
                    'title_' . $lang . ' as title',
                    'status',
                    'percentage',
                    'admin_id',
                    'created_at',
                    'updated_at',
                    'deleted_at'
                )->get();
                $allproducts[$i]['taxes'] = $taxes;
                $i++;
            }

            return response()->json(["all_products" => $allproducts]);
    }
    }

}
