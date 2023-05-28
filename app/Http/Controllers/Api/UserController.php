<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Http\Request;
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
        $lang=getLang();
        $result = $this->userObject->home($lang);
        return response(res($lang, success(), 'home', $result));
    }

    public function eventsCategories()
    {
        $lang = getLang();
        $result = $this->userObject->eventsCategories($lang);
        return response(res($lang, success(), 'events-categories', $result));
    }

    public function eventHalls($category_id)
    {
        $lang = getLang();
        $result = $this->userObject->eventHalls($lang, $category_id);
        return response(res($lang, success(), 'event-halls', $result));
    }

    public function latestWedingsHalls()
    {
        $lang = getLang();
        $result = $this->userObject->latestWedingsHalls($lang);
        return response(res($lang, success(), 'latest_wedings_halls', $result));
    }

    public function latestBirthdaysHalls()
    {
        $lang = getLang();
        $result = $this->userObject->latestBirthdaysHalls($lang);
        return response(res($lang, success(), 'latest_birthdays_halls', $result));
    }

    public function latestEngagementsHalls()
    {
        $lang = getLang();
        $result = $this->userObject->latestEngagementsHalls($lang);
        return response(res($lang, success(), 'latest_engagements_halls', $result));
    }

    public function latestConferencesHalls()
    {
        $lang = getLang();
        $result = $this->userObject->latestConferencesHalls($lang);
        return response(res($lang, success(), 'latest_conferences_halls', $result));
    }

    public function getProducts()
    {
        $lang = getLang();
        $result = $this->userObject->getProducts($lang);
        return response(res($lang, success(), 'all_products', $result));
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
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []]);
        }
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []));
        }
        $request['user_id'] = $user->id;
        if(isset($request->product_id)){
            $request['product_id'] = $request->product_id;
        }
        if (isset($request->hall_id)) {
            $request['hall_id'] = $request->hall_id;
        }
        $return = $this->userObject->addFavorite($request);
        if ($return == "false") {
            return response()->json(res($lang, success(),'fave_deleted', []));
        }
        return response()->json(res($lang, success(),'fave_done', []));
    }

    public function getFavoriteList(Request $request)
    {
        $lang = getLang();

        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []));
        }
        $result = $this->userObject->getFavoriteList($user->id, $lang);
        return response()->json(res($lang, success(),'fave_list', $result));
    }

    public function getBrandProducts($brand_id)
    {
        $lang = getLang();
        $result = $this->userObject->getBrandProducts($lang, $brand_id);
        return response(res($lang, success(), 'brand_products', $result));
    }

    public function getCategoryProducts($category_id)
    {
        $lang = getLang();
        $result = $this->userObject->getCategoryProducts($lang, $category_id);
        return response(res($lang, success(), 'category_products', $result));
    }

    public function getProduct($product_id)
    {
        $lang = getLang();
        $result = $this->userObject->getProduct($lang, $product_id);
        return response(res($lang, success(), 'product_details', $result));
    }

    // public function getHall($hall_id)
    // {
    //     $lang = getLang();
    //     $result = $this->userObject->getHall($lang, $hall_id);
    //     return response(res($lang, success(), 'hall_details', $result));
    // }

    public function getPackage($package_id)
    {
        $lang = getLang();
        $result = $this->userObject->getPackage($lang, $package_id);
        return response(res($lang, success(), 'package_details', $result));
    }
}