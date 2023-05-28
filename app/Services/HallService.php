<?php

namespace App\Services;

use App\Models\Hall;
use App\Helper\UploadHelper;
use App\Models\CategoryHall;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class HallService
{



    protected $hall;
    public function __construct(Hall $hall)
    {

        $this->hall = $hall;
    }

    public function getAll(Request $request)
    {

        $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ? true : false;
        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';
        $countries = $this->hall::with(['admin', 'media', 'country', 'city', 'vendor'])
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
                    return $q->where('vendor_id', $request->vendor_id);
                });
            })

            ->where(function ($query) use ($request) {
                return $query->when($request->hall_id, function ($q) use ($request) {
                    return $q->where('id', $request->hall_id);
                });
            })

            ->where(function ($query) use ($request) {
                return $query->when($request->category_id, function ($q) use ($request) {
                    return $q->whereHas('categories', function ($query) use ($request) {
                        return $query->where('category_id', $request->category_id);
                    });
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


    public function getAllAdmin(Request $request, $useradmin)
    {

        $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ? true : false;
        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';
        $countries = $this->hall::with(['admin', 'media', 'categories', 'country', 'city', 'vendor'])
            ->where('admin_id', $useradmin->id)
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
                    return $q->where('vendor_id', $request->vendor_id);
                });
            })

            ->where(function ($query) use ($request) {
                return $query->when($request->hall_id, function ($q) use ($request) {
                    return $q->where('id', $request->hall_id);
                });
            })

            ->where(function ($query) use ($request) {
                return $query->when($request->category_id, function ($q) use ($request) {
                    return $q->whereHas('categories', function ($query) use ($request) {
                        return $query->where('category_id', $request->category_id);
                    });
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
            'email',
            'phone',
            'title_ar',
            'title_en',
            'summary_ar',
            'summary_en',
            'description_ar',
            'description_en',
            'keywords_ar',
            'keywords_en',
            'status',
            'guests_capacity',
            'country_id',
            'city_id',
            'latitude',
            'longitude',
            'address_ar',
            'address_en',

        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
        $data['vendor_id'] = Auth::guard('admin')->user()->vendor ? Auth::guard('admin')->user()->vendor->id : null;

        $hall = $this->hall::create($data);

        if ($request->input('categories')) {
            return $request->input('categories') ;
            foreach( $request->input('categories') as $category_occasion ){
                CategoryHall::create([
                    "category_id" => $category_occasion ,
                    "hall_id" => $hall->id
                ]);
            }
        }





        if ($request->hasFile('primary_image')) {
            $imageName = UploadHelper::upload('halls_images', $request->file('primary_image'), 800, 800);

            $hall->primary_image = $imageName;
        }

        if ($request->hasFile('images')) {


            foreach ($request->images as $image) {
                $imageName = UploadHelper::upload('halls_images', $image, 800, 800);

                $hall->media()->create(['image' => $imageName]);
            }
        }
        $hall->save();

        return true;
    }


    public function update(Request $request, Hall $hall)
    {
        $data = $request->only([
            'email',
            'phone',
            'title_ar',
            'title_en',
            'summary_ar',
            'summary_en',
            'description_ar',
            'description_en',
            'keywords_ar',
            'keywords_en',
            'status',
            'guests_capacity',
            'country_id',
            'city_id',
            'vendor_id',
            'latitude',
            'longitude',
            'address_ar',
            'address_en',
        ]);

        $hall->update($data);
        if ($request->input('categories')) {

            $category_hall = CategoryHall::where("hall_id", $hall->id)->get();

            if (count($category_hall) > 0) {
                foreach ($category_hall as $cat_hall) {
                    $cat_hall->delete();
                }
            }
            foreach( $request->input('categories') as $category_occasion ){
                CategoryHall::create([
                    "category_id" => $category_occasion ,
                    "hall_id" => $hall->id
                ]);
            }
        }


        if ($request->hasFile('primary_image')) {

            if (File::exists(public_path('uploads/halls_images/' . $hall->primary_image))) {

                Storage::disk('public_uploads')->delete('halls_images/' . $hall->primary_image);
            }
            $imageName = UploadHelper::upload('halls_images', $request->file('primary_image'), 800, 800);

            $hall->primary_image = $imageName;
        }

        if ($request->hasFile('images')) {

            foreach ($hall->media as $media) {
                if (File::exists(public_path('uploads/halls_images/' . $media->image))) {

                    Storage::disk('public_uploads')->delete('halls_images/' . $media->image);
                }
            }
            $hall->media()->delete();
            foreach ($request->images as $image) {
                $imageName = UploadHelper::upload('halls_images', $image, 800, 800);

                $hall->media()->create(['image' => $imageName]);
            }
        }
        $hall->save();


        return $hall ? true : false;
    }

    public function getById(int $id)
    {
        return  $this->hall::withTrashed()->find($id);
    }



    public function getActiveHalls()
    {
        return  $this->hall::whereStatus(1)->get();
    }

    public function hallsByVendorId(int $id)
    {
        return  $this->hall::whereVendorId($id)->get();
    }
}
