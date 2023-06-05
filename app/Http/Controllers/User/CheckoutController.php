<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CheckoutRequest;
use App\Models\Cart;
use App\Models\Country;
use App\Models\MainSectionFooter;
use App\Models\MyAccountSectionFooter;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\OrderTaxes;
use App\Models\Product;
use App\Models\PromoCode;
use App\Models\StoreInformationFooter;
use App\Models\UserAddress;
use App\Models\WhyWeChooseFooter;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // check if user auth or guest
        if (auth()->user()) {
            // main section footer
            $main_section_footer = MainSectionFooter::get();

            // my account section footer
            $my_account_section = MyAccountSectionFooter::get();

            // why we choose
            $why_we_choose = WhyWeChooseFooter::get();

            // store information
            $store_info = StoreInformationFooter::get();

            // user
            $user = auth()->user();

            // countries
            $countries = Country::get();

            // my cart
            $cart = Cart::where("user_id", auth()->user()->id)->latest()->get();

            return view('user.layout.checkout', compact('user', 'countries', 'cart', 'main_section_footer', 'my_account_section', 'why_we_choose', 'store_info'));
        } else {
            $request->session()->put('come_from', 'checkout');
            return redirect('/login');
        }
    }

    public function store_order(CheckoutRequest $request)
    {

        $promo_code_value = "";
        $promo_code_type = "";

        if ($request->coupon) {
            // check coupon if exist or if expired or if status [ active || inactive ]

            $promo_code = PromoCode::where("title", $request->coupon)->first();

            if (!$promo_code || Carbon::now()->toDateTimeString() > $promo_code->to || $promo_code->status == 0) {
                return redirect()->back()->withErrors(["error" => "invalid promo code"]);
            }

            // check what this code assigned to [ all_users , females , males , special_user ]
            // [1] all users
            if ($promo_code->dedicated_to == "all_users") {
                $promo_code_value = $promo_code->value;
                $promo_code_type = $promo_code->type;
                // [2] females
            } else if ($promo_code->dedicated_to == "females") {
                if (auth()->user()->gender != "female") {
                    return redirect()->back()->withErrors(["error" => "invalid promo code"]);
                } else {
                    $promo_code_value = $promo_code->value;
                    $promo_code_type = $promo_code->type;
                }
                // [3] males
            } else if ($promo_code->dedicated_to == "male") {
                if (auth()->user()->gender != "male") {
                    return redirect()->back()->withErrors(["error" => "invalid promo code"]);
                } else {
                    $promo_code_value = $promo_code->value;
                    $promo_code_type = $promo_code->type;
                }
            } else if ($promo_code->dedicated_to == "spacial_user") {
                if ($promo_code->user_id != auth()->user()->id || $promo_code->user_id == null) {
                    return redirect()->back()->withErrors(["error" => "invalid promo code"]);
                } else {
                    $promo_code_value = $promo_code->value;
                    $promo_code_type = $promo_code->type;
                }
            }

            // decrement promocode usage one
            $promo_code->update([
                "maximum_times_of_use" => $promo_code->maximum_times_of_use - 1
            ]);
        }

        $total_products_price = 0;
        $total_taxes = 0;


        $cart = Cart::where("user_id", auth()->user()->id)->latest()->get();

        foreach ($cart as $item) {

            $total_products_price += $item->product->real_price * $item->quantity; // 9000 * 1

            foreach ($item->product->taxes as $taxe) {
                $total_taxes += ($taxe->percentage / 100) * ($item->product->real_price * $item->quantity);
            }
        }



        $creating_new_order = Order::create([
            "order_number" => Order::latest()->first() ? "order_" . Order::latest()->first()->id + 1 : "order_" . 1,
            "customer_name" => auth()->user()->name,
            "customer_email" => auth()->user()->email,
            "customer_address" => auth()->user()->address,
            "customer_phone" => auth()->user()->phone,
            "customer_promo_code_title" => $request->coupon ? $request->coupon : null,
            "customer_promo_code_value" => $request->coupon ? $promo_code_value : null,
            "customer_promo_code_type" => $request->coupon ? $promo_code_type : null,
            "product_total_price" => $total_products_price,
            "total_taxes_price" => $total_taxes,
            "shipping_fees" => auth()->user()->addresses[0]->shipping->cost,
            "order_from" => "web",
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


        $cart = Cart::where("user_id", auth()->user()->id)->latest()->get();

        foreach ($cart as $item) {
            Product::find($item->product->id)->update([
                "stock" => $item->product->stock - $item->quantity
            ]);
        }



        foreach ($cart as $item) {
            $item->delete();
        }

        return redirect('order-details/' . $creating_new_order->order_number);
    }
}
