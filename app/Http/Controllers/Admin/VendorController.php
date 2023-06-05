<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\VendorExport;
use App\Services\VendorService;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Region;
use App\Models\Vendor;
use Maatwebsite\Excel\Facades\Excel;

class VendorController extends Controller
{
    protected $vendorService;
    public function __construct(VendorService $vendorService)
    {
        $this->vendorService = $vendorService;
        $this->middleware(['permission:vendors-read'])->only(['index', 'export']);
        $this->middleware(['permission:vendors-create'])->only(['create', 'store']);
        $this->middleware(['permission:vendors-update'])->only(['update', 'edit']);
        $this->middleware(['permission:vendors-delete'])->only(['destroy']);
    }



    public function index(Request $request)
    {
        $vendors = $this->vendorService->getAll($request);

        foreach( $vendors as $vendor ){
            if( $vendor->account == "company" ){
                $today = Carbon::now() ;
                if( $vendor->Tax_Number_expiration_date < $today ){
                    $vendor->update([
                        "status" => 0
                    ]);
                }
            }
        }

        return \view('admin.vendor.index', \compact('vendors'));

    }
    public function company(){
        $vendors = Vendor::where('account', 'company')->paginate(10);
        return \view('admin.vendor.index', \compact('vendors'));
    }
    public function individual(){
        $vendors = Vendor::where('account', 'individual')->paginate(10);
        return \view('admin.vendor.index', \compact('vendors'));
    }

    public function create(Request $request)
    {
        $cities = City::all();


        return \view('admin.vendor.create', [
            'cities' => $cities,

        ]);
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new VendorExport,  Carbon::now() . '-vendors.xlsx');
    }


    public function store(Request $request)
    {
        if (!$request->can_add_products) {
            $request->merge(['can_add_products' => '0']);
        }
        if (!$request->can_add_halls) {
            $request->merge(['can_add_halls' => '0']);
        }

        $request->validate([
            'email' => ['required', 'email', 'unique:vendors'],
            'phone' => ['required', 'string', 'unique:vendors'],
            'title_ar' => ['required', 'string', 'min:2', 'unique:vendors'],
            'title_en' => ['required', 'string', 'min:2', 'unique:vendors'],
            'summary_ar' => ['required', 'string', 'min:2'],
            'summary_en' => ['required', 'string', 'min:2'],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],
            'keywords_ar' => ['required', 'string', 'min:2'],
            'keywords_en' => ['required', 'string', 'min:2'],
            'can_add_products' => ['required', Rule::in([1, 0])],
            'can_add_halls' => ['required', Rule::in([1, 0])],
            'status' => ['required', 'string', Rule::in([1, 0])],

            'commission' => ['required', 'integer', 'min:0', 'max:100'],

            'image' => ['nullable', 'image', 'max:10240'],
            'Tax_Number_expiration_date' => ['nullable', 'date', 'min:0'],
            'halls_count' => ['required', 'numeric', 'min:0'],
            'vendor_admin' => ['required', 'numeric', 'min:0'],
            'products_count' => ['required', 'numeric', 'min:0'],
            'type' => ['required', 'string', 'min:2', Rule::in(['product', 'hall', 'product_hall'])],
            'account' => ['required', 'string', 'min:2', Rule::in(['individual', 'company'])],
            'Tax_Number' => ['nullable', 'numeric', 'min:0'],
            'halls_count' => ['required', 'numeric', 'min:0'],
            'country_id' => ['nullable', 'exists:countries,id'],
            'city_id' => ['nullable', 'exists:cities,id'],
            'region_id' => ['nullable', 'exists:regions,id'],
            'commercial_registration_number' => ['nullable', 'numeric', 'min:0'],
        ]);

        if( $request->Tax_Number_expiration_date ){
            if( $request->Tax_Number_expiration_date < Carbon::now() ){
                $request->session()->flash('failed', 'Expiration Date is Expired');
                return redirect()->back();
            }
        }

        $created = $this->vendorService->store($request);

        if ($created) {
            $request->session()->flash('success', 'Vendor Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->route('admin.vendors.index');
    }


    public function edit(Request $request, $id)
    {

        $vendor = $this->vendorService->getById($id);
        $regions = Region::all();
        $citys = City::all();

        if (!$vendor) {
            $request->session()->flash('failed', 'Vendor Not Found');
            return redirect()->back();
        }


        return \view('admin.vendor.edit', \compact('vendor', 'regions', 'citys'));
    }


    public function update(Request $request, $id)
    {
        $vendor = $this->vendorService->getById($id);
        if (!$vendor) {
            $request->session()->flash('failed', 'Vendor Not Found');
            return redirect()->back();
        }

        if (!$request->can_add_products) {


            $request->merge(['can_add_products' => '0']);
        }
        if (!$request->can_add_halls) {


            $request->merge(['can_add_halls' => '0']);
        }
        $request->validate([
            'email' => ['required', 'email', Rule::unique('vendors')->ignore($vendor)],
            'phone' => ['required', 'string', Rule::unique('vendors')->ignore($vendor)],
            'title_ar' => ['required', 'string', 'min:2', Rule::unique('vendors')->ignore($vendor)],
            'title_en' => ['required', 'string', 'min:2', Rule::unique('vendors')->ignore($vendor)],
            'summary_ar' => ['required', 'string', 'min:2'],
            'summary_en' => ['required', 'string', 'min:2'],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],
            'keywords_ar' => ['required', 'string', 'min:2'],
            'keywords_en' => ['required', 'string', 'min:2'],
            'can_add_products' => ['required', Rule::in([1, 0])],
            'can_add_halls' => ['required', Rule::in([1, 0])],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'commission' => ['required', 'integer', 'min:0', 'max:100'],
            'image' => ['nullable', 'image', 'max:10240'],
            'vendor_admin' => ['required', 'numeric', 'min:0'],
            'Tax_Number_expiration_date' => ['nullable', 'date', 'min:0'],
            'halls_count' => ['required', 'numeric', 'min:0'],
            'products_count' => ['required', 'numeric', 'min:0'],
            'type' => ['required', 'string', 'min:2', Rule::in(['product', 'hall', 'product_hall'])],
            'account' => ['required', 'string', 'min:2', Rule::in(['individual', 'company'])],
            'Tax_Number' => ['nullable', 'numeric', 'min:0'],
            'halls_count' => ['required', 'numeric', 'min:0'],
            'country_id' => ['nullable', 'exists:countries,id'],
            'city_id' => ['nullable', 'exists:cities,id'],
            'region_id' => ['nullable', 'exists:regions,id'],
            'commercial_registration_number' => ['nullable', 'numeric', 'min:0'],

        ]);

        if( $request->Tax_Number_expiration_date ){
            if( $request->Tax_Number_expiration_date < Carbon::now() ){
                $request->session()->flash('failed', 'Expiration Date is Expired');
                return redirect()->back();
            }
        }


        $updated = $this->vendorService->update($request, $vendor);

        if ($updated) {
            $request->session()->flash('success', 'Vendor Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->route('admin.vendors.index');
    }

    public function destroy(Request $request, $id)
    {
        $vendor = $this->vendorService->getById($id);
        if (!$vendor) {
            $request->session()->flash('failed', 'Vendor Not Found');
            return redirect()->back();
        }
        $vendor->delete();
        $request->session()->flash('success', 'Vendor Deleted SuccessFully');


        return redirect()->back();
    }


    public function restore(Request $request, $id)
    {
        $vendor = $this->vendorService->getById($id);
        if (!$vendor) {
            $request->session()->flash('failed', 'Vendor Not Found');
            return redirect()->back();
        }
        $vendor->restore();
        $request->session()->flash('success', 'Vendor Restored SuccessFully');

        return redirect()->back();
    }

    public function show($id)
    {
        $vendor = Vendor::find($id) ;

        return view('admin.vendor.show' , compact('vendor'));
    }
}
