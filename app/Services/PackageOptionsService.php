<?php

namespace App\Services;

use App\Models\PackageOption;
use App\Helper\UploadHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class PackageOptionsService
{



    protected $option;
    public function __construct(PackageOption $option)
    {

        $this->option = $option;
    }

    public function getAll(Request $request)
    {

        $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ? true : false;
        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';

        $countries = $this->option::with(['admin', 'category'])
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
                return $query->when($request->category_id, function ($q) use ($request) {
                    return $q->where('category_id', $request->category_id);
                });
            })

            ->where(function ($query) use ($request) {
                return $query->when($request->id, function ($q) use ($request) {
                    return $q->where('id', $request->id);
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
            'status',
            'category_id',
            'price',

        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
<<<<<<< HEAD
=======
        if( Auth::guard('admin')->user()->vendor){
            $data['admin_id'] = Auth::guard('admin')->user()->vendor->id;
        }
>>>>>>> 211d721c3ef82e51a3d2067398967a033afbaa37
        $option = $this->option::create($data);

        if ($request->hasFile('image')) {
            $imageName = UploadHelper::upload('packages_options', $request->file('image'), 400, 400);

            $option->image = $imageName;
        }
        $option->save();

        return true;
    }


    public function update(Request $request, PackageOption $option)
    {

        $data = $request->only([
            'title_ar',
            'title_en',
            'status',
            'category_id',
            'price',
        ]);

        $option->update($data);

        if ($request->hasFile('image')) {


            if (File::exists(public_path('uploads/packages_options/' . $option->image))) {

                Storage::disk('public_uploads')->delete('packages_options/' . $option->image);
            }

            $imageName = UploadHelper::upload('packages_options', $request->file('image'), 400, 400);

            $option->image = $imageName;
        }
        $option->save();


        return $option ? true : false;
    }

    public function getById(int $id)
    {
        return  $this->option::withTrashed()->find($id);
    }



    public function getActiveOptions()
    {
        return  $this->option::whereStatus(1)->get();
    }
}
