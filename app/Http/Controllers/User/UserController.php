<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SignUpRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function login_page()
    {
        return view('user.login');
    }

    public function login_action(Request $request)
    {
        $credentials = $request->all('email' , 'password');

        if(!Auth::validate($credentials)):
            return redirect()->to('login')->withErrors(trans('trans.login_failed'));
        endif;

        $user = Auth::getProvider()->retrieveByCredentials($credentials);

        Auth::login($user);

        return redirect('/');
    }

    public function signup_page()
    {
        $cities = City::where("country_id" , 3)->latest()->get() ;
        return view('user.signup' , compact('cities'));
    }

    public function signup_action(SignUpRequest $request)
    {
        $inputs = [] ;
        $inputs["name"] = $request->firstname . " " . $request->lastname ;
        $inputs["email"] = $request->email;
        $inputs["phone"] = $request->phone;
        $inputs["image"] = $request->image ? $this->store_image($request , "image" , "user_assets/uploads/users_profile") : null;
        $inputs["birth_date"] = $request->bdate;
        $inputs["gender"] = $request->gender;
        $inputs["sign_from"] = "web";
        $inputs["country_id"] = 3;
        $inputs["city_id"] = $request->city_id;
        $inputs["region_id"] = $request->region_id;
        $inputs["lang"] = session()->get('locale');
        $inputs["fname"] = $request->firstname;
        $inputs["lname"] = $request->lastname;
        $inputs["address"] = $request->address;
        $inputs["lat"] = $request->lat;
        $inputs["lng"] = $request->lang;
        $inputs["password"] = $request->password;
        $inputs["status"] = "1" ;

        $user = $this->create_fun( User::class , $inputs);

        auth()->login($user);

        $msg = "" ;

        if( $this->get_lang() == "en" ){
            $msg = "Account successfully registered ." ;
        }else{
            $msg = " تم أنشاء الحساب " ;
        }

        return redirect("login")->with('success', $msg) ;
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('login');
    }


}
