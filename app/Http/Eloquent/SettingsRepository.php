<?php
namespace App\Http\Eloquent;
use App\Http\Interfaces\SettingsRepositoryInterface;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CityResource;
use App\Http\Resources\ColorResource;
use App\Http\Resources\FaqResource;
use App\Http\Resources\MainCategoryResource;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\RegionResource;
use App\Http\Resources\TermsResource;
use App\Models\About;
use App\Models\Brand;
use App\Models\City;
use App\Models\Color;
use App\Models\ContactMessage;
use App\Models\Faq;
use App\Models\Notification;
use App\Models\OrderProduct;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\Region;
use App\Models\Term;
use Illuminate\Support\Facades\Request;

class SettingsRepository implements SettingsRepositoryInterface
{
    public function getCities($lang)
    {
            $cities = City::where('country_id','3')->where('status', '1')->get();
            return CityResource::collection($cities);
    }

    public function getRegions($city)
    {
        $regions = Region::where('city_id', $city->id)->get();
        return RegionResource::collection($regions);
    }

    public function getTerms($lang)
    {
        $terms = Term::first();
        return $lang == 'en' ? $terms->text_en : $terms->text_ar;
    }

    public function getAbout($lang)
    {
        $about = About::first();
        return $lang == 'en' ? $about->text_en : $about->text_ar;
    }

    public function getFaqs($lang)
    {
        $faqs = Faq::get();
        return FaqResource::collection($faqs);
    }

    public function getColors($lang)
    {
        $getProducts=OrderProduct::pluck('product_id');
        $usedColors = ProductColor::whereIn('product_id', $getProducts)
        ->pluck('color_id');
        $colors = Color::whereIn('id',$usedColors)->get();
        return ColorResource::collection($colors);
    }

    public function getBrands($lang)
    {
        $brand = Brand::get();
        return BrandResource::collection($brand);
    }

    public function insertContactForm($request)
    {
        $contact = ContactMessage::create(array_merge($request->all(), [
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]));
        Notification:: create([
            'user_id'=>$contact->user_id,
            'message_id'=>$contact->id,
            'title_ar'=>'لديك رسالة تواصل جديدة',
            'title_en'=>'you have new contacts message',
            'desc_ar' => 'لديك رسالة تواصل جديدة',
            'desc_en' => 'you have new contacts message',
        ]);
    }

    public function insertContactFormWithoutToken($request)
    {
        $contact = ContactMessage::create(array_merge($request->all(), [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
         ]));

        Notification::create([
            'message_id' => $contact->id,
            'title_ar' => 'لديك رسالة تواصل جديدة',
            'title_en' => 'you have new contacts message',
            'desc_ar' => 'لديك رسالة تواصل جديدة',
            'desc_en' => 'you have new contacts message',
        ]);
    }

    public function getCategories($lang)
    {
        $categories =ProductCategory::whereNull('parent_id')->where('status', 1)->get();
        return MainCategoryResource::collection($categories);
    }

    public function getNotifications($user)
    {
        $notifications= Notification::where('user_id', $user->id)->latest()->get();
        return NotificationResource::collection($notifications);

    }
}