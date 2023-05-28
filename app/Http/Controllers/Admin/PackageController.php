<?php

namespace App\Http\Controllers\Admin;

use App\Services\TaxService;
use Illuminate\Http\Request;
use App\Services\VendorService;
use Illuminate\Validation\Rule;
use App\Services\PackageService;
use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Services\HallCategoryService;
use App\Services\PackageOptionsCategoryService;

class PackageController extends Controller
{
    protected $packageService;
     protected $hallCategoryService;
    protected $vendorService;

    protected $texService;


    protected $packagesOptionsCategoryService;

    public function __construct(PackageService $packageService,HallCategoryService $hallCategoryService,VendorService $vendorService,TaxService $texService, PackageOptionsCategoryService $packagesOptionsCategoryService){
          $this->packageService = $packageService;
          $this->hallCategoryService = $hallCategoryService;
          $this->vendorService = $vendorService;
          $this->texService = $texService;
          $this->packagesOptionsCategoryService = $packagesOptionsCategoryService;



          $this->middleware(['permission:packages-read'])->only(['index','export']);
          $this->middleware(['permission:packages-create'])->only(['create', 'store']);
          $this->middleware(['permission:packages-update'])->only(['update', 'edit']);
          $this->middleware(['permission:packages-delete'])->only(['destroy']);
    }



    public function index( Request $request){


        $packages =$this->packageService->getAll($request);
        // return $packages;
        return \view('admin.package.index' ,\compact('packages'));
    }

    public function create( Request $request){

        $vendors = $this->vendorService->getActiveVendors()->load(['halls']);
        $firstVendorHalls = Hall::latest()->get();
        $categories = $this->hallCategoryService->getActiveCategories();
        $taxes = $this->texService->getActiveTaxes();


        $optionsCategories = $this->packagesOptionsCategoryService->getActiveCategoriesWithOptions();


        // return $optionsCategories;

        return \view('admin.package.create', \compact('vendors','firstVendorHalls','categories', 'taxes','optionsCategories') );
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new VendorExport,  Carbon::now() .'-packages.xlsx');

    }



    public function store(Request $request)

    {




        // return $request->all();

        $request->validate([
            'title_ar'=>['required','string','min:2' , 'unique:packages'],
            'title_en'=>['required','string','min:2','unique:packages'],
            'summary_ar'=>['required','string','min:2'],
            'summary_en'=>['required','string','min:2'],
            'meal_description_ar'=>['required','string','min:2'],
            'meal_description_en'=>['required','string','min:2'],
            'lighting_description_ar'=>['required','string','min:2'],
            'lighting_description_en'=>['required','string','min:2'],
            'sound_description_ar'=>['required','string','min:2'],
            'sound_description_en'=>['required','string','min:2'],
            'plan_of_the_day_description_ar'=>['required','string','min:2'],
            'plan_of_the_day_description_en'=>['required','string','min:2'],
            'flowers_description_ar'=>['required','string','min:2'],
            'flowers_description_en'=>['required','string','min:2'],
            'decoration_description_ar'=>['required','string','min:2'],
            'decoration_description_en'=>['required','string','min:2'],
            'description_ar'=>['required','string','min:2'],
            'description_en'=>['required','string','min:2'],
            'keywords_ar'=>['required','string','min:2'],
            'keywords_en'=>['required','string','min:2'],
            'status'=>['required','string', Rule::in([1,0])],
            'extra_guest_price'=>['required','numeric', ],
            'number_of_tables'=>['required','numeric', ],
            'number_of_guests'=>['required','numeric', ],
            'fake_price'=>['required','numeric', ],
            'real_price'=>['required','numeric', ],
            'image'=>['required','image','max:10240'],
            'vendor_id'=>['required','exists:vendors,id'],
            'hall_id'=>['required','exists:halls,id'],
            'category_id'=>['required','exists:hall_categories,id'],
            'taxes.*'=>['nullable','exists:taxes,id'],
            'options'=>['nullable','array'],




         ]);



        $created = $this->packageService->store($request);

        if($created){
            $request->session()->flash('success', 'Package Added SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');

        }

        return redirect()->back();

    }


    public function edit(Request $request,$id)
    {

      $package = $this->packageService->getById($id);
        if(!$package ){
            $request->session()->flash('failed', 'Package Not Found');
            return redirect()->back();


        }


        return \view('admin.package.edit' ,\compact( 'package'));


    }


    public function update(Request $request, $id)
    {
        $package = $this->packageService->getById($id);
        if(!$package ){
            $request->session()->flash('failed', 'Package Not Found');
            return redirect()->back();


        }

        $request->validate([

            'title_ar'=>['required','string','min:2' ,  Rule::unique('packages' ,'title_ar')->ignore($package->id)],
            'title_en'=>['required','string','min:2', Rule::unique('packages' ,'title_en')->ignore($package->id)],
            'summary_ar'=>['required','string','min:2'],
            'summary_en'=>['required','string','min:2'],
            'meal_description_ar'=>['required','string','min:2'],
            'meal_description_en'=>['required','string','min:2'],
            'lighting_description_ar'=>['required','string','min:2'],
            'lighting_description_en'=>['required','string','min:2'],
            'sound_description_ar'=>['required','string','min:2'],
            'sound_description_en'=>['required','string','min:2'],
            'plan_of_the_day_description_ar'=>['required','string','min:2'],
            'plan_of_the_day_description_en'=>['required','string','min:2'],
            'flowers_description_ar'=>['required','string','min:2'],
            'flowers_description_en'=>['required','string','min:2'],
            'decoration_description_ar'=>['required','string','min:2'],
            'decoration_description_en'=>['required','string','min:2'],
            'description_ar'=>['required','string','min:2'],
            'description_en'=>['required','string','min:2'],
            'keywords_ar'=>['required','string','min:2'],
            'keywords_en'=>['required','string','min:2'],
            'status'=>['required','string', Rule::in([1,0])],
            'extra_guest_price'=>['required','numeric', ],
            'number_of_tables'=>['required','numeric', ],
            'number_of_guests'=>['required','numeric', ],
            'fake_price'=>['required','numeric', ],
            'real_price'=>['required','numeric', ],
            'image'=>['nullable','image','max:10240'],
            'vendor_id'=>['required','exists:vendors,id'],
            'hall_id'=>['required','exists:halls,id'],
            'category_id'=>['required','exists:hall_categories,id'],
            'taxes.*'=>['nullable','exists:taxes,id'],
            'options'=>['nullable','array'],


        ]);

        $updated = $this->packageService->update($request , $package);

        if($updated){
            $request->session()->flash('success', 'Package Updated SuccessFully');

        }else{
            $request->session()->flash('failed', 'Something Wrong');
        }


         return redirect()->back();


    }

    public function destroy(Request $request,$id)
    {
        $package = $this->packageService->getById($id);
        if(!$package ){
            $request->session()->flash('failed', 'Package Not Found');
            return redirect()->back();


        }
        $package->delete();
        $request->session()->flash('success', 'Package Deleted SuccessFully');


        return redirect()->back();



    }


    public function restore(Request $request,$id)
    {
        $package = $this->packageService->getById($id);
        if(!$package ){
            $request->session()->flash('failed', 'Package Not Found');
            return redirect()->back();
        }
        $package->restore();
        $request->session()->flash('success', 'Package Restored SuccessFully');

        return redirect()->back();



    }
}
