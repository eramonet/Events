<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Cart;
use App\Models\Color;
use App\Models\CompareList;
use App\Models\ContactUs;
use App\Models\MainSectionFooter;
use App\Models\MyAccountSectionFooter;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductTopAdv;
use App\Models\ProductUnderAdv;
use App\Models\Size;
use App\Models\StoreInformationFooter;
use App\Models\TermsAndConditions;
use App\Models\WhyWeChooseFooter;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class MainFunctionalityController extends Controller
{
    public function search(Request $request)
    {
        if ($request->term == "") {
            return redirect('/');
        } else {
            // Obour land
            $matching = Product::where("title_en", 'LIKE', '%' . $request->term . '%')
                ->orWhere("title_ar", 'LIKE', '%' . $request->term . '%')
                ->orWhere("slug_ar", 'LIKE', '%' . $request->term . '%')
                ->orWhere("slug_en", 'LIKE', '%' . $request->term . '%')
                ->get();

            $first_three_new_products = Product::latest()->limit(3)->get();
            $last_three_new_products = Product::first()->limit(3)->get();

            // main section footer
            $main_section_footer = MainSectionFooter::get();

            // my account section footer
            $my_account_section = MyAccountSectionFooter::get();

            // why we choose
            $why_we_choose = WhyWeChooseFooter::get();

            // store information
            $store_info = StoreInformationFooter::get();

            if ($matching->count() > 0) {
                $top_adv = ProductTopAdv::get();
                $under_adv = ProductUnderAdv::get();
                $brands = ProductCategory::sub()->get();
                $term = $request->term;
                $colors = Color::latest()->get();
                $sizes = Size::latest()->get();
                return view('user.auth_user.search', compact('sizes', 'colors', 'term', 'matching', 'top_adv', 'under_adv', 'brands', 'first_three_new_products', 'last_three_new_products', 'main_section_footer', 'my_account_section', 'why_we_choose', 'store_info'));
            } else {
                return redirect('/');
            }
        }
    }

    public function compare()
    {
        // main section footer
        $main_section_footer = MainSectionFooter::get();

        // my account section footer
        $my_account_section = MyAccountSectionFooter::get();

        // why we choose
        $why_we_choose = WhyWeChooseFooter::get();

        // store information
        $store_info = StoreInformationFooter::get();

        if (auth()->user()) {
            $compare_list = CompareList::where("user_id", auth()->user()->id)->with(["product" => function ($products) {
                $products->with("colors", "sizes");
            }])->get();

            return view('user.layout.compare', compact('compare_list', 'main_section_footer', 'my_account_section', 'why_we_choose', 'store_info'));
        } else {
            $compare_list = CompareList::where("user_id", \Request::ip())->with(["product" => function ($products) {
                $products->with("colors", "sizes");
            }])->get();

            return view('user.layout.compare', compact('compare_list', 'main_section_footer', 'my_account_section', 'why_we_choose', 'store_info'));
        }
    }

    public function cart()
    {
        if (auth()->user()) {
            $cart_list = Cart::where("user_id", auth()->user()->id)->with("product")->latest()->get();

            return view('user.layout.cart', compact('cart_list'));
        } else {
            $cart_list = Cart::where("user_id", \Request::ip())->with("product")->latest()->get();

            return view('user.layout.cart', compact('cart_list'));
        }
    }

    public function delete_item_compare($id)
    {
        $item = CompareList::find($id);
        if ($item) {
            $item->delete();
            return redirect()->back();
        } else {
            return view('user.auth_user.not_found');
        }
    }

    public function delete_item_cart($id)
    {
        $item = Cart::find($id);
        if ($item) {
            $item->delete();
            return redirect()->back();
        } else {
            return view('user.auth_user.not_found');
        }
    }

    public function update_item_from_cart(Request $request , $item_id)
    {
        Cart::where( "id" , $item_id )->first()->update([
            "size" => $request->size,
            "color" => $request->color
        ]);

        return redirect()->back() ;
    }

    public function about_us()
    {
        // main section footer
        $main_section_footer = MainSectionFooter::get();

        // my account section footer
        $my_account_section = MyAccountSectionFooter::get();

        // why we choose
        $why_we_choose = WhyWeChooseFooter::get();

        // store information
        $store_info = StoreInformationFooter::get();

        // about us
        $about_us = AboutUs::first();

        return view('user.layout.about_store', compact('about_us', 'main_section_footer', 'my_account_section', 'why_we_choose', 'store_info'));
    }

    public function getting_category($slug)
    {
        // main section footer
        $main_section_footer = MainSectionFooter::get();

        // my account section footer
        $my_account_section = MyAccountSectionFooter::get();

        // why we choose
        $why_we_choose = WhyWeChooseFooter::get();

        // store information
        $store_info = StoreInformationFooter::get();

        // category
        $category = ProductCategory::where("slug_en", $slug)->orWhere("slug_ar", $slug)->with("sub_catagories")->first();

        return view('user.layout.category_page', compact('category', 'main_section_footer', 'my_account_section', 'why_we_choose', 'store_info'));
    }

    public function getting_sub_category($slug)
    {
        // main section footer
        $main_section_footer = MainSectionFooter::get();

        // my account section footer
        $my_account_section = MyAccountSectionFooter::get();

        // why we choose
        $why_we_choose = WhyWeChooseFooter::get();

        // store information
        $store_info = StoreInformationFooter::get();

        // this sub category
        $sub_category = ProductCategory::sub()->where("slug_en", $slug)->orWhere("slug_ar", $slug)->first();

        $products = Product::where('category_id', $sub_category->id)->paginate(10);

        $sub_category["products"] = $products;

        if (!$sub_category) {
            return view('user.auth_user.not_found');
        }

        return view('user.layout.sub_category', compact('sub_category', 'main_section_footer', 'my_account_section', 'why_we_choose', 'store_info'));
    }

    public function contact_us()
    {
        // main section footer
        $main_section_footer = MainSectionFooter::get();

        // my account section footer
        $my_account_section = MyAccountSectionFooter::get();

        // why we choose
        $why_we_choose = WhyWeChooseFooter::get();

        // store information
        $store_info = StoreInformationFooter::get();

        // contact us
        $contact_us = ContactUs::first();

        return view('user.layout.contact_us', compact('contact_us', 'main_section_footer', 'my_account_section', 'why_we_choose', 'store_info'));
    }

    public function terms_and_conditions()
    {
        $terms = TermsAndConditions::first();
        return view('user.layout.terms_and_conditions', compact('terms'));
    }
}
