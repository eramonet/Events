<?php

namespace App\Services;

use App\Models\Package;
use App\Helper\UploadHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class PackageService
{



    protected $package;
    public function __construct(Package $package)
    {

        $this->package = $package;
    }

    public function getAll(Request $request)
    {

        $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ? true : false;
        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';
        $countries = $this->package::with(['admin', 'hall', 'category', 'vendor'])
            ->where(function ($query) use ($request) {
                return $query->when($request->search, function ($q) use ($request) {
                    return $q->where('title_ar', 'like', '%' . $request->search . '%')
                        ->orWhere('title_en', 'like', '%' . $request->search . '%');
                });
            })

            ->when($deleted, function ($q) use ($deleted) {
                return $q->onlyTrashed();
            })
            ->when($request->from, function ($q) use ($request) {
                return $q->whereDate('created_at', '>=', $request->from);
            })
            ->when($request->to, function ($q) use ($request) {
                return $q->whereDate('created_at', '<=', $request->to);
            })

            ->where(function ($query) use ($request) {
                return $query->when($request->vendor_id, function ($q) use ($request) {
                    return $q->where('id', $request->vendor_id);
                });
            })
            ->where(function ($query) use ($request, $status) {
                return $query->when($status, function ($q) use ($request) {
                    return $q->whereStatus($request->status);
                });
            })
            ->orderBy('created_at', $order)
            ->paginate($limit)
            ->withQueryString();


        return $countries;
    }

    public function store(Request $request)
    {


        $data = $request->only([

            'title_ar',
            'title_en',
            'summary_ar',
            'summary_en',
            'description_ar',
            'description_en',
            'keywords_ar',
            'keywords_en',
            'meal_description_ar',
            'meal_description_en',
            'lighting_description_ar',
            'lighting_description_en',
            'sound_description_ar',
            'sound_description_en',
            'plan_of_the_day_description_ar',
            'plan_of_the_day_description_en',
            'flowers_description_ar',
            'flowers_description_en',
            'decoration_description_ar',
            'decoration_description_en',
            'status',
            'extra_guest_price',
            'number_of_tables',
            'number_of_guests',
            'real_price',
            'hall_id',
            'photographer',
        ]);

        $data['admin_id'] = Auth::guard('admin')->id();
        if( Auth::guard('admin')->user()->vendor){
            $data['admin_id'] = Auth::guard('admin')->user()->vendor->id;
        }

        $package = $this->package::create($data);


        if ($request->input('taxes')) {
            $package->taxes()->attach($request->taxes);
        }
        if ($request->input('options')) {
            $package->options()->attach($request->options);
        }

        if ($request->hasFile('image')) {
            $imageName = UploadHelper::upload('packages_images', $request->file('image'), 800, 800);

            $package->image = $imageName;
        }
        $package->save();

        return true;
    }


    public function update(Request $request, Package $package)
    {



        $data = $request->only([

            'title_ar',
            'title_en',
            'summary_ar',
            'summary_en',
            'description_ar',
            'description_en',
            'keywords_ar',
            'keywords_en',
            'meal_description_ar',
            'meal_description_en',
            'lighting_description_ar',
            'lighting_description_en',
            'sound_description_ar',
            'sound_description_en',
            'plan_of_the_day_description_ar',
            'plan_of_the_day_description_en',
            'flowers_description_ar',
            'flowers_description_en',
            'decoration_description_ar',
            'decoration_description_en',
            'status',
            'extra_guest_price',
            'number_of_tables',
            'number_of_guests',
            'real_price',
            'vendor_id',
            'hall_id',
        ]);

        $package->update($data);

        $package->taxes()->sync($request->taxes);


        if ($request->hasFile('image')) {


            if (File::exists(public_path('uploads/packages_images/' . $package->image))) {

                Storage::disk('public_uploads')->delete('packages_images/' . $package->image);
            }

            $imageName = UploadHelper::upload('packages_images', $request->file('image'), 800, 800);

            $package->image = $imageName;
        }
        $package->save();


        return $package ? true : false;
    }

    public function getById(int $id)
    {
        return  $this->package::withTrashed()->find($id);
    }



    public function getActivePackages()
    {
        return  $this->package::whereStatus(1)->get();
    }
}
