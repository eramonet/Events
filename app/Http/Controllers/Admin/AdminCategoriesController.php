<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\AdminCategoryExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\AdminCategoryService;

class AdminCategoriesController extends Controller
{
    protected $adminCategoryServices;
    public function __construct(AdminCategoryService $adminCategoryServices){
          $this->adminCategoryServices = $adminCategoryServices;
          $this->middleware(['permission:admin-categories-read'])->only(['index','export']);
          $this->middleware(['permission:admin-categories-create'])->only(['create', 'store']);
          $this->middleware(['permission:admin-categories-update'])->only(['update', 'edit']);
          $this->middleware(['permission:admin-categories-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $categories =$this->adminCategoryServices->getAll($request);
        // return $categories;
        return \view('admin.adminCategory.index' ,\compact('categories'));
    }

    public function create( Request $request){


        return \view('admin.adminCategory.create' );
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new AdminCategoryExport,  Carbon::now() .'-categories.xlsx');

    }



    public function store(Request $request)

    {


        $request->validate([
            'title_ar'=>['required','string','min:2' , 'unique:admin_categories'],
            'title_en'=>['required','string','min:2','unique:admin_categories'],
            'details_ar'=>['required','string','min:2'],
            'details_en'=>['required','string','min:2'],
            'status'=>['required','string', Rule::in([1,0])],
         ]);



        $created = $this->adminCategoryServices->store($request);

        if($created){
            $request->session()->flash('success', 'Admin Category Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $adminCategory = $this->adminCategoryServices->getById($id);
        if(!$adminCategory ){
            $request->session()->flash('failed', 'Admin Category Not Found');
            return redirect()->back();


        }


        return \view('admin.adminCategory.edit' ,\compact( 'adminCategory'));


    }


    public function update(Request $request, $id)
    {
        $adminCategory = $this->adminCategoryServices->getById($id);
        if(!$adminCategory ){
            $request->session()->flash('failed', 'Admin Category Not Found');
            return redirect()->back();


        }
        $request->validate([
            'title_ar'=>['required','string','min:2' ,  Rule::unique('admin_categories' ,'title_ar')->ignore($adminCategory->id)],
            'title_en'=>['required','string','min:2', Rule::unique('admin_categories' ,'title_en')->ignore($adminCategory->id)],
            'details_ar'=>['required','string','min:2'],
            'details_en'=>['required','string','min:2'],
            'status'=>['required','string', Rule::in([1,0])],
        ]);

        $updated = $this->adminCategoryServices->update($request , $adminCategory);

        if($updated){
            $request->session()->flash('success', 'Admin Category Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $adminCategory = $this->adminCategoryServices->getById($id);
        if(!$adminCategory ){
            $request->session()->flash('failed', 'Admin Category Not Found');
            return redirect()->back();


        }
        $adminCategory->delete();
        $request->session()->flash('success', 'Admin Category Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $adminCategory = $this->adminCategoryServices->getById($id);
        if(!$adminCategory ){
            $request->session()->flash('failed', 'Admin Category Not Found');
            return redirect()->back();
        }
        $adminCategory->restore();
        $request->session()->flash('success', 'Admin Category Restored SuccessFully');

        return redirect()->back();



    }
}