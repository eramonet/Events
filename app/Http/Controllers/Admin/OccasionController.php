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

        $occasions =  Occasion::paginate(10);
        return \view('admin.occasions.index', [
            'occasions' => $occasions
        ]);
    }

    public function create(Request $request)
    {

        $countrys = Country::all();

        $cities = City::all();
        $regions = Region::all();

        return \view('admin.occasions.create', [

            'countrys' => $countrys,
            'cities' => $cities,
            'regions' => $regions,
        ]);
    }


    public function store(Request $request)

    {

        $request->validate([

            'primary_image' => ['required', 'image', 'max:10240'],
            'title_ar' => ['required', 'string', 'min:2', 'unique:occasions'],
            'title_en' => ['required', 'string', 'min:2', 'unique:occasions'],
            'country_id' => ['required', 'exists:countries,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'region_id' => ['required', 'exists:regions,id'],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],


        ]);

        //  return $request->file('primary_image') ;

        $imageName = UploadHelper::upload('occasions', $request->file('primary_image'), config('imageDimensions.products_categories.width'), config('imageDimensions.products_categories.height'));

        $data = $request->all();

        $data['primary_image'] = $imageName;
        $created = Occasion::create($data);

        if ($created) {
            $request->session()->flash('success', 'Occasion Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect('acp/occasion');
    }


    public function edit(Request $request, $id)
    {

        $occasion = Occasion::where('id', $id)->first();
        if (!$occasion) {
            $request->session()->flash('failed', 'Occasion Not Found');
            return redirect()->back();
        }
        $countrys = Country::all();
        $cities = City::all();
        $regions = Region::all();

        return \view('admin.occasions.edit', [
            'countrys' => $countrys,
            'cities' => $cities,
            'regions' => $regions,
            'occasion' => $occasion,
        ]);
    }


    public function update(Request $request, $id)
    {
        $occasion = Occasion::where('id', $id)->first();


        $request->validate([
            'primary_image' => ['nullable', 'image', 'max:10240'],
            'title_ar' => ['required', 'string', 'min:2',  Rule::unique('occasions')->ignore($occasion)],
            'title_en' => ['required', 'string', 'min:2',  Rule::unique('occasions')->ignore($occasion)],
            'country_id' => ['required', 'exists:countries,id'],
            'city_id' => ['required', 'exists:cities,id'],
            'region_id' => ['required', 'exists:regions,id'],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],
        ]);

        if ($request->hasFile('primary_image')) {


            if (File::exists(public_path('uploads/occasions/' . $occasion->primary_image))) {

                Storage::disk('public_uploads')->delete('occasions/' . $occasion->primary_image);
            }

            $imageName = UploadHelper::upload('occasions', $request->file('primary_image'), config('imageDimensions.products_categories.width'), config('imageDimensions.products_categories.height'));

            $occasion->primary_image = $imageName;
        }
        
        $occasion->update([
            'primary_image' => $request->hasFile('primary_image') ? UploadHelper::upload('occasions', $request->file('primary_image'), config('imageDimensions.products_categories.width'), config('imageDimensions.products_categories.height')) : $occasion->primary_image ,
            'title_ar' => $request->title_ar,
            'title_en' => $request->title_en,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'region_id' => $request->region_id,
            'description_ar' => $request->description_ar,
            'description_en' => $request->description_en
        ]);


        $request->session()->flash('success', 'occasion Added SuccessFully');



        return redirect()->back();
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
