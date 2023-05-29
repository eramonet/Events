<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AuthRepositoryInterface;
use App\Http\Resources\UserResource;
use App\Models\City;
use App\Models\Country;
use App\Models\User;
use App\Models\Verification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    // public function login(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         "email" => 'required',
    //         'password' => 'required'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(["errors" => $validator->errors()], 404);
    //     }

    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         $authUser = Auth::user();
    //         $user = auth()->user();

    //         $user["country"] = $user->country;
    //         $user["city"] = $user->city;
    //         $user["region"] = $user->region;

    //         return response()->json(["token" => $authUser->createToken('MyAuthApp')->plainTextToken, "member" => $user], 200);
    //     } else {
    //         return response()->json(["errors" => "invalid credentials"], 404);
    //     }
    // }

    // public function register(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required',
    //         'c_password' => 'required|same:password',
    //         'phone' => 'required|digits:11|unique:users',
    //         'birth_date' => 'required|date',
    //         'gender' => 'required',
    //         'country_id' => 'required',
    //         'city_id' => 'required',

    //     ]);
    //     if ($validator->fails()) {
    //         return response()->json(['error' => $validator->errors()], 401);
    //     }
    //     $input = $request->all();
    //     $input['password'] = bcrypt($input['password']);

    //     // validate country
    //     $country = Country::where("id", $request->country_id)->first();

    //     // if (!$country) {
    //     //     return response()->json(['error' => "invalid country"], 401);
    //     // }
    //     // validare city
    //     // $city = City::where([
    //     //     "country_id" => $country->id,
    //     //     "id" => $request->city_id
    //     // ])->first();

    //     // if (!$city) {
    //     //     return response()->json(['error' => "invalid city"], 401);
    //     // }

    //     // validate gender
    //     if ($request->gender != "male" && $request->gender != "female") {
    //         return response()->json(['error' => "invalid gender"], 401);
    //     }

    //     $user = User::create([
    //         "name" => $request->name,
    //         "email" => $request->email,
    //         "password" => bcrypt($request->password),
    //         "phone" => $request->phone,
    //         "birth_date" => $request->birth_date,
    //         "gender" => $request->gender,
    //         "country_id" => 1,
    //         "city_id" => 1,
    //     ]);
    //     $success['token'] =  $user->createToken('MyAuthApp')->plainTextToken;
    //     $success['name'] =  $user->name;

    //     return response()->json(["msg" => $success], 200);
    // }

    protected $authObject;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authObject = $authRepository;
    }

    public function signUp(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $validator = Validator::make(
            $request->all(),
            array(
                'fname' => ['required', 'string', 'min:2'],
                'lname' => ['required', 'string', 'min:2'],
                'email' => [
                    'required', 'email', 'unique:users', 'regex:/^\w+[-\.\w]*@(?!(?:myemail)\.com$)\w+[-\.\w]*?\.\w{2,4}$/'
                ],
                'phone' => ['required', 'string', 'unique:users'],
                'password' => ['required', 'string', 'min:6'],
                'password_confirmation' => ['required', 'string', 'same:password'],
                'gender' => 'required', 'string', Rule::in(['male', 'female']),
                'city_id' => ['required', 'exists:cities,id'],
                'region_id' => ['required', 'exists:regions,id'],
                'sign_from' => 'required', 'string', Rule::in(['ios', 'android']),
                'image' => ['nullable', 'image', 'max:10240','mimes:jpeg,png,jpg,gif'],
                'address' => ['required', 'string', 'min:2'],
                'birth_date' => ['required', 'date'],
                'lat' => ['required'],
                'lng' => ['required']
            )
        );
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first(), 'data' => []],200);
        }

        $emialex = User::whereEmail($request->email)->get();
        $mobileex = User::wherePhone($request->phone)->get();
        if (isset($emialex) && count($emialex) > 0) {
            return response()->json(res($lang, failed(), 'email_exist',[]), 404);
        }
        if (
            isset($mobileex) && count($mobileex) > 0
        ) {
            return response()->json(res($lang, failed(),'phone_exist', []), 404);
        }
        $dateOfBirth = $request->birth_date;
        $years = Carbon::parse($dateOfBirth)->age;
        if($years<17){
            return response()->json(res($lang, failed(), 'years_small_than_17', []), 404);
        }
        $city=City::where('id',$request->city_id)->first();
        //$data = $request->all();
        $data = $request->only(
            'fname',
            'lname',
            'email',
            'phone',
            'password',
            'gender',
            'city_id',
            'region_id',
            'sign_from',
            'image',
            'address',
            'lat',
            'lng',
            'birth_date',
            'image'
        );
        $data['name']=$request->fname.' '.$request->lname;
        $data['password'] = Hash::make($request->password);
        $data['country_id'] = $city->country->id;
        $user=User::create($data);
        $this->authObject->sendVerificationCode($request);
        return response()->json(res($lang, success(), 'registered', ["code"=> "1234"]),200);
    }

    public function login(Request $request)
    {
        $lang = getLang();

        App::setLocale($lang);
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required',
                'password' => 'required',
                'fcm_token' => 'required',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first(),'data'=>[]], 200);
        }
        $user = User::where('email',$request->email)->first();
        if (!$user) {
            return response()->json(res($lang, failed(), 'user_not_found',[]), 404);
        }
        $checked = Hash::check($request->password, $user->password);
        if (!$checked) {
            return response()->json(res($lang, failed(),'invalid_password', []), 404);
        } else {
            if ($user->verified_status == 0) {
                $this->authObject->sendVerificationCode($user);
                return response()->json(res($lang, failed(), 'user_not_verified', []), 404);
            }
            if ($user->status == 1) {
                $user->update(array('fcm-token' => $request->fcm_token));
                return response()->json(res(
                    $lang,
                    success(),
                    'logged_in',
                    new UserResource($user)
                ), 200);
            } else {
                return response()->json(res($lang, failed(), 'user_not_activated', []), 404);
            }
        }
    }

    public function sendVerificationCode(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $validator = Validator::make(
            $request->all(),
            ['email' => 'required',]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(),'data'=>[]], 404);
        }
        $flag = $this->authObject->sendVerificationCode($request);
        if ($flag == 'code_sent') {
            $getcode = User::where('email', $request->email)->first();
            $code = Verification::where('user_id', $getcode->id)->first()->code;
            return response(res($lang, success(), 'code_sent', []), 200);
        } else {
            return response(res($lang, failed(),'user_not_found', []), 404);
        }
    }

    public function verifyCode(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $validator = Validator::make(
            $request->all(),
            ['code' => 'required']
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(),'data'=>[]], 404);
        }
        $flag = $this->authObject->verifyCode($request);
        if (isset($flag->id)) {
            return response(res($lang, success(), 'activated', []), 200);
        } elseif ($flag == 'invalid_code') {
            return response(res($lang, failed(),'invalid_code', []), 404);
        } elseif ($flag == 'user_already_verified') {
            return response(res($lang, failed(),'user_already_verified', []), 404);
        }
    }

    public function changePassword(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $validator = Validator::make($request->all(), array(
            'password' => 'required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'required',
            'email'
        ));
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(),'data'=>[]], 404);
        }
        $user = User::where('email', $request->email)->first();
        if (isset($user)) {
            $request['email'] = $request->email;
            $flag = $this->authObject->changeUserPassword($request);
            if (isset($flag->id)) {
                return response(res($lang, success(), 'password_changed', new UserResource($flag)), 200);
            } elseif ($flag == "invalid_password") {
                return response(res(
                    $lang,
                    failed(),
                    'invalid_password',[]
                ), 404);
            }
        } else {
            return response()->json(res($lang, failed(), 'user_not_found',[]), 404);
        }
    }

    public function logout(Request $request)
    {
        $lang = getLang();
        $user = User::where('id', $request->user()->id)->first();
        if (!isset($user)) {
            return response()->json(res(
                $lang,
                failed(),
                'user_not_verified',
                []
            ), 404);
        } else {
            $user->update(['fcm-token' => null]);
            $request->user()->currentAccessToken()->delete();
            return response()->json(res($lang, success(),'logout', []), 200);
        }
    }

    public function userProfile(Request $request)
    {
        $lang = getLang();
        $user = User::where('id', $request->user()->id)->first();
        if (!isset($user)) {
            return response()->json(res($lang, failed(),'user_not_found', []), 404);
        } else {
            return response()->json(res($lang, success(), 'user_profile', new UserResource($user)), 200);
        }
    }

    public function updateUserProfile(Request $request)
    {
        $lang = getLang();
        $data = $request->all();
        $user = User::where('id', $request->user()->id)->first();
        if ($user) {
            if (isset($request->password)) {
                $data['password'] = Hash::make($request->password);
            }
            $user->update($data);
            return response()->json(res($lang, success(), 'updated', new UserResource($user)), 200);
        } else {
            return response()->json(res($lang, failed(),'user_not_found', []), 404);
        }
    }

    public function updateLang(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $user = User::where('id', $request->user()->id)->first();
        $validator = Validator::make(
            $request->all(),
            array(
                'lang' => 'required',
            )
        );
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first(),'data'=>[]], 200);
        }
        if (isset($user)) {
            $user->update(['lang' => $request->lang]);
            return response()->json(res($lang, success(),'updated', []), 200);
        } else {
            return response()->json(res($lang, failed(),'user_not_found', []), 404);
        }
    }

    public function updateUserFirebase(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $user = User::where('id', $request->user()->id)->first();
        if ($user) {
            $validator = Validator::make(
                $request->all(),
                array(
                    'fcm_token' => 'required',
                )
            );
            if ($validator->fails()) {
                return response()->json(['status' => false, 'message' => $validator->errors()->first(),'data'=>[]], 404);
            }
            $user->update(['fcm-token' => $request->fcm_token]);

            return response()->json(res($lang, success(),'updated', []), 200);
        } else {
            return response()->json(res($lang, failed(),'user_not_found', []), 404);
        }
    }

    public function updatePasswordProfile(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $validator = Validator::make(
            $request->all(),
            [
                'old_password' => 'required',
                'password' => 'required_with:password_confirmation|same:password_confirmation',
                'password_confirmation' => 'required'
            ]
        );
        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(),'data'=>[]], 404);
        }
        $user = User::where('id', $request->user()->id)->first();
        if ($user == 'false') {
            return response()->json(res($lang, expired(),'user_not_found', []), 404);
        }
        if (Hash::check($request->old_password, $user->password) && $request->password != null && ($request->password == $request->password_confirmation)) {
            $user->password = Hash::make($request->password);
            if ($user->save()) {
                return response(res(
                    $lang,
                    success(),
                    'password_changed',
                    []
                ), 200);
            } else {
                return response(res($lang, failed(),'invalid_oldpassword', []), 404);
            }
        } else {
            return response(res($lang, failed(),'invalid_oldpassword', []), 404);
        }
    }

    public function Suspend(Request $request)
    {
        $lang = getLang();
        App::setLocale($lang);
        $user = User::where('id', $request->user()->id)->first();
        $validator = Validator::make(
            $request->all(),
            array(
                'status' => 'required', 'numeric', Rule::in(['0', '1'])
                )
        );
        if ($validator->fails()) {
            return response()->json(['status' => 0, 'message' => $validator->errors()->first(), 'data' => []], 404);
        }
        if (isset($user)) {
            $user->update(['status' => $request->status]);
            return response()->json(res($lang, success(), 'updated', []), 200);
        } else {
            return response()->json(res($lang, failed(), 'user_not_found', []), 404);
        }
    }
}