<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Occasion;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Helper\UploadHelper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Models\Role;
use Illuminate\Validation\Rule;



class OccasionController extends Controller
{


    public function __construct()
    {


        // $this->middleware(['permission:occasions-read'])->only(['index', 'export']);
        // $this->middleware(['permission:occasions-create'])->only(['create', 'store']);
        // $this->middleware(['permission:occasions-update'])->only(['update', 'edit']);
        // $this->middleware(['permission:occasions-delete'])->only(['destroy']);
    }



    public function index()
    {

        $occasions =  Occasion::latest()->paginate(10);
        return $occasions ;
        return \view('admin.occasions.index', [
            'occasions' => $occasions
        ]);
    }

    public function create(Request $request)
    {

        $cities = City::all();
        $regions = Region::all();

        return \view('admin.occasions.create', [
            'cities' => $cities,
            'regions' => $regions,
        ]);
    }


    public function store(Request $request)

    {

        $request->validate([

            'primary_image' => ['required', 'image', 'max:10240'],
            'icon' => ['required', 'image', 'max:10240'],
            'title_ar' => ['required', 'string', 'min:2', 'unique:occasions'],
            'title_en' => ['required', 'string', 'min:2', 'unique:occasions'],
            'city_id' => ['required', 'exists:cities,id'],
            'region_id' => ['required', 'exists:regions,id'],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],
        ]);

        $imageName = UploadHelper::upload('occasions', $request->file('primary_image'), config('imageDimensions.products_categories.width'), config('imageDimensions.products_categories.height'));

        $iconName = UploadHelper::upload('occasions', $request->file('icon'), config('imageDimensions.products_categories.width'), config('imageDimensions.products_categories.height'));

        $data = $request->all();

        $data['primary_image'] = $imageName;
        $data['icon'] = $iconName;
        $created = Occasion::create($data);

        if ($created) {
            $request->session()->flash('success', 'Occasion Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->route('admin.occasion.index');
    }


    public function edit(Request $request, $id)
    {

        $occasion = Occasion::where('id', $id)->first();
        if (!$occasion) {
            $request->session()->flash('failed', 'Occasion Not Found');
            return redirect()->back();
        }
        $cities = City::all();
        $regions = Region::all();

        return \view('admin.occasions.edit', [
            'cities' => $cities,
            'regions' => $regions,
            'occasion' => $occasion,
        ]);
    }


    public function update(Request $request, $id)
    {
        $occasion = Occasion::where('id', $id)->first();

        // return $occasion ;

        $request->validate([
            'primary_image' => ['sometimes', 'image', 'max:10240'],
            'icon' => ['sometimes', 'image', 'max:10240'],
            'title_ar' => ['required', 'string', 'min:2',  Rule::unique('occasions')->ignore($occasion)],
            'title_en' => ['required', 'string', 'min:2',  Rule::unique('occasions')->ignore($occasion)],
            'city_id' => ['required', 'exists:cities,id'],
            'region_id' => ['required', 'exists:regions,id'],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],
        ]);


        $occasion->update([
            'primary_image' => $request->hasFile('primary_image') ? UploadHelper::upload('occasions', $request->file('primary_image'), config('imageDimensions.products_categories.width'), config('imageDimensions.products_categories.height')):str_replace('http://127.0.0.1:8000/uploads/occasions/', '',$occasion->primary_image) ,
            'icon' => $request->hasFile('icon') ? UploadHelper::upload('occasions', $request->file('icon'), config('imageDimensions.products_categories.width'), config('imageDimensions.products_categories.height')) : str_replace('http://127.0.0.1:8000/uploads/occasions/', '',$occasion->icon),
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'region_id' => $request->region_id,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en
        ]);


        $request->session()->flash('success', 'occasion Added SuccessFully');



        return redirect()->route('admin.occasion.index');
    }

    public function destroy(Request $request, $id)
    {
        $occasion = Occasion::where('id', $id)->first();
        if (!$occasion) {
            $request->session()->flash('failed', 'Occasion Not Found');
            return redirect()->back();
        }
        $occasion->delete();
        $request->session()->flash('success', 'Occasion Deleted SuccessFully');


        return redirect()->back();
    }
}
