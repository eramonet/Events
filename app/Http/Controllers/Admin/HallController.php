<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Exports\HallsExport;
use Illuminate\Http\Request;
use App\Services\CityService;
use App\Services\HallService;
use App\Services\VendorService;
use Illuminate\Validation\Rule;
use App\Services\CountryService;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\CategoryHall;
use App\Models\Hall;
use App\Models\Occasion;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\HallCategoryService;
use Illuminate\Support\Facades\Auth;

class HallController extends Controller
{
    protected $hallService;
    protected $countryService;
    protected $cityService;
    protected $vendorService;
    protected $hallCategoryService;


    public function __construct(HallService $hallService, CountryService $countryService, CityService $cityService, VendorService $vendorService, HallCategoryService $hallCategoryService)
    {
        $this->hallService = $hallService;
        $this->countryService = $countryService;
        $this->cityService = $cityService;
        $this->vendorService = $vendorService;
        $this->hallCategoryService = $hallCategoryService;


        //   $this->middleware(['permission:halls-read'])->only(['index','export']);
        //   $this->middleware(['permission:halls-create'])->only(['create', 'store']);
        //   $this->middleware(['permission:halls-update'])->only(['update', 'edit']);
        //   $this->middleware(['permission:halls-delete'])->only(['destroy']);

    }



    public function index(Request $request)
    {

        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $halls = $this->hallService->getAll($request);

            return \view('admin.hall.index', \compact('halls'));
        } else {
            $halls = $this->hallService->getAllAdmin($request, $useradmin);

            return \view('admin.hall.index', \compact('halls'));
        }
    }

    public function create(Request $request)
    {


        $countries = $this->countryService->getActiveCountries();
        $cities = $this->cityService->getActiveCities();
        $firstCountryCities = $countries->count() > 0 ? $countries->first()->cities : $countries;
        $vendors = $this->vendorService->getActiveVendors();
        $hallCategories = Occasion::latest()->get();



        return \view('admin.hall.create', \compact('countries', 'cities', 'firstCountryCities', 'vendors', 'hallCategories'));
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new HallsExport,  Carbon::now() . '-halls.xlsx');
    }



    public function store(Request $request){

        $request->validate([
            'email' => ['required', 'email', 'unique:halls'],
            'phone' => ['required', 'string', 'unique:halls'],
            'title_ar' => ['required', 'string', 'min:2', 'unique:halls'],
            'title_en' => ['required', 'string', 'min:2', 'unique:halls'],
            'summary_ar' => ['required', 'string', 'min:2'],
            'summary_en' => ['required', 'string', 'min:2'],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],
            'keywords_ar' => ['required', 'string', 'min:2'],
            'keywords_en' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'primary_image' => ['required', 'image', 'max:10240'],
            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'image', 'max:10240'],
            'guests_capacity' => ['required', 'integer'],
            'country_id' => ['required', 'exists:countries,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'latitude' => ['nullable', 'string', 'min:2'],
            'longitude' => ['nullable', 'string', 'min:2'],
            'address_ar' => ['nullable', 'string', 'min:2'],
            'address_en' => ['nullable', 'string', 'min:2'],
            'categories.*' => ['nullable'],

        ]);



        if (Auth::guard('admin')->user()->vendor){

            if (Auth::guard('admin')->user()->vendor->halls_count > Auth::guard('admin')->user()->vendor->halls->count()) {

                return $created = $this->hallService->store($request);

                if ($created) {
                    $request->session()->flash('success', 'Hall Added SuccessFully');
                } else {
                    $request->session()->flash('failed', 'Something Wrong');
                }
                return redirect('acp/halls');

            } else {
                $request->session()->flash('failed', 'You have reached your Halls limit');
                return redirect('acp/halls');
            }
        } else {
            $created = $this->hallService->store($request);

            if ($created) {
                $request->session()->flash('success', 'Hall Added SuccessFully');
            } else {
                $request->session()->flash('failed', 'Something Wrong');
            }

            return redirect('acp/halls');
        }
    }


    public function edit(Request $request, $id)
    {

        $hall = $this->hallService->getById($id);
        if (!$hall) {
            $request->session()->flash('failed', 'Hall Not Found');
            return redirect()->back();
        }

        $countries = $this->countryService->getActiveCountries();
        $cities = $this->cityService->getActiveCities();
        $firstCountryCities = $this->cityService->cityByCountryId($hall->country_id);
        $vendors = $this->vendorService->getActiveVendors();
        $hallCategories = Occasion::latest()->get();


        $hall["categories"] = CategoryHall::where("hall_id" , $hall->id)->latest()->get();


        return \view('admin.hall.edit', \compact('hall', 'countries', 'cities', 'firstCountryCities', 'vendors', 'hallCategories'));
    }

    public function show(Request $request, $id)
    {

        $hall = $this->hallService->getById($id);
        
        if (!$hall) {
            $request->session()->flash('failed', 'Hall Not Found');
            return redirect()->back();
        }


        return \view('admin.hall.show', \compact('hall'));
    }


    public function update(Request $request, $id)
    {
        $hall = $this->hallService->getById($id);
        if (!$hall) {
            $request->session()->flash('failed', 'Hall Not Found');
            return redirect()->back();
        }

        $request->validate([
            'email' => ['required', 'email',  Rule::unique('halls')->ignore($hall->id)],
            'phone' => ['required', 'string', Rule::unique('halls')->ignore($hall->id)],
            'title_ar' => ['required', 'string', 'min:2',  Rule::unique('halls', 'title_ar')->ignore($hall->id)],
            'title_en' => ['required', 'string', 'min:2', Rule::unique('halls', 'title_en')->ignore($hall->id)],
            'summary_ar' => ['required', 'string', 'min:2'],
            'summary_en' => ['required', 'string', 'min:2'],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],
            'keywords_ar' => ['required', 'string', 'min:2'],
            'keywords_en' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'primary_image' => ['nullable', 'image', 'max:10240'],
            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'image', 'max:10240'],
            'guests_capacity' => ['required', 'integer'],
            'country_id' => ['required', 'exists:countries,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'vendor_id' => ['required', 'exists:vendors,id'],
            'latitude' => ['nullable', 'string', 'min:2'],
            'longitude' => ['nullable', 'string', 'min:2'],
            'address_ar' => ['nullable', 'string', 'min:2'],
            'address_en' => ['nullable', 'string', 'min:2'],
            'categories.*' => ['nullable'],

        ]);

         $updated = $this->hallService->update($request, $hall);

        if ($updated) {
            $request->session()->flash('success', 'Hall Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect('acp/halls');
    }

    public function destroy(Request $request, $id)
    {
        $hall = $this->hallService->getById($id);
        if (!$hall) {
            $request->session()->flash('failed', 'Hall Not Found');
            return redirect()->back();
        }
        $hall->delete();
        $request->session()->flash('success', 'Hall Deleted SuccessFully');


        return redirect()->back();
    }


    public function restore(Request $request, $id)
    {
        $hall = $this->hallService->getById($id);
        if (!$hall) {
            $request->session()->flash('failed', 'Hall Not Found');
            return redirect()->back();
        }
        $hall->restore();
        $request->session()->flash('success', 'Hall Restored SuccessFully');

        return redirect()->back();
    }




    public function hallsByVendorId(Request $request)
    {


        if (!$request->input('vendor_id')) {
            return response()->json(['vendor_id is required']);
        }

        $categories = $this->hallService->hallsByVendorId($request->vendor_id);



        return response()->json($categories->toArray());
    }
    public function hall_request($status)
    {

        $halls = Hall::where('accept', $status)->paginate(10);

        return view('admin.hall.hall_request', compact('halls', 'status'));
    }



    public function hall_request_accept(Request $request, $id)
    {
        $halls = Hall::where('id', $id)->update(['accept' => 'accepted']);

        $request->session()->flash('success', 'Hall Request Accepted SuccessFully');

        return redirect('acp/hall_request/new');
    }


    public function hall_request_reject(Request $request, $id)
    {
        $halls = Hall::where('id', $id)->update(['accept' => 'rejected']);

        $request->session()->flash('success', 'Hall Request Rejcted SuccessFully');

        return redirect('acp/hall_request/new');
    }
}
