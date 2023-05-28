<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Exports\UserExport;
use Illuminate\Http\Request;
use App\Services\CityService;
use App\Services\UserService;
use Illuminate\Validation\Rule;
use App\Services\CountryService;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\OrderProduct;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    protected $userService;
    protected $countryService;
    protected $cityService;

    public function __construct(UserService $userService, CountryService $countryService, CityService $cityService)
    {

        $this->userService = $userService;
        $this->countryService = $countryService;
        $this->cityService = $cityService;

        $this->middleware(['permission:users-read'])->only(['index', 'export']);
        $this->middleware(['permission:users-create'])->only(['create', 'store']);
        $this->middleware(['permission:users-update'])->only(['update', 'edit']);
        $this->middleware(['permission:users-delete'])->only(['destroy']);
    }

    public function index(Request $request)
    {


        $users = $this->userService->getAll($request);

        return \view('admin.user.index', \compact('users'));
    }

    public function create(Request $request)
    {


        $countries = $this->countryService->getActiveCountries();
        $cities = City::latest()->get();

        return \view('admin.user.create', \compact('countries', 'cities'));
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new UserExport,  Carbon::now() . '-users.xlsx');
    }

    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'name' => ['required', 'string', 'min:2'],
                'email' => ['required', 'email', 'unique:users'],
                'phone' => ['required', 'string', 'unique:users'],
                'password' => ['required', 'string', 'min:6'],
                'password_confirmation' => ['required', 'string', 'same:password'],
                'gender' => ['required', 'string', Rule::in(['male', 'female'])],
                'image' => ['nullable', 'image', 'max:10240'],
                'status' => ['required', 'string', Rule::in([1, 0])],
                'city_id' => ['required', 'exists:cities,id'],
            ]
        );

        $created = $this->userService->store($request);

        if ($created) {
            $request->session()->flash('success', 'User Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->route('admin.users.index');
    }



    public function edit(Request $request, $id)
    {

        $user = $this->userService->getById($id);
        if (!$user) {
            $request->session()->flash('failed', 'User Not Found');
            return redirect()->back();
        }

        $cities = City::where("country_id" , 3)->latest()->get();

        return \view('admin.user.edit', \compact('cities', 'user'));
    }


    public function update(Request $request, $id)
    {
        $user = $this->userService->getById($id);

        if (!$user) {
            $request->session()->flash('failed', 'User Not Found');
            return redirect()->back();
        }

        $request->validate([
            'name' => ['required', 'string', 'min:2'],
            'email' => ['required', 'email',  Rule::unique('users')->ignore($user->id),],
            'phone' => ['required', 'string', Rule::unique('users')->ignore($user->id)],
            'password' => ['some_times'],
            'password_confirmation' => ['some_times' ,'same:password'],
            'gender' => ['required', 'string', Rule::in(['male', 'female'])],
            'image' => ['nullable', 'image', 'max:10240'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'city_id' => ['required', 'exists:cities,id'],
        ]);

        $isUpdated = $this->userService->update($request, $user);

        if ($isUpdated) {
            $request->session()->flash('success', 'User Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->route('admin.users.index');
    }

    public function destroy(Request $request, $id)
    {
        $user = $this->userService->getById($id);


        if (!$user) {
            $request->session()->flash('failed', 'User Not Found');
            return redirect()->back();
        }
        $user->delete();
        $request->session()->flash('success', 'User Deleted SuccessFully');


        return redirect()->back();
    }


    public function restore(Request $request, $id)
    {
        $user = $this->userService->getById($id);


        if (!$user) {
            $request->session()->flash('failed', 'User Not Found');
            return redirect()->back();
        }
        $user->restore();
        $request->session()->flash('success', 'User Restored SuccessFully');

        return redirect()->back();
    }



    public function search(Request $request)
    {

        $request->validate([
            'search' => ['required', 'string'],

        ]);

        $users = $this->userService->adminSearchForUser($request->search);



        return response()->json($users->toArray());
    }

    public function show($id)
    {
        $user = User::find($id) ;

        $order_pending = 0 ;
        $order_in_progress = 0 ;
        $order_delivered = 0 ;
        $order_cancelled = 0 ;

        if(  $user->orders->count() > 0 ){
            foreach ($user->orders as $order) {
                if( $order->status == "pending" ){
                    $order_pending++ ;
                }elseif( $order->status == "inProgress" ){
                    $order_in_progress++ ;
                }elseif( $order->status == "delivered"){
                    $order_delivered++ ;
                }elseif( $order->status == "cancelled" ){
                    $order_cancelled++ ;
                }
            }
        }

        $new_booking = 0 ;
        $success_booking = 0 ;
        $cancelled_booking = 0 ;

        if( $user->booking->count() > 0 ){
            foreach ($user->booking as $booking) {
                if( $booking->status == "pending" ){
                    $new_booking++;
                }elseif( $booking->status == "success" ){
                    $success_booking++;
                }elseif( $booking->status == "cancelled" ){
                    $cancelled_booking++;
                }
            }
        }

        return view('admin.user.show' , compact(
            'user' ,
            'order_pending' ,
            'order_in_progress' ,
            'order_delivered' ,
            'order_cancelled' ,
            'new_booking' ,
            'success_booking' ,
            'cancelled_booking'
            )) ;
    }
}
