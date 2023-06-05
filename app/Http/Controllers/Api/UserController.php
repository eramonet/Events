<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\UserRepositoryInterface;
use App\Models\CartHall;
use App\Models\Order;
use App\Models\Product;
use App\Models\Region;
use App\Models\User;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $userObject;

    public function __construct(UserRepositoryInterface $userObject)
    {
        $this->userObject = $userObject;
    }

    public function home()
    {
        $lang = getLang();
        $result = $this->userObject->home($lang);
        return response(res($lang, success(), 'home', $result), 200);
    }

    public function eventsCategories()
    {
        $lang = getLang();
        $result = $this->userObject->eventsCategories($lang);
        return response(res($lang, success(), 'events-categories', $result), 200);
    }

    public function eventHalls($category_id)
    {
        $lang = getLang();
        $result = $this->userObject->eventHalls($lang, $category_id);
        return response(res($lang, success(), 'event-halls', $result), 200);
    }

    public function latestWedingsHalls()
    {
        $lang = getLang();
        $result = $this->userObject->latestWedingsHalls($lang);
        return response(res($lang, success(), 'latest_wedings_halls', $result), 200);
    }

    public function latestBirthdaysHalls()
    {
        $lang = getLang();
        $result = $this->userObject->latestBirthdaysHalls($lang);
        return response(res($lang, success(), 'latest_birthdays_halls', $result), 200);
    }

    public function latestEngagementsHalls()
    {
        $lang = getLang();
        $result = $this->userObject->latestEngagementsHalls($lang);
        return response(res($lang, success(), 'latest_engagements_halls', $result), 200);
    }

    public function latestConferencesHalls()
    {
        $lang = getLang();
        $result = $this->userObject->latestConferencesHalls($lang);
        return response(res($lang, success(), 'latest_conferences_halls', $result), 200);
    }

    public function getProducts()
    {
        $lang = getLang();
        $result = $this->userObject->getProducts($lang);
        return response(res($lang, success(), 'all_products', $result), 200);
    }

    public function AddFavorite(Request $request)
    {
        $lang = getLang();
        $validator = Validator::make(
            $request->all(),
            [
                'product_id' => 'sometimes',
                'hall_id' => 'sometimes',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $request['user_id'] = $user->id;
        $request['product_id'] = $request->product_id;
        $request['hall_id'] = $request->hall_id;

        $return = $this->userObject->addFavorite($request);
        if ($return == "false") {
            return response()->json(res($lang, success(), 'fave_deleted', []), 200);
        }
        return response()->json(res($lang, success(), 'fave_done', []), 200);
    }

    public function getFavoriteList(Request $request)
    {
        $lang = getLang();

        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $result = $this->userObject->getFavoriteList($user->id, $lang);
        return response()->json(res($lang, success(), 'fave_list', $result), 200);
    }

    public function getBrandProducts($brand_id)
    {
        $lang = getLang();
        $brand = Vendor::where('id', $brand_id)->first();
        if (isset($brand)) {
            $result = $this->userObject->getBrandProducts($lang, $brand_id);
            return response(res($lang, success(), 'brand_products', $result), 200);
        } else {
            return response()->json(res($lang, expired(), 'brand_not_found', []), 404);
        }
    }

    public function getCategoryProducts($category_id)
    {
        $lang = getLang();
        $result = $this->userObject->getCategoryProducts($lang, $category_id);
        return response(res($lang, success(), 'category_products', $result), 200);
    }

    public function getProduct($product_id)
    {
        $lang = getLang();
        $result = $this->userObject->getProduct($lang, $product_id);
        return response(res($lang, success(), 'product_details', $result), 200);
    }

    public function getHall($hall_id)
    {
        $lang = getLang();
        $result = $this->userObject->getHall($lang, $hall_id);

        return response(res($lang, success(), 'hall_details', $result), 200);
    }

    public function getPackage($package_id)
    {
        $lang = getLang();
        $result = $this->userObject->getPackage($lang, $package_id);
        return response(res($lang, success(), 'package_details', $result), 200);
    }

    public function search(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $validator = Validator::make(
            $request->all(),
            [
                'search' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }
        $request['search'] = $request->search;
        $result = $this->userObject->search($request, $lang);
        return response(res($lang, success(), 'search', $result), 200);
    }

    public function createHallsCart(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $validator = Validator::make(
            $request->all(),
            [
                'package_id' => 'required|exists:packages,id',
                'hall_id' => 'required|exists:halls,id',
                'option_id' => 'required|array|exists:package_options,id',
                'option_id.*' => 'required',
                'quantity' => 'required|array',
                'quantity.*' => 'required',
                'date'=>'required',
                'time_from'=>'required',
                'time_to'=>'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $cartHall = CartHall::where('hall_id', $request->hall_id)->first();
        if ($cartHall == null) {
            $request['user_id'] = $user->id;
            $request['package_id'] = $request->package_id;
            $request['hall_id'] = $request->hall_id;

            $result = $this->userObject->createHallsCart($request);
            return response(res($lang, success(), 'add_to_cart', $result), 200);
        } else {
            return response()->json(res($lang, failed(), 'cart_exist', []), 404);
        }
    }

    public function getHallsCart(Request $request)
    {
        $lang = getLang();
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $result = $this->userObject->getHallsCart($user, $lang);
        return response(res($lang, success(), 'get_cart', $result), 200);
    }

    public function checkoutHall(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $validator = Validator::make(
            $request->all(),
            [
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'city_id' => 'required|exists:cities,id',
                'region_id' => 'required|exists:regions,id',
                'address' => 'required',
                'comment' => 'required',
                'extra_guest' => 'required',
                'date' => 'required',
                'time_from' => 'required',
                'time_to' => 'required',
                'hall_id' => 'required|exists:halls,id',
                'package_id' => 'required|exists:packages,id',
                'option_id' => 'required|array|exists:package_options,id',
                'option_id.*' => 'required',
                'quantity' => 'required|array',
                'quantity.*' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $cartHall = CartHall::where('hall_id', $request->hall_id)->first();
        if ($cartHall != null) {
            $request['fname'] = $request->fname;
            $request['lname'] = $request->lname;
            $request['email'] = $request->email;
            $request['phone'] = $request->phone;
            $request['city_id'] = $request->city_id;
            $request['region_id'] = $request->region_id;
            $request['address'] = $request->address;
            $request['comment'] = $request->comment;
            $request['extra_guest'] = $request->extra_guest;
            $request['date'] = $request->date;
            $request['time_from'] = $request->time_from;
            $request['time_to'] = $request->time_to;
            $request['hall_id'] = $request->hall_id;
            $request['user_id'] = $user->id;
            $request['package_id'] = $request->package_id;

            $this->userObject->checkoutHall($request);
            return response(res($lang, success(), 'checkout', []), 200);
        } else {
            return response()->json(res($lang, failed(), 'cart_not_exist', []), 404);
        }
    }

    public function filter(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $validator = Validator::make(
            $request->all(),
            [
                'price_from' => 'nullable',
                'price_to' => 'nullable',
                'brand_id' => 'nullable|exists:vendors,id',
                'color_id' => 'nullable|exists:colors,id',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }
        $result = $this->userObject->filter($request, $lang);
        return response(res($lang, success(), 'filter', $result), 200);
    }

    public function rateBooking(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'rate' => 'required',
                'review' => 'required',
                'transaction_id' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }

        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $request['user_id'] = $user->id;
        $request['rate'] = $request->rate;
        $request['review'] = $request->review;
        $request['transaction_id'] = $request->transaction_id;
        $this->userObject->rateBooking($request);
        return response()->json(res($lang, success(), 'done', []), 200);
    }

    public function rateOrder(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'rate' => 'required',
                'review' => 'required',
                'transaction_id' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }

        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $request['user_id'] = $user->id;
        $request['rate'] = $request->rate;
        $request['review'] = $request->review;
        $request['transaction_id'] = $request->transaction_id;
        $this->userObject->rateOrder($request);
        return response()->json(res($lang, success(), 'done', []), 200);
    }

    public function checkDate(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'date' => 'required|date',
                'hall_id' => 'required|exists:halls,id',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }
        $request['date'] = $request->date;
        $request['hall_id'] = $request->hall_id;
        $result = $this->userObject->checkDate($request, $lang);
        return response(res($lang, success(), 'dates', $result), 200);
    }

    public function orderProductCart(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'quantity' => 'required|integer|min:1',
                'product_id' => 'required|exists:products,id',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }

        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $product=Product::where('id',$request->product_id)->first();
        if($product->stock<="0"){
            return response()->json(res($lang, failed(), 'product_out_stock', []), 404);
        }
        if($request->quantity>$product->limitation){
            return response()->json(res($lang, failed(), 'quantity_not_equal_limitation', []), 404);
        }
        $request['user_id'] = $user->id;
        $request['quantity'] = $request->quantity;
        $request['product_id'] = $request->product_id;
        $this->userObject->orderProductCart($request);
        return response(res($lang, success(), 'add_to_cart', []), 200);
    }

    public function getProductsCart(Request $request)
    {
        $lang = getLang();
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $result = $this->userObject->getProductsCart($user, $lang);
        return response(res($lang, success(), 'get_cart', $result), 200);
    }

    public function checkoutProduct(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $validator = Validator::make(
            $request->all(),
            [
                'city_id' => 'required|exists:cities,id',
                'region_id' => 'required|exists:regions,id',
                'customer_name' => 'required',
                'customer_email' => 'required',
                'customer_address' => 'required',
                'customer_phone' => 'required',
                'order_from' => 'required',
                'product_id' => 'required|array|exists:products,id',
                'product_id.*' => 'required',
                'quantity' => 'required|array',
                'quantity.*' => 'required',
                'promo_code' => 'nullable',

            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }

        $request['user_id'] = $user->id;
        $request['city_id'] = $request->city_id;
        $request['region_id'] = $request->region_id;
        $request['customer_name'] = $request->customer_name;
        $request['customer_email'] = $request->customer_email;
        $request['customer_address'] = $request->customer_address;
        $request['customer_phone'] = $request->customer_phone;
        $request['product_id'] = $request->product_id;
        $request['quantity'] = $request->quantity;
        $request['promo_code'] = $request->promo_code;
        $request['order_from'] = $request->order_from;

        return $this->userObject->checkoutProduct($request);
        return response(res($lang, success(), 'checkout', []), 200);
    }

    public function myOrders(Request $request)
    {
        $lang = getLang();
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $result = $this->userObject->myOrders($user, $lang);
        return response(res($lang, success(), 'my_orders', $result), 200);
    }

    public function orderDetails(Request $request, $order_id)
    {
        $lang = getLang();
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $result = $this->userObject->orderDetails($user, $order_id, $lang);
        return response(res($lang, success(), 'order_details', $result), 200);
    }

    public function cancelOrder(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'order_id' => 'required|exists:orders,id',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $order = Order::where('customer_email', $user->email)
            ->where('id', $request->order_id)
            ->where('status', 'pending')
            ->first();
        if (isset($order)) {
            $order->status = "cancelled";
            $order->save();
            return response(res($lang, success(), 'done', []), 200);
        } else {
            return response()->json(res($lang, failed(), 'order_not_found', []), 404);
        }
    }
    public function rateUs(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'rate' => 'required',
                'review' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }

        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $request['user_id'] = $user->id;
        $request['rate'] = $request->rate;
        $request['review'] = $request->review;
        $this->userObject->rateUs($request);
        return response()->json(res($lang, success(), 'done', []), 200);
    }

    public function inviteFriend(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'email' => [
                    'required', 'email','regex:/^\w+[-\.\w]*@(?!(?:myemail)\.com$)\w+[-\.\w]*?\.\w{2,4}$/'
                ],
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        try{
        $data = array('email' => $request->email,'name'=>$user->name);
            Mail::send('email.invite', $data, function ($message) use ($request) {
                $message->to($request->email)->subject('Invitation');
                $message->from('events@gmail.com', 'Events App');
            });
            return response()->json(res($lang, success(), 'done', []), 200);

        }catch(Exception $e){
            return response()->json(res($lang, failed(), 'email_not_found', []), 404);
        }
    }

    public function deleteHallCart(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'package_id' => 'required|exists:packages,id',
                'hall_id' => 'required|exists:halls,id',
                'cart_id' =>'required|exists:cart_halls,id',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }

        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $request['user_id'] = $user->id;
        $request['package_id'] = $request->package_id;
        $request['hall_id'] = $request->hall_id;
        $request['cart_id'] = $request->cart_id;
        $this->userObject->deleteHallCart($request);
        return response()->json(res($lang, success(), 'done', []), 200);
    }

    public function updateHallCart(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'package_id' => 'required|exists:packages,id',
                'hall_id' => 'required|exists:halls,id',
                'cart_id' =>'required|exists:cart_halls,id',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }

        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $request['user_id'] = $user->id;
        $request['package_id'] = $request->package_id;
        $request['hall_id'] = $request->hall_id;
        $request['cart_id'] = $request->cart_id;
        $this->userObject->updateHallCart($request);
        return response()->json(res($lang, success(), 'done', []), 200);
    }

    public function deleteProductsCart(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'cart_id' =>'required|exists:cart,id',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }

        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $request['cart_id'] = $request->cart_id;
        $this->userObject->deleteHallCart($request);
        return response()->json(res($lang, success(), 'done', []), 200);
    }

    public function updateProductsCart(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'cart_id' =>'required|exists:cart,id',
                'quantity'=>'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }

        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $request['cart_id'] = $request->cart_id;
        $this->userObject->updateProductsCart($request);
        return response()->json(res($lang, success(), 'done', []), 200);
    }

}
