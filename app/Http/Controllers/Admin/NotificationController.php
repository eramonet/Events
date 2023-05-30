<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Notification;
use App\Models\User;
use App\Models\Vendor;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    protected $notificationService;
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
        // $this->middleware(['permission:notifications-read'])->only(['index', 'export']);
        // $this->middleware(['permission:notifications-create'])->only(['create', 'store']);
        //  $this->middleware(['permission:notifications-delete'])->only(['destroy']);
    }



    public function index(Request $request)
    {
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();



        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {

        $notifications =$this->notificationService->getAll($request);

        return \view('admin.notification.index' ,\compact('notifications'));

        }else{
            $vendor = Vendor::where("id" , $useradmin->vendor_id)->first();

            $notifications = Notification::where("admin_id" , $vendor->id )->orWhere("vendor_id" , $vendor->id )->latest()->paginate(10) ;

            return \view('admin.notification.index', \compact('notifications'));
        }
    }

    public function create(Request $request)
    {

        $users=User::get();
        $vendors =
        Admin::whereHas(
            'roles',
            function ($q) {
                $q->where('name', 'vendor-admin');
            }
        )->get();
        return \view('admin.notification.create',compact('users','vendors'));
    }



    public function store(Request $request)

    {
        $request->validate([
            'title_ar' => ['required', 'string', 'min:2'],
            'title_en' => ['required', 'string', 'min:2'],
            'desc_ar' => ['required', 'string', 'min:2'],
            'desc_en' => ['required', 'string', 'min:2'],
        ]);


        $created = $this->notificationService->store($request);

        if ($created) {
            $request->session()->flash('success', 'Notification Created SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }



    public function destroy(Request $request, $id)
    {
        $notification = $this->notificationService->getById($id);
        if (!$notification) {
            $request->session()->flash('failed', 'Notification Not Found');
            return redirect()->back();
        }
        $notification->delete();
        $request->session()->flash('success', 'Notification Deleted SuccessFully');


        return redirect()->back();
    }


}
