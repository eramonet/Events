<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BestSelleres;
use App\Models\ExploreCategory;
use App\Models\FastLinks;
use App\Models\FeaturesSection;
use App\Models\FindUs;
use App\Models\FooterContactUs;
use App\Models\FooterMainSection;
use App\Models\HintSection;
use App\Models\LatestBirthdayHall;
use App\Models\LatestEngagmentsHall;
use App\Models\LatestProduct;
use App\Models\LatestWeddingHalls;
use App\Models\NewsSection;
use App\Models\ShopByBrands;
use App\Models\ShopByOccasion;
use App\Models\TopFooter;
use App\Models\TopNavbar;
use App\Models\ViewAllProduct;
use Illuminate\Http\Request;

class FrontSettingsController extends Controller
{
    function store_image(Request $request, $file_name, $path)
    {
        $file = $request->file($file_name);

        $FileName = date('YmdHi') . $file->getClientOriginalName();

        $file->move(public_path($path), $FileName);
        return $FileName;
    }

    public function top_navbar()
    {
        $top_navbar = TopNavbar::get();
        return view('admin.front_settings.top_navbar', compact('top_navbar'));
    }

    public function edit_top_navbar(Request $request)
    {
        $request->validate([
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
        ]);
        $created = TopNavbar::first()->update([
            "title_ar" => $request->title_ar,
            "title_en" => $request->title_en
        ]);

        if ($created) {
            $request->session()->flash('success', 'Top Navbar Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function view_all_products()
    {
        $items = ViewAllProduct::latest()->get();
        return view('admin.front_settings.view_all_products', compact('items'));
    }

    public function edit_view_all_products(Request $request, $id)
    {

        $request->validate([
            'icon' => ['required'],
            'title_ar' => ['required', 'string'],
            'title_en' => ['required', 'string'],
        ]);
        $created = TopNavbar::first()->update([
            "title_ar" => $request->title_ar,
            "title_en" => $request->title_en
        ]);


        $created = ViewAllProduct::find($id)->update([
            "icon" => $request->icon ? $this->store_image($request, "icon", "user_assets/uploads/view_all_products") :  ViewAllProduct::find($id)->icon,
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }


    public function latest_wedding_halls_section()
    {
        $items = LatestWeddingHalls::latest()->get();
        return view('admin.front_settings.latest_wedding_section', compact('items'));
    }

    public function edit_latest_wedding_halls_section(Request $request, $id)
    {

        $request->validate([
            'small_title_en' => ['required', 'string'],
            'small_title_ar' => ['required', 'string'],
            'big_title_en' => ['required', 'string'],
            'big_title_ar' => ['required', 'string'],
        ]);

        $created = LatestWeddingHalls::find($id)->update([
            "small_title_en" => $request->small_title_en,
            "small_title_ar" => $request->small_title_ar,
            "big_title_en" => $request->big_title_en,
            "big_title_ar" => $request->big_title_ar
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }


    public function latest_products_section()
    {
        $items = LatestProduct::latest()->get();
        return view('admin.front_settings.latest_products', compact('items'));
    }

    public function edit_latest_products_section(Request $request, $id)
    {

        $request->validate([
            'title_en' => ['required', 'string'],
            'title_ar' => ['required', 'string'],
        ]);

        $created = LatestProduct::find($id)->update([
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function explore_category()
    {
        $items = ExploreCategory::latest()->get();
        return view('admin.front_settings.explore_category', compact('items'));
    }

    public function edit_explore_category(Request $request, $id)
    {

        $request->validate([
            'title_en' => ['required', 'string'],
            'title_ar' => ['required', 'string'],
        ]);

        $created = ExploreCategory::find($id)->update([
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function best_sellers()
    {
        $items = BestSelleres::latest()->get();
        return view('admin.front_settings.best_sellers', compact('items'));
    }

    public function edit_best_sellers(Request $request, $id)
    {

        $request->validate([
            'title_en' => ['required', 'string'],
            'title_ar' => ['required', 'string'],
        ]);

        $created = BestSelleres::find($id)->update([
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function shop_by_occasion()
    {
        $items = ShopByOccasion::latest()->get();
        return view('admin.front_settings.shop_by_occasion', compact('items'));
    }

    public function edit_shop_by_occasion(Request $request, $id)
    {

        $request->validate([
            'title_en' => ['required', 'string'],
            'title_ar' => ['required', 'string'],
        ]);

        $created = ShopByOccasion::find($id)->update([
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function shop_by_brands()
    {
        $items = ShopByBrands::latest()->get();
        return view('admin.front_settings.shop_by_brands', compact('items'));
    }

    public function edit_shop_by_brands(Request $request, $id)
    {

        $request->validate([
            'title_en' => ['required', 'string'],
            'title_ar' => ['required', 'string'],
        ]);

        $created = ShopByBrands::find($id)->update([
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function hints()
    {
        $items = HintSection::latest()->get();
        return view('admin.front_settings.hint', compact('items'));
    }

    public function edit_hints(Request $request, $id)
    {

        $request->validate([
            'small_text_en' => ['required', 'string'],
            'small_text_ar' => ['required', 'string'],
            'base_text_en' => ['required', 'string'],
            'base_text_ar' => ['required', 'string'],
            'short_description_en' => ['required', 'string'],
            'short_description_ar' => ['required', 'string'],
            'full_description_en' => ['required', 'string'],
            'full_description_ar' => ['required', 'string'],
            'video' => ['required', 'string'],
        ]);

        $created = HintSection::find($id)->update([
            "small_text_en" => $request->small_text_en,
            "small_text_ar" => $request->small_text_ar,
            "base_text_en" => $request->base_text_en,
            "base_text_ar" => $request->base_text_ar,
            "short_description_en" => $request->short_description_en,
            "short_description_ar" => $request->short_description_ar,
            "full_description_en" => $request->full_description_en,
            "full_description_ar" => $request->full_description_ar,
            "video" => $request->video,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function latest_engagments_halls()
    {
        $items = LatestEngagmentsHall::latest()->get();
        return view('admin.front_settings.latest_engagments_halls', compact('items'));
    }

    public function edit_latest_engagments_halls(Request $request, $id)
    {

        $request->validate([
            'small_text_ar' => ['required', 'string'],
            'small_text_en' => ['required', 'string'],
            'big_text_ar' => ['required', 'string'],
            'big_text_en' => ['required', 'string'],
        ]);

        $created = LatestEngagmentsHall::find($id)->update([
            "small_text_ar" => $request->small_text_ar,
            "small_text_en" => $request->small_text_en,
            "big_text_ar" => $request->big_text_ar,
            "big_text_en" => $request->big_text_en,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }


    public function latest_birthday_halls()
    {
        $items = LatestBirthdayHall::latest()->get();
        return view('admin.front_settings.latest_birthday_halls', compact('items'));
    }

    public function edit_latest_birthday_halls(Request $request, $id)
    {

        $request->validate([
            'small_text_ar' => ['required', 'string'],
            'small_text_en' => ['required', 'string'],
            'big_text_ar' => ['required', 'string'],
            'big_text_en' => ['required', 'string'],
        ]);

        $created = LatestBirthdayHall::find($id)->update([
            "small_text_ar" => $request->small_text_ar,
            "small_text_en" => $request->small_text_en,
            "big_text_ar" => $request->big_text_ar,
            "big_text_en" => $request->big_text_en,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }


    public function features_section()
    {
        $items = FeaturesSection::latest()->get();
        return view('admin.front_settings.features_section', compact('items'));
    }

    public function edit_features_section(Request $request, $id)
    {

        $request->validate([
            'icon' => ['sometimes'],
            'title_en' => ['required', 'string'],
            'title_ar' => ['required', 'string'],
            'description_en' => ['required', 'string'],
            'description_ar' => ['required', 'string'],
        ]);

        $created = FeaturesSection::find($id)->update([
            "icon" => $request->icon ? $this->store_image($request, "icon", "user_assets/uploads/features") :  FeaturesSection::find($id)->icon,
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
            "description_en" => $request->description_en,
            "description_ar" => $request->description_ar,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function news_section()
    {
        $items = NewsSection::latest()->get();
        return view('admin.front_settings.news', compact('items'));
    }

    public function edit_news_section(Request $request, $id)
    {

        $request->validate([
            'title_en' => ['required', 'string'],
            'title_ar' => ['required', 'string'],
        ]);

        $created = NewsSection::find($id)->update([
            "title_en" => $request->title_en,
            "title_ar" => $request->title_ar,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function top_footer()
    {
        $items = TopFooter::latest()->get();
        return view('admin.front_settings.top_footer', compact('items'));
    }

    public function edit_top_footer(Request $request, $id)
    {

        $request->validate([
            "image" => ['sometimes'],
            "big_text_en" => ['required', 'string'],
            "big_text_ar" => ['required', 'string'],
            "small_text_en" => ['required', 'string'],
            "small_text_ar" => ['required', 'string'],
            "apple_store_link" => ['required', 'string'],
            "google_play_link" => ['required', 'string'],
        ]);

        $created = TopFooter::find($id)->update([
            "image" => $request->image ? $this->store_image($request, "image", "user_assets/uploads/footer") :  TopFooter::find($id)->image,
            "big_text_en" => $request->big_text_en,
            "big_text_ar" => $request->big_text_ar,
            "small_text_en" => $request->small_text_en,
            "small_text_ar" => $request->small_text_ar,
            "apple_store_link" => $request->apple_store_link,
            "google_play_link" => $request->google_play_link,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function footer_main_section()
    {
        $items = FooterMainSection::latest()->get();
        return view('admin.front_settings.main_footer_section', compact('items'));
    }

    public function edit_footer_main_section(Request $request, $id)
    {

        $request->validate([
            "big_title_en" => ['required', 'string'],
            "big_title_ar" => ['required', 'string'],
            "small_title_en" => ['required', 'string'],
            "small_title_ar" => ['required', 'string'],
        ]);

        $created = FooterMainSection::find($id)->update([
            "big_title_en" => $request->big_title_en,
            "big_title_ar" => $request->big_title_ar,
            "small_title_en" => $request->small_title_en,
            "small_title_ar" => $request->small_title_ar,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function footer_fast_links_section()
    {
        $items = FastLinks::latest()->get();
        return view('admin.front_settings.fast_links', compact('items'));
    }

    public function edit_footer_fast_links_section(Request $request, $id)
    {

        $request->validate([
            "name_en" => ['required', 'string'],
            "name_ar" => ['required', 'string'],
            "link" => ['required', 'string']
        ]);

        $created = FastLinks::find($id)->update([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "link" => $request->link,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function create_footer_fast_links_section(Request $request)
    {

        $request->validate([
            "name_en" => ['required', 'string'],
            "name_ar" => ['required', 'string'],
            "link" => ['required', 'string']
        ]);

        // count of fast links should max 5 elements

        $created = FastLinks::create([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "link" => $request->link,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Created SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function delete_footer_fast_links_section(Request $request , $id)
    {
        // check if found
        $check = FastLinks::find($id) ;
        if( ! $check ){
            $request->session()->flash('failed', 'Item Not Found');
            return redirect()->back();
        }

        $delete = FastLinks::find($id)->delete() ;

        if ($delete) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }


    public function footer_find_us_section()
    {
        $items = FindUs::latest()->get();
        return view('admin.front_settings.find_us', compact('items'));
    }

    public function edit_footer_find_us_section(Request $request, $id)
    {

        $request->validate([
            "name_en" => ['required', 'string'],
            "name_ar" => ['required', 'string'],
            "link" => ['required', 'string']
        ]);

        $created = FindUs::find($id)->update([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "link" => $request->link,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function create_footer_find_us_section(Request $request)
    {

        $request->validate([
            "name_en" => ['required', 'string'],
            "name_ar" => ['required', 'string'],
            "link" => ['required', 'string']
        ]);

        // count of fast links should max 5 elements

        $created = FindUs::create([
            "name_en" => $request->name_en,
            "name_ar" => $request->name_ar,
            "link" => $request->link,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Created SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function delete_footer_find_us_section(Request $request , $id)
    {
        // check if found
        $check = FindUs::find($id) ;
        if( ! $check ){
            $request->session()->flash('failed', 'Item Not Found');
            return redirect()->back();
        }

        $delete = FindUs::find($id)->delete() ;

        if ($delete) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }

    public function contact_us_footer()
    {
        $items = FooterContactUs::latest()->get();
        return view('admin.front_settings.contact_us', compact('items'));
    }

    public function edit_contact_us_footer(Request $request, $id)
    {

        $request->validate([
            "phone" => ['required', 'numeric'],
            "email" => ['required', 'string'],
            "address_en" => ['required', 'string'],
            "address_en" => ['required', 'string']
        ]);

        $created = FooterContactUs::find($id)->update([
            "phone" => $request->phone,
            "email" => $request->email,
            "address_en" => $request->address_en,
            "address_en" => $request->address_ar,
        ]);

        if ($created) {
            $request->session()->flash('success', 'Item Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }
}
