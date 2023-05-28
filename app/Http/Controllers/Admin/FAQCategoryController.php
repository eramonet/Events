<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\FAQCategoryExport;
use App\Http\Controllers\Controller;
use App\Services\FAQCategoryService;
use Maatwebsite\Excel\Facades\Excel;

class FAQCategoryController extends Controller
{

    protected $faqCategoryService;
    public function __construct(FAQCategoryService $faqCategoryService){
          $this->faqCategoryService = $faqCategoryService;
          $this->middleware(['permission:faq-categories-read'])->only(['index','export']);
          $this->middleware(['permission:faq-categories-create'])->only(['create', 'store']);
          $this->middleware(['permission:faq-categories-update'])->only(['update', 'edit']);
          $this->middleware(['permission:faq-categories-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $categories =$this->faqCategoryService->getAll($request);

        // return $categories;
        return \view('admin.faqCategory.index' ,\compact('categories' ,));
    }

    public function create( Request $request){




        return \view('admin.faqCategory.create',);
    }


    public function export(Request $request)
    {
        ob_end_clean();
        ob_start();

        return Excel::download(new FAQCategoryExport(),  Carbon::now() .'-f_a_q_categories.xlsx');

    }



    public function store(Request $request)

    {




        // return $request->all();

        $request->validate([

            'title_ar'=>['required','string','min:2' , 'unique:f_a_q_categories'],
            'title_en'=>['required','string','min:2','unique:f_a_q_categories'],
            'status'=>['required','string', Rule::in([1,0])],

         ]);



        $created = $this->faqCategoryService->store($request);

        if($created){
            $request->session()->flash('success', 'Category Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $category = $this->faqCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();


        }



        return \view('admin.faqCategory.edit' ,\compact( 'category',));


    }


    public function update(Request $request, $id)
    {
        $category = $this->faqCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();


        }

        $request->validate([
            'title_ar'=>['required','string','min:2' ,  Rule::unique('f_a_q_categories' ,'title_ar')->ignore($category->id)],
            'title_en'=>['required','string','min:2', Rule::unique('f_a_q_categories' ,'title_en')->ignore($category->id)],
            'status'=>['required','string', Rule::in([1,0])],
        ]);

        $updated = $this->faqCategoryService->update($request , $category);

        if($updated){
            $request->session()->flash('success', 'Category Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $category = $this->faqCategoryService->getById($id);
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
        $category = $this->faqCategoryService->getById($id);
        if(!$category ){
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();
        }
        $category->restore();
        $request->session()->flash('success', 'Category Restored SuccessFully');

        return redirect()->back();



    }
}
