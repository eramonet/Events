<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\User\Auth\LoginRequest;
use App\Http\Requests\User\Auth\SignUpRequest;
use App\Http\Requests\User\Home\UpdateProfileRequest;
use App\Http\Requests\User\Home\UpdateShippingAddressRequest;
use App\Models\Admin;
use App\Models\AppSetting;
use App\Models\Cart;
use App\Models\City;
use App\Models\CompareList;
use App\Models\Country;
use App\Models\FirstAdv;
use App\Models\MainSectionFooter;
use App\Models\MainSlider;
use App\Models\MyAccountSectionFooter;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OurFeature;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductColor;
use App\Models\ProductDetails;
use App\Models\ProductMedia;
use App\Models\ProductReview;
use App\Models\ProductSize;
use App\Models\SecondAdvs;
use App\Models\StoreInformationFooter;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\WhyWeChooseFooter;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use Jorenvh\Share\ShareFacade as Share;

class AuthController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function forgetPassword()
    {
        return view('user.forgetPassword');
    }

    // forget password cycle
    public function give_email(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            try {

                $settings = AppSetting::first();

                $data = array(
                    'name' => $user->name,
                    'link' => 'https://newstore.eramoerp.com/changepassword/' . $user->id,
                    'banner' => $settings->verification_banner,
                    'text_verification' => $settings->text_verification_en,
                    'description_verification' => $settings->description_verification_en,
                );

                Mail::send('user.mail', $data, function ($message) use ($user) {
                    $message->to($user->email)->subject('Change Password');
                    $message->from('no-reply@eramoerp.com', 'Forget Password');
                });
                return redirect()->back()->with('success', 'please check your email');
            } catch (Exception $e) {
                return redirect()->back()->with('error', 'this email not exist');
            }
        } else {
            return redirect()->back()->with('error', 'user not exist');
        }
    }

    public function ChangePassword($id)
    {
        return view('user.updatepassword', compact('id'));
    }

    public function UpdatePassword(PasswordRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $user = User::where('id', $request->id)->first();
        if ($user) {
            $user->update($data);
            // return redirect()->route('login');
            return redirect('login');
        }
    }

    public function sign_in(LoginRequest $request)
    {
        $credentials = $request->all('email', 'password');

        if (!Auth::validate($credentials)) {
            return redirect()->back()->withErrors(["error" => "invalid credentials !"]);
        }



        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        if( $user->status == 2 ){
            return redirect()->back()->withErrors(["error" => "please activate your account !"]);
        }

        if( $user->status == 0 ){
            return redirect()->back()->withErrors(["error" => "you are block please contact with admin !"]);
        }

        Auth::login($user);

        // check if he has compare list details
        $compare_list = CompareList::where("user_id", \Request::ip())->get();

        if (count($compare_list) > 0) {
            foreach ($compare_list as $item) {
                $item->update([
                    "user_id" => auth()->user()->id
                ]);
            }
        }


        // check if he has cart
        $my_cart = Cart::where("user_id", \Request::ip())->get();

        if (count($my_cart) > 0) {
            foreach ($my_cart as $item) {
                $item->update([
                    "user_id" => auth()->user()->id
                ]);
            }
        }

        // check if he has wish list details
        $wishlist = Wishlist::where("user_id", \Request::ip())->get();

        if (count($wishlist) > 0) {
            foreach ($wishlist as $item) {
                $item->update([
                    "user_id" => auth()->user()->id
                ]);
            }
        }
        if ($request->session()->get('come_from')) {
            $request->session()->forget('come_from');
            return redirect('checkout-step1');
        } else {
            return redirect('/user');
        }
    }

    public function sign_up()
    {
        $countries = Country::get();

        return view('user.signUp', compact('countries'));
    }

    public function register(SignUpRequest $request)
    {

        $input = $request->all();



        $input['password'] = bcrypt($input['password']);
        $input['sign_from'] = 'web';

        $input['name'] = $request->firstname . " " . $request->lastname;

        // set status as before activate account
        $input['status'] = 2 ;

        /**
         *
         * 1 ==> user is active account
         * 2 ==> user not active account
         * 0 ==> admin blocked this user
         *
         */

        $user = User::create($input);

        try {

            $settings = AppSetting::first();

            $data = array(
                'name' => $user->name,
                'link' => 'https://newstore.eramoerp.com/active-user-account/' . $user->id,
                'banner' => $settings->verification_banner,
                'text_verification' => $settings->text_verification_en,
                'description_verification' => $settings->description_verification_en,
            );

            Mail::send('user.active_account_mail', $data, function ($message) use ($user) {
                $message->to($user->email)->subject('Account Activation');
                $message->from('no-reply@eramoerp.com', 'Account Activation');
            });

            return redirect()->back()->with('success', 'please check your email for verify account');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'this email not exist');
        }
    }

    public function active_user_account($user_id)
    {
        return '<h1>please wait ...</h1>';
        $this_user = User::find($user_id);


        if( $this_user ){
            $this_user->update([
                "status" => 1
            ]);

            return redirect('/login');
        }

    }

    public function auth_home()
    {

        $cities = City::get();
        // getting all categories
        $categories = ProductCategory::latest()->main()->get();

        // getting first two categories
        $first_two_categories = ProductCategory::main()->with(["sub_catagories" => function ($sub) {
            $sub->sub()->with("products");
        }])->limit(2)->get();


        // lowest price
        $lowest_price = Product::orderBy('real_price', 'asc')->limit(6)->get();

        // main slider
        $main_sliders = MainSlider::latest()->get();

        // first advs
        $first_advs = FirstAdv::latest()->get();

        // second advs
        $second_advs = SecondAdvs::latest()->get();

        // our features
        $our_features = OurFeature::get();

        // getting last two categories
        $last_two_categories = ProductCategory::main()->latest()->with(["sub_catagories" => function ($sub) {
            $sub->sub()->with("products");
        }])->limit(2)->get();

        // our admins
        $admins = Admin::latest()->get();

        // check if he has compare list details
        $compare_list = CompareList::where("user_id", \Request::ip())->get();


        // featured products
        $featured_products = Product::featured()->get();

        if (count($compare_list) > 0) {
            foreach ($compare_list as $item) {
                $item->update([
                    "user_id" => auth()->user()->id
                ]);
            }
        }

        // check if he has cart
        $my_cart = Cart::where("user_id", \Request::ip())->get();

        if (count($my_cart) > 0) {
            foreach ($my_cart as $item) {
                $item->update([
                    "user_id" => auth()->user()->id
                ]);
            }
        }

        // check if he has wish list details
        $wishlist = Wishlist::where("user_id", \Request::ip())->get();

        if (count($wishlist) > 0) {
            foreach ($wishlist as $item) {
                $item->update([
                    "user_id" => auth()->user()->id
                ]);
            }
        }

        return view('user.auth_user.home', compact(
            'categories',
            'first_two_categories',
            'lowest_price',
            'main_sliders',
            'first_advs',
            'second_advs',
            'our_features',
            'last_two_categories',
            'admins',
            'cities',
            'featured_products',
        ));
    }

    public function profile()
    {
        // main section footer
        $main_section_footer = MainSectionFooter::get();

        // my account section footer
        $my_account_section = MyAccountSectionFooter::get();

        // why we choose
        $why_we_choose = WhyWeChooseFooter::get();

        // store information
        $store_info = StoreInformationFooter::get();

        $user = auth()->user();

        $countries = Country::get();

        $address = UserAddress::where("user_id", $user->id)->with("user", "country", "city", "region")->latest()->get();

        $my_orders = Order::where("customer_phone", $user->phone)->latest()->get();

        $pending = Order::pending()->where("customer_phone", $user->phone);
        $inprogress = Order::inProgress()->where("customer_phone", $user->phone);
        $delivered = Order::delivered()->where("customer_phone", $user->phone);
        $canceled = Order::canceled()->where("customer_phone", $user->phone);

        $wishlist = Wishlist::where("user_id", $user->id)->with("product")->latest()->get();


        return view('user.layout.user_dashboared', compact('my_orders', 'pending', 'delivered', 'canceled', 'inprogress', 'wishlist', 'user', 'countries', 'address', 'main_section_footer', 'my_account_section', 'why_we_choose', 'store_info',));
    }

    public function update_profile(Request $request)
    {
        $validatedData = $request->validate([
            "firstname" => "required" ,
            "lastname" => "required" ,
            "address" => "required" ,
            "birth_date" => "required" ,
        ]);

        $input = $request->all();
        $current_password = "" ;

        $input["name"] = $request->firstname . " " . $request->lastname;

        if( $request->current_password ){
            if( ! $request->new_password || ! $request->confirm_password ){
                return redirect()->back()->withErrors(["errors" => "please complete all password fields"]);
            }

            $current_password = Hash::make($request->new_password) ;

            // check if password correct or not
            if( ! Hash::check( $request->current_password , auth()->user()->password  ) ){
                return redirect()->back()->withErrors(["errors" => "invalid password"]);
            }

            // check if password is match or not
            if( $request->new_password != $request->confirm_password ){
                return redirect()->back()->withErrors(["errors" => "password not match"]);
            }
        }

        $input["password"] = $current_password ;

        auth()->user()->update($input);

        return redirect()->back();
    }

    public function update_profile_image(Request $request)
    {
        $validatedData = $request->validate([
            'profile_image' => 'required|max:2048',
        ],
        ['profile_image.required' => 'please choose profile image']);

        $imageName = time() . '.' . $request->profile_image->extension();
        $request->profile_image->move(public_path('uploads/users_images'), $imageName);

        auth()->user()->update([
            "image" => $imageName
        ]);

        return redirect()->back();
    }

    public function update_shipping_address(UpdateShippingAddressRequest $request)
    {
        $request["user_id"] = auth()->user()->id;

        // check if exist
        $address = UserAddress::where("user_id", auth()->user()->id)->first();
        if ($address) {
            $address->update($request->all('user_id', 'flat', 'country_id', 'city_id', 'zip_code', 'address'));
        } else {
            UserAddress::create($request->all('user_id', 'flat', 'country_id', 'city_id', 'zip_code', 'address'));
        }

        return redirect('/profile');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function productDetails($slug)
    {
        $product = Product::find($slug);
        
        $getProduct = Product::where('slug_ar', $slug)->orWhere('slug_en', $slug)->first();
        
        $medias = ProductMedia::where('product_id', $getProduct->id)->get();
        $ordersCount = OrderDetail::whereMonth('created_at', Carbon::now()->month)->count();
        $reviews_count = User::where('status', 1)->count();
        $getprods = DB::table('product_products_with')->where('product_id', $getProduct->id)->pluck('product_with_id');
        $getproducts_with = Product::whereIn('id', $getprods)->get();
        $get2Products = Product::whereIn('id', $getprods)->take(2)->get();
        $reviews = ProductReview::where('product_id', $getProduct->id)->where('status', 1)->latest()->paginate(5);
        $itemUrl='https://example.com/item/1';
        $itemTitle='example item';
        $shareLinks=Share::page($itemUrl, $itemTitle)
        ->facebook()->twitter()->whatsapp()
        ->getRawLinks();

        $facebook=$shareLinks['facebook'];
        $twitter = $shareLinks['twitter'];
        $whatsapp = $shareLinks['whatsapp'];
        
        return view('user.auth_user.product_details', compact(
            'product',
            'medias',
            'getProduct',
            'ordersCount',
            'getproducts_with',
            'reviews',
            'reviews_count',
            'get2Products',
            'facebook',
            'twitter',
            'whatsapp'
        ));
    }

    public function addToWishList($id)
    {
        $wish = Wishlist::where('product_id', $id)->where('user_id', auth()->user()->id)->first();
        if (isset($wish)) {
            $wish->delete();
        } else {
            $wishlist = new Wishlist();
            $wishlist->product_id = $id;
            $wishlist->user_id = auth()->user()->id;
            $wishlist->save();
        }
    }

    public function getUserWishlist()
    {
        if (auth()->user()) {
            $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
            return view('user.auth_user.wishlist', compact('wishlist'));
        } else {
            $wishlist = Wishlist::where('user_id', \Request::ip())->get();
            return view('user.auth_user.wishlist', compact('wishlist'));
        }
    }

    public function storeRatings(Request $request)
    {
        $user = "";
        if (auth()->user()) {
            $user = auth()->user()->id;
        } else {
            $user = \Request::ip();
        }

        $review = ProductReview::where('user_id', $user)
            ->where('product_id', $request->product_id)->first();

        if (isset($review)) {
            return redirect()->back()->withErrors(["error" => "you created review before !"]);
        } else {
            ProductReview::create([
                'user_id' => $user,
                'product_id' => $request->product_id,
                'name' => auth()->user() ? auth()->user()->name : $request->name,
                'title' => $request->title,
                'testimonial' => $request->testimonial,
                'email' => auth()->user() ? auth()->user()->email : $request->email
            ]);
            return redirect()->back();
        }
    }

    public function deleteWishlist($id)
    {
        $wishlist = Wishlist::find($id);
        $wishlist->delete();
        return redirect()->back();
    }

    public function verification()
    {
        $settings = AppSetting::first();
        return view('user.verification', compact('settings'));
    }

    public function invoice()
    {
        $settings = AppSetting::first();
        return view('user.auth_user.invoice', compact('settings'));
    }
}
