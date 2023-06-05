<?php

namespace Database\Seeders;

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
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TopNavbar::truncate();
        TopNavbar::create([
            "title_ar" => "30٪ خصم على جميع المنتجات أدخل الرمز: joolie2020",
            "title_en" => "30% off on all products enter code: joolie2020"
        ]);

        ViewAllProduct::truncate();
        ViewAllProduct::create([
            "icon" => "icons8-deliver-food-50 1.png",
            "title_en" => "texttext texttext texttext",
            "title_ar" => "texttext texttext texttext"
        ]);

        ViewAllProduct::create([
            "icon" => "reward-symbol-in-a-circle-svgrepo-com 1.png",
            "title_en" => "texttext texttext texttext",
            "title_ar" => "texttext texttext texttext"
        ]);

        ViewAllProduct::create([
            "icon" => "icons8-flower-bouquet-50 1.png",
            "title_en" => "texttext texttext texttext",
            "title_ar" => "texttext texttext texttext"
        ]);

        LatestWeddingHalls::truncate();
        LatestWeddingHalls::create([
            "small_title_en" => "title",
            "small_title_ar" => "title",
            "big_title_en" => "this is latest wedding halls",
            "big_title_ar" => "this is latest wedding halls",
        ]);

        LatestProduct::truncate();
        LatestProduct::create([
            "title_en" => "this is latest products",
            "title_ar" => "this is latest products"
        ]);

        ExploreCategory::truncate();
        ExploreCategory::create([
            "title_en" => "this is explore category",
            "title_ar" => "this is explore category"
        ]);

        BestSelleres::truncate();
        BestSelleres::create([
            "title_en" => "this is best sellers",
            "title_ar" => "this is best sellers"
        ]);

        ShopByOccasion::truncate();
        ShopByOccasion::create([
            "title_en" => "Life is filled with occasions and Floward has them covered",
            "title_ar" => "Life is filled with occasions and Floward has them covered"
        ]);

        ShopByBrands::truncate();
        ShopByBrands::create([
            "title_en" => "Life is filled with occasions and Floward has them covered",
            "title_ar" => "Life is filled with occasions and Floward has them covered"
        ]);

        HintSection::truncate();
        HintSection::create([
            "small_text_en" => "find your beauty",
            "small_text_ar" => "find your beauty",
            "base_text_en" => "we work hard for your happy moment",
            "base_text_ar" => "we work hard for your happy moment",
            "short_description_en" => "We know that this is the best day of your life and it should be unforgettable.",
            "short_description_ar" => "We know that this is the best day of your life and it should be unforgettable.",
            "full_description_en" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            "full_description_ar" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
            "video" => "https://www.youtube.com/watch?v=I9AP55xefbY",
        ]);

        LatestEngagmentsHall::truncate();
        LatestEngagmentsHall::create([
            "small_text_ar" => "this is LATEST ENGAGMENTS HALLS",
            "small_text_en" => "this is LATEST ENGAGMENTS HALLS",
            "big_text_ar" => "this is LATEST ENGAGMENTS HALLS Details",
            "big_text_en" => "this is LATEST ENGAGMENTS HALLS Details",
        ]);

        LatestBirthdayHall::truncate();
        LatestBirthdayHall::create([
            "small_text_ar" => "this is LATEST Birthday HALLS",
            "small_text_en" => "this is LATEST Birthday HALLS",
            "big_text_ar" => "this is LATEST Birthday HALLS Details",
            "big_text_en" => "this is LATEST Birthday HALLS Details",
        ]);

        FeaturesSection::truncate();
        FeaturesSection::create([
            "icon" => "1.png",
            "title_ar" => "Wide Selection 1",
            "title_en" => "Wide Selection 1",
            "description_ar" => "А huge number of products for your celebration day 1",
            "description_en" => "А huge number of products for your celebration day 1"
        ]);

        FeaturesSection::create([
            "icon" => "2.png",
            "title_ar" => "Wide Selection 2",
            "title_en" => "Wide Selection 2",
            "description_ar" => "А huge number of products for your celebration day 2",
            "description_en" => "А huge number of products for your celebration day 2"
        ]);

        FeaturesSection::create([
            "icon" => "3.png",
            "title_ar" => "Wide Selection 3",
            "title_en" => "Wide Selection 3",
            "description_ar" => "А huge number of products for your celebration day 3",
            "description_en" => "А huge number of products for your celebration day 3"
        ]);

        FeaturesSection::create([
            "icon" => "4.png",
            "title_ar" => "Wide Selection 4",
            "title_en" => "Wide Selection 4",
            "description_ar" => "А huge number of products for your celebration day 4",
            "description_en" => "А huge number of products for your celebration day 4"
        ]);

        NewsSection::truncate();
        NewsSection::create([
            "title_en" => "this is news section",
            "title_ar" => "this is news section"
        ]);

        TopFooter::truncate();
        TopFooter::create([
            "image" => "footer.png",
            "big_text_en" => "Discover EVENTS NEW APP",
            "big_text_ar" => "Discover EVENTS NEW APP",
            "small_text_en" => "Download Android And IPhone Applications Via The Links.",
            "small_text_ar" => "Download Android And IPhone Applications Via The Links.",
            "apple_store_link" => "https://www.youtube.com/watch?v=-SMiRILKZuc",
            "google_play_link" => "https://www.youtube.com/watch?v=-SMiRILKZuc",
        ]);

        FooterMainSection::truncate();
        FooterMainSection::create([
            "big_title_en" => "Newsletter",
            "big_title_ar" => "Newsletter",
            "small_title_en" => "Don’t miss our significant news and season sales. Subscribe!",
            "small_title_ar" => "Don’t miss our significant news and season sales. Subscribe!",
        ]);

        FastLinks::truncate();
        FastLinks::create([
            "name_en" => "Blog",
            "name_ar" => "Blog",
            "link" => "https://www.google.com/search?q=loram+epsom&oq=lo&aqs=chrome.2.69i60j69i59l2j69i57j69i60l4.1667j0j7&sourceid=chrome&ie=UTF-8"
        ]);

        FastLinks::create([
            "name_en" => "About Us",
            "name_ar" => "About Us",
            "link" => "https://www.google.com/search?q=loram+epsom&oq=lo&aqs=chrome.2.69i60j69i59l2j69i57j69i60l4.1667j0j7&sourceid=chrome&ie=UTF-8"
        ]);

        FastLinks::create([
            "name_en" => "Contact Us",
            "name_ar" => "Contact Us",
            "link" => "https://www.google.com/search?q=loram+epsom&oq=lo&aqs=chrome.2.69i60j69i59l2j69i57j69i60l4.1667j0j7&sourceid=chrome&ie=UTF-8"
        ]);

        FindUs::truncate();
        FindUs::create([
            "name_en" => "Facebook",
            "name_ar" => "Facebook",
            "link" => "https://fontawesome.com/v4/icon/plus"
        ]);

        FindUs::create([
            "name_en" => "Twitter",
            "name_ar" => "Twitter",
            "link" => "https://fontawesome.com/v4/icon/plus"
        ]);

        FindUs::create([
            "name_en" => "Instagram",
            "name_ar" => "Instagram",
            "link" => "https://fontawesome.com/v4/icon/plus"
        ]);

        FooterContactUs::truncate();
        FooterContactUs::create([
            "phone" => "01121238817",
            "email" => "info@events-app.com",
            "address_en" => "Abu Dabhi - Emirates" ,
            "address_ar" => "Abu Dabhi - Emirates"
        ]);
    }
}
