<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Helper\AdminPermission;
use Illuminate\Validation\Rule;
use App\Exports\SystemAdminExport;
use App\Http\Controllers\Controller;
use App\Services\SystemAdminService;
use Maatwebsite\Excel\Facades\Excel;
use Intervention\Image\Facades\Image;
use App\Services\AdminCategoryService;

class SystemAdminController extends Controller
{


  protected $adminService;
  protected $adminCategoryServices;

  public function __construct(SystemAdminService $adminService , AdminCategoryService $adminCategoryServices){

        $this->adminService = $adminService;
        $this->adminCategoryServices = $adminCategoryServices;

        $this->middleware(['permission:system-admins-read'])->only(['index','export']);
        $this->middleware(['permission:system-admins-create'])->only(['create', 'store']);
        $this->middleware(['permission:system-admins-update'])->only(['update', 'edit']);
        $this->middleware(['permission:system-admins-delete'])->only(['destroy']);
  }

    public function index( Request $request){


        $admins =$this->adminService->getAdmins($request);


        return \view('admin.systemAdmin.index' ,\compact('admins'));
    }

    public function create( Request $request){


        $permissions = AdminPermission::all();
        $categories = $this->adminCategoryServices->getActiveCategories();


        // return $permissions;
        return \view('admin.systemAdmin.create' ,\compact('permissions' ,'categories'));
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new SystemAdminExport,  Carbon::now() .'-system-Admins.xlsx');

    }



    public function store(Request $request)

    {

        $this->validate($request ,[
            'name'=>['required','string','min:2'],
            'email'=>['required','email','unique:admins'],
            'password'=>['required','string', 'min:6'],
            'password_confirmation'=>['required','string','same:password'],
            'permissions'=>['required'],
            'gender'=>['required','string', Rule::in(['male','female'])],
            'phone'=>['required','string','unique:admins'],
            'image'=>['nullable','image','max:10240'],
            'status'=>['required','string', Rule::in([1,0])],
            'category_id'=>['required','exists:admin_categories,id'],


        ]
        );


        $adminCreated = $this->adminService->store($request);

        if($adminCreated){
            $request->session()->flash('success', 'Admin Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

      $admin = $this->adminService->getAdminById($id);
        if(!$admin ){
            $request->session()->flash('failed', 'Admin Not Found');
            return redirect()->back();


        }

        $permissions = AdminPermission::all();
        $categories = $this->adminCategoryServices->getActiveCategories();


        return \view('admin.systemAdmin.edit' ,\compact('permissions', 'admin' ,'categories'));


    }


    public function update(Request $request, $id)
    {
        $admin = $this->adminService->getAdminById($id);


        if(!$admin ){
            $request->session()->flash('failed', 'Admin Not Found');
            return redirect()->back();


        }
        $this->validate($request ,[
            'name'=>['required','string','min:2'],
            'email'=>['required','email',  Rule::unique('admins')->ignore($admin->id),],
            'password'=>['nullable','string', 'min:6','confirmed'],
            'password_confirmation'=>['nullable','string','same:password'],
            'permissions'=>['required'],
            'gender'=>['required','string', Rule::in(['male','female'])],
            'phone'=>['required','string' , Rule::unique('admins')->ignore($admin->id)],
            'image'=>['nullable','image','max:10240'],
            'category_id'=>['required','exists:admin_categories,id'],
            'status'=>['required','string', Rule::in([1,0])],

        ]
        );



        $adminUpdated = $this->adminService->update($request , $admin);

        if($adminUpdated){
            $request->session()->flash('success', 'Admin Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $admin = $this->adminService->getAdminById($id);


        if(!$admin ){
            $request->session()->flash('failed', 'Admin Not Found');
            return redirect()->back();


        }
        $admin->delete();
        $request->session()->flash('success', 'Admin Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $admin = $this->adminService->getAdminById($id);


        if(!$admin ){
            $request->session()->flash('failed', 'Admin Not Found');
            return redirect()->back();
        }
        $admin->restore();
        $request->session()->flash('success', 'Admin Restored SuccessFully');

        return redirect()->back();

    }
}
