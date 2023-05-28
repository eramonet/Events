<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\SettingsRepositoryInterface;
use App\Models\City;
use App\Models\Region;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SettingsController extends Controller
{
    protected $settingObject;
    public function __construct(SettingsRepositoryInterface $settingRepository)
    {
        $this->settingObject = $settingRepository;
    }
    public function getCities()
    {
        $lang = getLang();
        $result = $this->settingObject->getCities($lang);
        return response(res($lang, success(), 'cities', $result));
    }


    public function getRegions($city_id)
    {
        $lang = getLang();
        $city  = City::where('id', $city_id)->where('country_id','3')->first();
        if (!isset($city)) {
            return response()->json(res($lang, failed(), 'city_not_found'));
        } else {
            $result = $this->settingObject->getRegions($city);
            return response()->json(res($lang, success(), 'regions', $result));
        }
    }

    public function getTerms()
    {
        $lang = getLang();
        $result = $this->settingObject->getTerms($lang);
        return response(res($lang, success(), 'terms_cond', $result));
    }

    public function getAbout()
    {
        $lang = getLang();
        $result = $this->settingObject->getAbout($lang);
        return response(res($lang, success(), 'about', $result));
    }

    public function getFaqs()
    {
        $lang = getLang();
        $result = $this->settingObject->getFaqs($lang);
        return response(res($lang, success(), 'faqs', $result));
    }

    public function getColors()
    {
        $lang = getLang();
        $result = $this->settingObject->getColors($lang);
        return response(res($lang, success(), 'colors', $result));
    }

    public function getBrands()
    {
        $lang = getLang();
        $result = $this->settingObject->getBrands($lang);
        return response(res($lang, success(), 'brands', $result));
    }

    public function insertContactForm(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'message' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(),'data'=>[]]);
        }
        $a = $request->header('Authorization');
        if (isset($a)) {
            $user = User::where('id', $request->user()->id)->first();
            if ($user == 'false') {
                return response()->json(res($lang, expired(), 'user_not_found',[]));
            }
            $request['user_id'] = $user->id;
            $request['name'] = $request->name;
            $request['email'] = $request->email;
            $request['message'] = $request->message;
            $this->settingObject->insertContactForm($request);
            return response()->json(res($lang, success(), 'suggestion_sent',[]));
        } else {
            $request['name'] = $request->name;
            $request['email'] = $request->email;
            $request['message'] = $request->message;
            $this->settingObject->insertContactFormWithoutToken($request);
            return response()->json(res($lang, success(), 'suggestion_sent',[]));
        }
    }

    public function getCategories()
    {
        $lang = getLang();
        $result = $this->settingObject->getCategories($lang);
        return response(res($lang, success(), 'main_categories', $result));
    }

    public function getNotifications(Request $request)
    {
        $lang = getLang();
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []));
        }
        $result = $this->settingObject->getNotifications($user,$lang);
        return response(res($lang, success(), 'notifications', $result));
    }

}
