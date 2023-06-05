<?php

namespace App\Http\Controllers\Admin;

use App\Services\FAQService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Services\FAQCategoryService;

class FAQController extends Controller
{
    protected $faqCategoryService;
    protected $faqService;

    public function __construct(FAQCategoryService $faqCategoryService, FAQService $faqService)
    {
        $this->faqCategoryService = $faqCategoryService;
        $this->faqService = $faqService;

        $this->middleware(['permission:faqs-read'])->only(['index', 'export']);
        $this->middleware(['permission:faqs-create'])->only(['create', 'store']);
        $this->middleware(['permission:faqs-update'])->only(['update', 'edit']);
        $this->middleware(['permission:faqs-delete'])->only(['destroy']);
    }



    public function index(Request $request)
    {


        $faqs = $this->faqService->getAll($request);



        // return $faqs;
        return \view('admin.faq.index', \compact('faqs'));
    }

    public function create(Request $request)
    {



        $categories = $this->faqCategoryService->getActiveCategories();



        return \view('admin.faq.create', \compact('categories'));
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new FAQExport, Carbon::now() . '-faqs.xlsx');

    }



    public function store(Request $request)
    {


        $request->validate([
            'question_ar' => ['required', 'string', 'min:2','unique:f_a_q_s'],
            'question_en' => ['required', 'string', 'min:2', 'unique:f_a_q_s'],
            'answer_ar' => ['required', 'string', 'min:2'],
            'answer_en' => ['required', 'string', 'min:2'],
            'category_id' => ['required', 'exists:f_a_q_categories,id'],
            'status' => ['required', 'string', Rule::in([1, 0])],
        ]);



        $created = $this->faqService->store($request);

        if ($created) {
            $request->session()->flash('success', 'FAQ Added SuccessFully');

        } else {
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request, $id)
    {

        $faq = $this->faqService->getById($id);
        if (!$faq) {
            $request->session()->flash('failed', 'FAQ Not Found');
            return redirect()->back();


        }
        $categories = $this->faqCategoryService->getActiveCategories();


        return \view('admin.faq.edit', \compact('faq', 'categories'));


    }


    public function update(Request $request, $id)
    {
        $faq = $this->faqService->getById($id);
        if (!$faq) {
            $request->session()->flash('failed', 'FAQ Not Found');
            return redirect()->back();


        }
        $request->validate([
            'question_ar' => ['required', 'string', 'min:2', Rule::unique('f_a_q_s', 'question_ar')->ignore($faq->id)],
            'question_en' => ['required', 'string', 'min:2', Rule::unique('f_a_q_s', 'question_en')->ignore($faq->id)],
            'answer_ar' => ['required', 'string', 'min:2'],
            'answer_en' => ['required', 'string', 'min:2'],
            'category_id' => ['required', 'exists:f_a_q_categories,id'],
            'status' => ['required', 'string', Rule::in([1, 0])],
        ]);

        $updated = $this->faqService->update($request, $faq);

        if ($updated) {
            $request->session()->flash('success', 'FAQ Updated SuccessFully');

        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();


    }

    public function destroy(Request $request, $id)
    {
        $faq = $this->faqService->getById($id);
        if (!$faq) {
            $request->session()->flash('failed', 'FAQ Not Found');
            return redirect()->back();


        }
        $faq->delete();
        $request->session()->flash('success', 'FAQ Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request, $id)
    {
        $faq = $this->faqService->getById($id);
        if (!$faq) {
            $request->session()->flash('failed', 'FAQ Not Found');
            return redirect()->back();


        }
        $faq->restore();
        $request->session()->flash('success', 'FAQ Restored SuccessFully');

        return redirect()->back();



    }
}
