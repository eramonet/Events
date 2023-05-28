<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\DynamicPageExport;
use App\Http\Controllers\Controller;
use App\Services\DynamicPageService;
use Maatwebsite\Excel\Facades\Excel;

class DynamicPageController extends Controller
{
    protected $pagesService;
    public function __construct(DynamicPageService $pagesService){
          $this->pagesService = $pagesService;
          $this->middleware(['permission:pages-read'])->only(['index','export']);
          $this->middleware(['permission:pages-create'])->only(['create', 'store']);
          $this->middleware(['permission:pages-update'])->only(['update', 'edit']);
          $this->middleware(['permission:pages-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $pages =$this->pagesService->getAll($request);
        // return $pages;
        return \view('admin.dynamicPage.index' ,\compact('pages' ));
    }

    public function create( Request $request){



        return \view('admin.dynamicPage.create' );
    }


    public function export(Request $request)
    {
        ob_end_clean();
        ob_start();

        $type = $request->type && $request->type == 'sub' ? 'sub' : 'main';
        return Excel::download(new DynamicPageExport(),  Carbon::now() .'-pages.xlsx');

    }



    public function store(Request $request)

    {




        // return $request->all();

        $request->validate([

            'title_ar'=>['required','string','min:2' , 'unique:dynamic_pages'],
            'title_en'=>['required','string','min:2','unique:dynamic_pages'],
            'content_ar'=>['required','string','min:2'],
            'content_en'=>['required','string','min:2'],
            'description_ar'=>['required','string','min:2'],
            'description_en'=>['required','string','min:2'],
            'keywords_ar'=>['required','string','min:2'],
            'keywords_en'=>['required','string','min:2'],
            'status'=>['required','string', Rule::in([1,0])],
            'youtube_video_link' => ['nullable', 'url', 'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i'],
            'image'=>['nullable','image','max:10240'],

         ]);



        $created = $this->pagesService->store($request);

        if($created){
            $request->session()->flash('success', 'Page Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $page = $this->pagesService->getById($id);
        if(!$page ){
            $request->session()->flash('failed', 'Page Not Found');
            return redirect()->back();


        }


        return \view('admin.dynamicPage.edit' ,\compact( 'page'));


    }


    public function update(Request $request, $id)
    {
        $page = $this->pagesService->getById($id);
        if(!$page ){
            $request->session()->flash('failed', 'Page Not Found');
            return redirect()->back();


        }


        $request->validate([

            'title_ar'=>['required','string','min:2' ,  Rule::unique('dynamic_pages' ,'title_ar')->ignore($page->id)],
            'title_en'=>['required','string','min:2', Rule::unique('dynamic_pages' ,'title_en')->ignore($page->id)],
            'content_ar'=>['required','string','min:2'],
            'content_en'=>['required','string','min:2'],
            'description_ar'=>['required','string','min:2'],
            'description_en'=>['required','string','min:2'],
            'keywords_ar'=>['required','string','min:2'],
            'keywords_en'=>['required','string','min:2'],
            'status'=>['required','string', Rule::in([1,0])],
            'youtube_video_link' => ['nullable', 'url', 'regex:/^(?:https?:\/\/)?(?:m\.|www\.)?(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))((\w|-){11})(?:\S+)?$/i'],
            'image'=>['nullable','image','max:10240'],
        ]);

        $updated = $this->pagesService->update($request , $page);

        if($updated){
            $request->session()->flash('success', 'Page Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $page = $this->pagesService->getById($id);
        if(!$page ){
            $request->session()->flash('failed', 'Page Not Found');
            return redirect()->back();


        }
        $page->delete();
        $request->session()->flash('success', 'Page Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $page = $this->pagesService->getById($id);
        if(!$page ){
            $request->session()->flash('failed', 'Page Not Found');
            return redirect()->back();
        }
        $page->restore();
        $request->session()->flash('success', 'Page Restored SuccessFully');

        return redirect()->back();



    }
}
