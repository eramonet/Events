<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Become_vendor;
use App\Services\VendorService;
use App\Models\City;
use App\Models\Region;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BecomeVendorController extends Controller
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

    public function index($status)
    {
        $become_vendor = Become_vendor::where('status', $status)->paginate(10);
        return view('admin.become_vendor.index', [
            'becomes' => $become_vendor,
            'status' => $status
        ]);
    }

    public function edit($id)
    {
        $vendor = Become_vendor::where('id', $id)->first();
        $citys = City::latest()->get() ;

        $regions = Region::latest()->get() ;

        return view('admin.become_vendor.edit' , compact('vendor' , 'citys' , 'regions')) ;
    }

    public function update_accept(Request $request , $id)
    {
        $vendor = Become_vendor::where('id', $id)->first();



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

        $vendor->update([
            'status' => 'accepted',
        ]);

        if ($created) {
            $request->session()->flash('success', 'Vendor Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect('acp/become/pending');
    }

    public function update_Reject($id)
    {
        $become = Become_vendor::where('id', $id)->first();
        $become->update([
            'status' => 'canceled',
        ]);
        session()->flash('success', 'vendor Reject SuccessFully');
        return redirect('acp/become/pending');
    }


    public function show(Request $request, $id)
    {

        $become = Become_vendor::where('id', $id)->first();

        if (!$become) {
            $request->session()->flash('failed', 'Become Vendor Request Not Found');
            return redirect()->back();
        }


        return \view('admin.become_vendor.show', \compact('become'));
    }
}
