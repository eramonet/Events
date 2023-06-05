<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\SettingsRepositoryInterface;
use App\Models\City;
use App\Models\Country;
use App\Models\Inquery;
use App\Models\InqueryReply;
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
        return response(res($lang, success(), 'cities', $result), 200);
    }


    public function getRegions($city_id)
    {
        $lang = getLang();
        $country=Country::first();

        $city  = City::where('id', $city_id)->where('country_id', $country->id)->first();
        if (!isset($city)) {
            return response()->json(res($lang, failed(), 'city_not_found'), 400);
        } else {
            $result = $this->settingObject->getRegions($city);
            return response()->json(res($lang, success(), 'regions', $result), 200);
        }
    }

    public function getTerms()
    {
        $lang = getLang();
        $result = $this->settingObject->getTerms($lang);
        return response(res($lang, success(), 'terms_cond', $result), 200);
    }

    public function getAbout()
    {
        $lang = getLang();
        $result = $this->settingObject->getAbout($lang);
        return response(res($lang, success(), 'about', $result), 200);
    }

    public function getFaqs()
    {
        $lang = getLang();
        $result = $this->settingObject->getFaqs($lang);
        return response(res($lang, success(), 'faqs', $result), 200);
    }

    public function getColors()
    {
        $lang = getLang();
        $result = $this->settingObject->getColors($lang);
        return response(res($lang, success(), 'colors', $result), 200);
    }

    public function getBrands()
    {
        $lang = getLang();
        $result = $this->settingObject->getBrands($lang);
        return response(res($lang, success(), 'brands', $result), 200);
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
            return response()->json(['status' => false, 'message' => $validator->errors()->first(),'data'=>[]], 200);
        }
        $a = $request->header('Authorization');
        if (isset($a)) {
            $user = User::where('id', $request->user()->id)->first();
            if ($user == 'false') {
                return response()->json(res($lang, expired(), 'user_not_found',[]), 404);
            }
            $request['user_id'] = $user->id;
            $request['name'] = $request->name;
            $request['email'] = $request->email;
            $request['message'] = $request->message;
            $this->settingObject->insertContactForm($request);
            return response()->json(res($lang, success(), 'suggestion_sent',[]), 200);
        } else {
            $request['name'] = $request->name;
            $request['email'] = $request->email;
            $request['message'] = $request->message;
            $this->settingObject->insertContactFormWithoutToken($request);
            return response()->json(res($lang, success(), 'suggestion_sent',[]), 200);
        }
    }

    public function getCategories()
    {
        $lang = getLang();
        $result = $this->settingObject->getCategories($lang);
        return response(res($lang, success(), 'main_categories', $result), 404);
    }

    public function getNotifications(Request $request)
    {
        $lang = getLang();
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $result = $this->settingObject->getNotifications($user,$lang);
        return response(res($lang, success(), 'all_notifications', $result), 200);
    }

    public function send_query(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make($request->all(), [
            "fullname" => 'required',
            "email" => 'required|email',
            "phone" => 'required|min:10',
            "message" => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }

        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }

        // return $request;
        Inquery::create([
            "user_id" => $user->id,
            "name" => $request->fullname,
            "email" => $request->email,
            "mobile" => $request->phone,
            "message" => $request->message,
        ]);
        return response()->json(res($lang, success(), 'query_sent', []), 200);
    }

    public function myQueries(Request $request)
    {
        $lang = getLang();
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(), 'user_not_found', []), 404);
        }
        $nqueries = Inquery::where("user_id", $user->id)
            ->where('status', 0)
            ->get();

        $allnewqueries = array();
        $i          = 0;
        foreach ($nqueries as $nquery) {
            $allnewqueries[$i] = array(
                'id'     => $nquery->id,
                'name'     => $nquery->name,
                'email'     => $nquery->email,
                'mobile'     => $nquery->mobile,
                'message' => $nquery->message
            );
            $i++;
        }

        $getQueries = Inquery::where("user_id", $user->id)
            ->where('status', 1)
            ->pluck('id');

        $rqueries = InqueryReply::whereIn('inquery_id', $getQueries)->get();

        $allrepliedqueries = array();
        $i          = 0;
        foreach ($rqueries as $rquery) {
            $allrepliedqueries[$i] = array(
                'id'     => $rquery->inquery_id,
                'name'     => Inquery::where('id', $rquery->inquery_id)->first()->name,
                'email'     => Inquery::where('id', $rquery->inquery_id)->first()->email,
                'mobile'     => Inquery::where('id', $rquery->inquery_id)->first()->mobile,
                'message' => Inquery::where('id', $rquery->inquery_id)->first()->message
            );
            $i++;
        }

        $cqueries = Inquery::where("user_id",$user->id)
            ->where('status', 2)
            ->get();

        $allcancelledqueries = array();
        $i          = 0;
        foreach ($cqueries as $cquery) {
            $allcancelledqueries[$i] = array(
                'id'     => $cquery->id,
                'name'     => $cquery->name,
                'email'     => $cquery->email,
                'mobile'     => $cquery->mobile,
                'message' => $cquery->message
            );
            $i++;
        }


        $data = [
            'new' => $allnewqueries,
            'replied' => $allrepliedqueries,
            'cancelled' => $allcancelledqueries
        ];

        return response(res($lang, success(), 'all_queries', $data), 200);


    }

   public function becomeVendor(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);

        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required',
                'phone_number' => 'required',
                'coment' => 'required',
                'sign_from' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 'data' => []], 200);
        }
        $a = $request->header('Authorization');
        if (isset($a)) {
            $user = User::where('id', $request->user()->id)->first();
            if ($user == 'false') {
                return response()->json(res($lang, expired(), 'user_not_found',[]), 404);
            }
            $request['user_id']=$user->id;
            $request['name'] = $request->name;
            $request['email'] = $request->email;
            $request['phone_number'] = $request->phone_number;
            $request['coment'] = $request->coment;
            $request['sign_from'] = $request->sign_from;
            $this->settingObject->becomeVendorWithToken($request);
            return response()->json(res($lang, success(), 'request_sent', []), 200);
           
        }else{
            $request['name'] = $request->name;
            $request['email'] = $request->email;
            $request['phone_number'] = $request->phone_number;
            $request['coment'] = $request->coment;
            $request['sign_from'] = $request->sign_from;
            $this->settingObject->becomeVendor($request);
            return response()->json(res($lang, success(), 'request_sent', []), 200);
        }
    }


}