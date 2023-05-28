<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\HallsCategoryExport;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\HallCategoryService;
use Illuminate\Support\Facades\Auth;

class HallsCategoryController extends Controller
{
    protected $hallCategoryService;
    public function __construct(HallCategoryService $hallCategoryService){
          $this->hallCategoryService = $hallCategoryService;
        //   $this->middleware(['permission:halls-categories-read'])->only(['index','export']);
        //   $this->middleware(['permission:halls-categories-create'])->only(['create', 'store']);
        //   $this->middleware(['permission:halls-categories-update'])->only(['update', 'edit']);
        //   $this->middleware(['permission:halls-categories-delete'])->only(['destroy']);
    }



    public function index( Request $request){

        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
        $categories =$this->hallCategoryService->getAll($request);

        // return $categories;
        return \view('admin.hallCategory.index' ,\compact('categories'));
        }else{
            $categories = $this->hallCategoryService->getAllAdmin($request, $useradmin);

            // return $categories;
            return \view('admin.hallCategory.index', \compact('categories'));
        }
    }

    public function create( Request $request){




        return \view('admin.hallCategory.create',);
    }


    public function export(Request $request)
    {
        ob_end_clean();
        ob_start();

        return Excel::download(new HallsCategoryExport(),  Carbon::now() .'-hall_categories.xlsx');

    }



    public function store(Request $request)

    {




        // return $request->all();

        $request->validate([

            'title_ar'=>['required','string','min:2' , 'unique:hall_categories'],
            'title_en'=>['required','string','min:2','unique:hall_categories'],
            'summary_ar'=>['required','string','min:2'],
            'summary_en'=>['required','string','min:2'],
            'description_ar'=>['required','string','min:2'],
            'description_en'=>['required','string','min:2'],
            'keywords_ar'=>['required','string','min:2'],
            'keywords_en'=>['required','string','min:2'],
            'status'=>['required','string', Rule::in([1,0])],
            'image'=>['nullable','image','max:10240'],

         ]);



        $created = $this->hallCategoryService->store($request);

        if($created){
            $request->session()->flash('success', 'Category Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $category = $this->hallCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();


        }



        return \view('admin.hallCategory.edit' ,\compact( 'category',));


    }


    public function update(Request $request, $id)
    {
        $category = $this->hallCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();


        }

        if(!$request->can_add_products ){


            $request->merge(['can_add_products'=>'0']);
        }
        if(!$request->can_add_halls ){


            $request->merge(['can_add_halls'=>'0']);
        }
        $request->validate([

            'title_ar'=>['required','string','min:2' ,  Rule::unique('hall_categories' ,'title_ar')->ignore($category->id)],
            'title_en'=>['required','string','min:2', Rule::unique('hall_categories' ,'title_en')->ignore($category->id)],
            'summary_ar'=>['required','string','min:2'],
            'summary_en'=>['required','string','min:2'],
            'description_ar'=>['required','string','min:2'],
            'description_en'=>['required','string','min:2'],
            'keywords_ar'=>['required','string','min:2'],
            'keywords_en'=>['required','string','min:2'],
            'status'=>['required','string', Rule::in([1,0])],
            'parent_id'=>['nullable','exists:hall_categories,id'],
            'image'=>['nullable','image','max:10240'],
        ]);

        $updated = $this->hallCategoryService->update($request , $category);

        if($updated){
            $request->session()->flash('success', 'Category Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $category = $this->hallCategoryService->getById($id);
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
        $category = $this->hallCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();
        }
        $category->restore();
        $request->session()->flash('success', 'Category Restored SuccessFully');

        return redirect()->back();



    }
}
