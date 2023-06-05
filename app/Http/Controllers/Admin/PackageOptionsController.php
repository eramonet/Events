<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PackageOptionsExport;
use App\Models\PackageOption;
use App\Services\PackageOptionsService;
use App\Services\PackageOptionsCategoryService;

class PackageOptionsController extends Controller
{


    protected $packagesOptionsService;
    protected $packagesOptionsCategoryService;

    public function __construct(PackageOptionsService $packagesOptionsService, PackageOptionsCategoryService $packagesOptionsCategoryService)
    {
        $this->packagesOptionsService = $packagesOptionsService;
        $this->packagesOptionsCategoryService = $packagesOptionsCategoryService;

        $this->middleware(['permission:packages-options-read'])->only(['index', 'export']);
        $this->middleware(['permission:packages-options-create'])->only(['create', 'store']);
        $this->middleware(['permission:packages-options-update'])->only(['update', 'edit']);
        $this->middleware(['permission:packages-options-delete'])->only(['destroy']);
    }



    public function index(Request $request)
    {


        $options = $this->packagesOptionsService->getAll($request);

        return \view('admin.packageOption.index', \compact('options',));
    }

    public function create(Request $request)
    {
        $categories = $this->packagesOptionsCategoryService->getActiveCategories();



        return \view('admin.packageOption.create', \compact('categories'));
    }


    public function export(Request $request)
    {
        ob_end_clean();
        ob_start();

        return Excel::download(new PackageOptionsExport(),  Carbon::now() . '-package_options.xlsx');
    }



    public function store(Request $request)

    {

        $request->validate([

            'title_ar' => ['required', 'string', 'min:2', 'unique:package_options'],
            'title_en' => ['required', 'string', 'min:2', 'unique:package_options'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'category_id' => ['required', 'exists:package_option_categories,id'],
            'price' => ['required'],
            'image' => ['nullable', 'image', 'max:10240'],

        ]);



        $created = $this->packagesOptionsService->store($request);

        if ($created) {
            $request->session()->flash('success', 'Packages Option Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->route('admin.packages-options.index');
    }


    public function edit(Request $request, $id)
    {

        $option = $this->packagesOptionsService->getById($id);
        if (!$option) {
            $request->session()->flash('failed', 'Packages Option Not Found');
            return redirect()->back();
        }

        $categories = $this->packagesOptionsCategoryService->getActiveCategories();


        return \view('admin.packageOption.edit', \compact('option', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $option = $this->packagesOptionsService->getById($id);
        if (!$option) {
            $request->session()->flash('failed', 'Packages Option Not Found');
            return redirect()->back();
        }

        $request->validate([

            'title_ar' => ['required', 'string', 'min:2',  Rule::unique('package_options', 'title_ar')->ignore($option->id)],
            'title_en' => ['required', 'string', 'min:2', Rule::unique('package_options', 'title_en')->ignore($option->id)],
            'image' => ['nullable', 'image', 'max:10240'],
            'category_id' => ['required', 'exists:package_option_categories,id'],

        ]);

        $updated = $this->packagesOptionsService->update($request, $option);

        if ($updated) {
            $request->session()->flash('success', 'Packages Option Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->route('admin.packages-options.index');
    }

    public function destroy(Request $request, $id)
    {
        $option = $this->packagesOptionsService->getById($id);
        if (!$option) {
            $request->session()->flash('failed', 'Packages Option Not Found');
            return redirect()->back();
        }
        $option->delete();
        $request->session()->flash('success', 'Packages Option Deleted SuccessFully');


        return redirect()->back();
    }


    public function restore(Request $request, $id)
    {
        $option = $this->packagesOptionsService->getById($id);
        if (!$option) {
            $request->session()->flash('failed', 'Packages Option Not Found');
            return redirect()->back();
        }
        $option->restore();
        $request->session()->flash('success', 'Packages Option Restored SuccessFully');

        return redirect()->back();
    }

    public function show($id)
    {
        $package_option =  PackageOption::find($id) ;

        return view('admin.packageOption.show' , compact('package_option'));
    }
}
