<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PackageOptionCategory;
use App\Exports\PackageOptionsCategoryExport;
use App\Services\PackageOptionsCategoryService;

class PackageOptionsCategoryController extends Controller
{
    protected $packagesOptionsCategoryService;
    public function __construct(PackageOptionsCategoryService $packagesOptionsCategoryService){
          $this->packagesOptionsCategoryService = $packagesOptionsCategoryService;
          $this->middleware(['permission:packages-options-categories-read'])->only(['index','export']);
          $this->middleware(['permission:packages-options-categories-create'])->only(['create', 'store']);
          $this->middleware(['permission:packages-options-categories-update'])->only(['update', 'edit']);
          $this->middleware(['permission:packages-options-categories-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $categories =$this->packagesOptionsCategoryService->getAll($request);

        // return $categories;
        return \view('admin.packageOptionCategory.index' ,\compact('categories' ,));
    }

    public function create( Request $request){




        return \view('admin.packageOptionCategory.create',);
    }


    public function export(Request $request)
    {
        ob_end_clean();
        ob_start();

        return Excel::download(new PackageOptionsCategoryExport(),  Carbon::now() .'-package_option_categories.xlsx');

    }



    public function store(Request $request)

    {




        // return $request->all();

        $request->validate([

            'title_ar'=>['required','string','min:2' , 'unique:package_option_categories'],
            'title_en'=>['required','string','min:2','unique:package_option_categories'],
            'status'=>['required','string', Rule::in([1,0])],
            'image'=>['nullable','image','max:10240'],

         ]);



        $created = $this->packagesOptionsCategoryService->store($request);

        if($created){
            $request->session()->flash('success', 'Category Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $category = $this->packagesOptionsCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();


        }



        return \view('admin.packageOptionCategory.edit' ,\compact( 'category',));


    }


    public function update(Request $request, $id)
    {
        $category = $this->packagesOptionsCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();


        }

        $request->validate([

            'title_ar'=>['required','string','min:2' ,  Rule::unique('package_option_categories' ,'title_ar')->ignore($category->id)],
            'title_en'=>['required','string','min:2', Rule::unique('package_option_categories' ,'title_en')->ignore($category->id)],
            'image'=>['nullable','image','max:10240'],
        ]);

        $updated = $this->packagesOptionsCategoryService->update($request , $category);

        if($updated){
            $request->session()->flash('success', 'Category Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $category = $this->packagesOptionsCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();


        }
        $category->delete();
        $request->session()->flash('success', 'Category Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $category = $this->packagesOptionsCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();
        }
        $category->restore();
        $request->session()->flash('success', 'Category Restored SuccessFully');

        return redirect()->back();



    }
}
