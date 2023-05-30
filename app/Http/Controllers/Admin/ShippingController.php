<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Services\CityService;
use App\Exports\ShippingExport;
use Illuminate\Validation\Rule;
use App\Services\ShippingService;
use App\Http\Controllers\Controller;
use App\Models\Shipping;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ShippingController extends Controller
{
    protected $shippingService;
    protected $cityService;

    public function __construct(ShippingService $shippingService, CityService $cityService)
    {
        $this->shippingService = $shippingService;
        $this->cityService = $cityService;

        $this->middleware(['permission:shippings-read'])->only(['index', 'export']);
        $this->middleware(['permission:shippings-create'])->only(['create', 'store']);
        $this->middleware(['permission:shippings-update'])->only(['update', 'edit']);
        $this->middleware(['permission:shippings-delete'])->only(['destroy']);
    }



    public function index(Request $request)
    {
        $shippings = [];
        if (Auth::guard('admin')->user()->vendor) { // vendor
            $vendor = Vendor::where("id", Auth::guard('admin')->user()->vendor_id)->first();
            $shippings = Shipping::where("admin_id", $vendor->id)->latest()->paginate(10);
        } else {
            $shippings = $this->shippingService->getAll($request);
        }

        return \view('admin.shipping.index', \compact('shippings'));
    }

    public function create(Request $request)
    {
        $cities = $this->cityService->getActiveCities();

        return \view('admin.shipping.create', \compact('cities'));
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new ShippingExport,  Carbon::now() . '-shippings.xlsx');
    }



    public function store(Request $request)
    {
        $request->validate([
            'text_ar' => ['required', 'string', 'min:2'],
            'text_en' => ['required', 'string', 'min:2'],
            'cost' => ['required', 'numeric', 'min:1'],
            'city_id' => ['required', 'exists:cities,id'],
            'status' => ['required', 'string', Rule::in([1, 0])],
        ]);

        // check if exist
        $vendor = "";

        if (Auth::guard('admin')->user()->vendor) { // vendor
            $vendor = Vendor::where("id", Auth::guard('admin')->user()->vendor_id)->first()->id;
        } else {
            $vendor = Auth::guard('admin')->id();
        }
        $exist = Shipping::where([
            ["city_id", $request->city_id],
            ["admin_id", $vendor]
        ])->first();

        if ($exist) {
            $request->session()->flash('failed', 'Assigned Before');
            return redirect()->route('admin.shippings.index');
        }

        $created = $this->shippingService->store($request);

        if ($created) {
            $request->session()->flash('success', 'Shipping Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->route('admin.shippings.index');
    }


    public function edit(Request $request, $id)
    {

        $shipping = $this->shippingService->getById($id);
        if (!$shipping) {
            $request->session()->flash('failed', 'Shipping Not Found');
            return redirect()->back();
        }

        $cities = $this->cityService->getActiveCities();

        return \view('admin.shipping.edit', \compact('shipping', 'cities'));
    }


    public function update(Request $request, $id)
    {
        $shipping = $this->shippingService->getById($id);
        if (!$shipping) {
            $request->session()->flash('failed', 'Shipping Not Found');
            return redirect()->back();
        }
        $request->validate([
            'text_ar' => ['required', 'string', 'min:2',],
            'text_en' => ['required', 'string', 'min:2',],
            'cost' => ['required', 'numeric', 'min:1'],
            'city_id' => ['required', 'exists:cities,id'],
            'status' => ['required', 'string', Rule::in([1, 0])],
        ]);

        $vendor = "";

        if (Auth::guard('admin')->user()->vendor) { // vendor
            $vendor = Vendor::where("id", Auth::guard('admin')->user()->vendor_id)->first()->id;
        } else {
            $vendor = Auth::guard('admin')->id();
        }

        $updated = $this->shippingService->update($request, $shipping);

        if ($updated) {
            $request->session()->flash('success', 'Shipping Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->route('admin.shippings.index');
    }

    public function destroy(Request $request, $id)
    {
        $shipping = $this->shippingService->getById($id);
        if (!$shipping) {
            $request->session()->flash('failed', 'Shipping Not Found');
            return redirect()->back();
        }
        $shipping->delete();
        $request->session()->flash('success', 'Shipping Deleted SuccessFully');


        return redirect()->back();
    }


    public function restore(Request $request, $id)
    {
        $shipping = $this->shippingService->getById($id);
        if (!$shipping) {
            $request->session()->flash('failed', 'Shipping Not Found');
            return redirect()->back();
        }
        $shipping->restore();
        $request->session()->flash('success', 'Shipping Restored SuccessFully');

        return redirect()->back();
    }

    public function show($id)
    {
        $shipping = Shipping::find($id);
        return view('admin.shipping.show', compact('shipping'));
    }
}
