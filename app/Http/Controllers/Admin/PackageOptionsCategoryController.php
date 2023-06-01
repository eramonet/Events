<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PackageOptionCategory;
use App\Exports\PackageOptionsCategoryExport;
use App\Models\Admin;
use App\Models\Hall;
use App\Models\Vendor;
use App\Services\PackageOptionsCategoryService;
use Illuminate\Support\Facades\Auth;
use PhpOption\Option;

class PackageOptionsCategoryController extends Controller
{
    protected $packagesOptionsCategoryService;
    public function __construct(PackageOptionsCategoryService $packagesOptionsCategoryService)
    {
        $this->packagesOptionsCategoryService = $packagesOptionsCategoryService;
        $this->middleware(['permission:packages-options-categories-read'])->only(['index', 'export']);
        $this->middleware(['permission:packages-options-categories-create'])->only(['create', 'store']);
        $this->middleware(['permission:packages-options-categories-update'])->only(['update', 'edit']);
        $this->middleware(['permission:packages-options-categories-delete'])->only(['destroy']);
    }



    public function index(Request $request)
    {
        $categories = $this->packagesOptionsCategoryService->getAll($request);

        // return $categories;
        return \view('admin.packageOptionCategory.index', \compact('categories',));
    }

    public function create(Request $request)
    {
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        $halls = [];
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $halls = Hall::latest()->get();
            if (count($halls) > 0) {
                foreach ($halls as $hall) {
                    if ($hall->admin) {
                        $hall["created_by"] = "Events";
                    } else {
                        $vendor = Vendor::where("id", $hall->admin_id)->first()->title_en;
                        $hall["created_by"] = $vendor;
                    }
                }
            }
        } else {
        }


        return \view('admin.packageOptionCategory.create', compact('halls'));
    }


    public function export(Request $request)
    {
        ob_end_clean();
        ob_start();

        return Excel::download(new PackageOptionsCategoryExport(),  Carbon::now() . '-package_option_categories.xlsx');
    }



    public function store(Request $request)

    {

        // return $request->all();

        $request->validate([
            'hall_id' => ['required'],
            'title_ar' => ['required', 'string', 'min:2', 'unique:package_option_categories'],
            'title_en' => ['required', 'string', 'min:2', 'unique:package_option_categories'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'image' => ['nullable', 'image', 'max:10240'],

        ]);



        $created = $this->packagesOptionsCategoryService->store($request);

        if ($created) {
            $request->session()->flash('success', 'Category Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->route('admin.packages-options-categories.index');
    }


    public function edit(Request $request, $id)
    {

        $category = $this->packagesOptionsCategoryService->getById($id);
        if (!$category) {
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();
        }

        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        $halls = [];
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $halls = Hall::latest()->get();
            if (count($halls) > 0) {
                foreach ($halls as $hall) {
                    if ($hall->admin) {
                        $hall["created_by"] = "Events";
                    } else {
                        $vendor = Vendor::where("id", $hall->admin_id)->first()->title_en;
                        $hall["created_by"] = $vendor;
                    }
                }
            }
        } else {
        }



        return \view('admin.packageOptionCategory.edit', \compact('category', 'halls'));
    }


    public function update(Request $request, $id)
    {
        $category = $this->packagesOptionsCategoryService->getById($id);
        if (!$category) {
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();
        }

        $request->validate([
            'hall_id' => ['required'],
            'title_ar' => ['required', 'string', 'min:2',  Rule::unique('package_option_categories', 'title_ar')->ignore($category->id)],
            'title_en' => ['required', 'string', 'min:2', Rule::unique('package_option_categories', 'title_en')->ignore($category->id)],
            'image' => ['nullable', 'image', 'max:10240'],
        ]);

        $updated = $this->packagesOptionsCategoryService->update($request, $category);

        if ($updated) {
            $request->session()->flash('success', 'Category Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->route('admin.packages-options-categories.index');
    }

    public function destroy(Request $request, $id)
    {
        $category = $this->packagesOptionsCategoryService->getById($id);
        if (!$category) {
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();
        }
        $category->delete();
        $request->session()->flash('success', 'Category Deleted SuccessFully');


        return redirect()->back();
    }


    public function restore(Request $request, $id)
    {
        $category = $this->packagesOptionsCategoryService->getById($id);
        if (!$category) {
            $request->session()->flash('failed', 'Category Not Found');
            return redirect()->back();
        }
        $category->restore();
        $request->session()->flash('success', 'Category Restored SuccessFully');

        return redirect()->back();
    }

    public function show($id)
    {
        $category = PackageOptionCategory::find($id) ;

        return view('admin.packageOptionCategory.show' , compact('category'));
    }
}
