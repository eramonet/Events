<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Helper\AdminPermission;
use App\Services\VendorService;
use Illuminate\Validation\Rule;
use App\Exports\VendorAdminExport;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Vendor;
use App\Services\VendorAdminService;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\AdminCategoryService;
use Illuminate\Support\Facades\Auth;

class VendorAdminController extends Controller
{
    protected $adminService;
    protected $adminCategoryServices;
    protected $vendorService;
    public function __construct(VendorAdminService $adminService, AdminCategoryService $adminCategoryServices, VendorService $vendorService)
    {

        $this->adminService = $adminService;
        $this->adminCategoryServices = $adminCategoryServices;
        $this->vendorService = $vendorService;


        $this->middleware(['permission:vendor-admins-read'])->only(['index', 'export']);
        $this->middleware(['permission:vendor-admins-create'])->only(['create', 'store']);
        $this->middleware(['permission:vendor-admins-update'])->only(['update', 'edit']);
        $this->middleware(['permission:vendor-admins-delete'])->only(['destroy']);
    }


    public function index(Request $request)
    {
        if (Auth::guard('admin')->user()->vendor) {

            $admins = Admin::where('vendor_id',Auth::guard('admin')->user()->vendor->id)->paginate(10);
            // return $admins ;
        } else {
            $admins = $this->adminService->getAdmins($request);
        }

        // return $admins;
        return \view('admin.vendorAdmin.index', \compact('admins'));
        // }else{
        //     $admins = $this->adminService->getAdminsAdmin($request, $useradmin);
        //     return \view('admin.vendorAdmin.index', \compact('admins'));
        // }
    }

    public function create(Request $request)
    {


        $permissions = AdminPermission::vendor();

        $categories = $this->adminCategoryServices->getActiveCategories();

            $vendors = $this->vendorService->getActiveVendors();

        return \view('admin.vendorAdmin.create', \compact('permissions', 'categories', 'vendors'));
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new VendorAdminExport,  Carbon::now() . '-vendor-Admins.xlsx');
    }



    public function store(Request $request)

    {

        $this->validate(
            $request,
            [
                'name' => ['required', 'string', 'min:2'],
                'email' => ['required', 'email', 'unique:admins'],
                'password' => ['required', 'string', 'min:6'],
                'password_confirmation' => ['required', 'string', 'same:password'],
                'permissions' => ['required'],
                'gender' => ['required', 'string', Rule::in(['male', 'female'])],
                'phone' => ['required', 'string', 'unique:admins'],
                'image' => ['nullable', 'image', 'max:10240'],
                'status' => ['required', 'string', Rule::in([1, 0])],
                'category_id' => ['required', 'exists:admin_categories,id'],
                'vendor_id' => ['required', 'exists:vendors,id'],



            ]
        );
        if (Auth::guard('admin')->user()->vendor) {

            if (Auth::guard('admin')->user()->vendor->vendor_admin > Auth::guard('admin')->user()->vendor->admin->count()) {



                $adminCreated = $this->adminService->store($request);
                if ($adminCreated) {
                    $request->session()->flash('success', 'Admin Added SuccessFully');
                } else {
                    $request->session()->flash('failed', 'Something Wrong');
                }
                return redirect()->back();
            } else {
                $request->session()->flash('failed', 'You can not add more admins');
                return redirect()->back();
            }
        } else {

            $adminCreated = $this->adminService->store($request);

            if ($adminCreated) {
                $request->session()->flash('success', 'Admin Added SuccessFully');
            } else {
                $request->session()->flash('failed', 'Something Wrong');
            }
        }
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $admin = $this->adminService->getAdminById($id);
        if (!$admin) {
            $request->session()->flash('failed', 'Admin Not Found');
            return redirect()->back();
        }

        $permissions = AdminPermission::vendor();
        $categories = $this->adminCategoryServices->getActiveCategories();

        $vendors = $this->vendorService->getActiveVendors();

        return \view('admin.vendorAdmin.edit', \compact('permissions', 'admin', 'categories', 'vendors'));
    }


    public function update(Request $request, $id)
    {
        $admin = $this->adminService->getAdminById($id);


        if (!$admin) {
            $request->session()->flash('failed', 'Admin Not Found');
            return redirect()->back();
        }
        $this->validate(
            $request,
            [
                'name' => ['required', 'string', 'min:2'],
                'email' => ['required', 'email',  Rule::unique('admins')->ignore($admin->id),],
                'password' => ['nullable', 'string', 'min:6', 'confirmed'],
                'password_confirmation' => ['nullable', 'string', 'same:password'],
                'permissions' => ['required'],
                'gender' => ['required', 'string', Rule::in(['male', 'female'])],
                'phone' => ['required', 'string', Rule::unique('admins')->ignore($admin->id)],
                'image' => ['nullable', 'image', 'max:10240'],
                'category_id' => ['required', 'exists:admin_categories,id'],
                'vendor_id' => ['required', 'exists:vendors,id'],
                'status' => ['required', 'string', Rule::in([1, 0])],

            ]
        );



        $adminUpdated = $this->adminService->update($request, $admin);

        if ($adminUpdated) {
            $request->session()->flash('success', 'Admin Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $admin = $this->adminService->getAdminById($id);


        if (!$admin) {
            $request->session()->flash('failed', 'Admin Not Found');
            return redirect()->back();
        }
        $admin->delete();
        $request->session()->flash('success', 'Admin Deleted SuccessFully');


        return redirect()->back();
    }


    public function restore(Request $request, $id)
    {
        $admin = $this->adminService->getAdminById($id);


        if (!$admin) {
            $request->session()->flash('failed', 'Admin Not Found');
            return redirect()->back();
        }
        $admin->restore();
        $request->session()->flash('success', 'Admin Restored SuccessFully');

        return redirect()->back();
    }

    public function updateFToken(Request $request)
    {

        $admin = Admin::where('id', Auth::guard('admin')->user()->id)->first();
        if (!$admin) {
            return response()->json(['succuess' => false, 'message' => 'userNotAuth']);
        } else {
            $admin->update(['firebase_token' => $request->token]);
            return response()->json(['succuess' => true, 'message' => 'token updated']);
        }
    }

    public function sendWebNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = Admin::where('id', Auth::guard('admin')->user()->id)->first()->firebase_token;
        //        $FcmToken = ['fd1e5jHS6TkouTgVSpijQd:APA91bGFVAPY8bKbJgQziACRFJOdkLbod6BH0oxG_qGeOQL33tomXnEumJ7Lg1jtsbCciNATaRllXaUwd50eYLJOBsU_djXPpyu0lTL6KdxbaI0QTlBO1uQ5IJc_mT12XRqOEdp1dkla'];

        $serverKey = 'AAAASsRoM9k:APA91bEo9ip7tjptOuguYgntCu2EyAUPx2hLNvJsFDLeWFwew-wd7OLADXCc7Lg1YsWe3UUeN3R_J3WaBceQN7CYwxeGaaleTDsJ0WGfyhoJEZts_Y8WKSonZhAi_pNwus8fFjUW8kG2';

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => 'test',
                "body" => 'test',
            ]
        ];
        $encodedData = json_encode($data);

        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        // Close connection
        curl_close($ch);
        // FCM response
        dd($result);
    }
}
