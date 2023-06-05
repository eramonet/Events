<?php

namespace Database\Seeders;

use App\Models\MainSectionFooter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MainSectionFooterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MainSectionFooter::create([
            "logo" => "uploads/user_front/footer/logo.png",
            "description_en" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,",
            "description_ar" => "عرف مشغلو الرسم والطباعة هذا جيدًا ، في الواقع ، جميع المهن التي تتعامل مع عالم الاتصالات لها علاقة مستقرة بهذه الكلمات ، ولكن ما هي؟ Lorem ipsum نص وهمي بدون أي معنى.
            إنها سلسلة من الكلمات اللاتينية التي ، عند وضعها في موضعها ، لا تشكل جملًا بمعنى كامل ، ولكنها تعطي الحياة لنص اختبار مفيد لملء الفراغات التي يتم شغلها لاحقًا من نصوص مخصصة كتبها متخصصون في الاتصال.
            إنه بالتأكيد أشهر نص نائب حتى إذا كانت هناك إصدارات مختلفة يمكن تمييزها عن ترتيب تكرار الكلمات اللاتينية.
            يحتوي Lorem ipsum على المحارف الأكثر استخدامًا ، وهو جانب يتيح لك الحصول على نظرة عامة على عرض النص من حيث اختيار الخط و حجم الخط .",
            "google_store_link" => "https://www.youtube.com/watch?v=Cx3qDxeld-M",
            "app_store_link" => "https://www.youtube.com/watch?v=Cx3qDxeld-M"
        ]);
    }
}
