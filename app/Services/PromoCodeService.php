<?php

namespace App\Services;

use App\Models\PromoCode;
use App\Models\Vendor;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class PromoCodeService
{



    protected $promo;
    public function __construct(PromoCode $promo)
    {

        $this->promo = $promo;
    }

    public function getAll(Request $request)
    {

        $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ? true : false;
        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';
        $codes = $this->promo::with(['admin', 'user'])
            ->where(function ($query) use ($request) {
                return $query->when($request->search, function ($q) use ($request) {
                    return $q->where('title', 'like', '%' . $request->search . '%');
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
                return $query->when($request->promo_id, function ($q) use ($request) {
                    return $q->where('id', $request->promo_id);
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


        return $codes;
    }

    public function getAllAdmin(Request $request, $useradmin)
    {

        $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ? true : false;
        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';
        $codes = $this->promo::with(['admin', 'user'])
            ->where('admin_id', $useradmin->id)
            ->where(function ($query) use ($request) {
                return $query->when($request->search, function ($q) use ($request) {
                    return $q->where('title', 'like', '%' . $request->search . '%');
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
                return $query->when($request->promo_id, function ($q) use ($request) {
                    return $q->where('id', $request->promo_id);
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


        return $codes;
    }

    public function store(Request $request)
    {


        $data = $request->only([
            'title',
            'expiration_date',
            'type',
            'value',
            'dedicated_to',
            'percent_or_amount',
            'user_id',
            'status',
            'maximum_times_of_use',
            'product_id',
        ]);
        $current_login = Auth::guard('admin')->user() ;
        $data['admin_id'] = Auth::guard('admin')->user()->vendor ? Vendor::where("id" , $current_login->vendor_id)->first()->id : Auth::guard('admin')->id() ;
        if ($request->dedicated_to == 'spacial_user') {
            $data['product_id'] = NULL;
            $data['user_id'] = $request->user_id;
        } elseif ($request->dedicated_to == 'spacial_product') {
            $data['user_id'] = NULL;
            $data['product_id'] = $request->product_id;
        } else {
            $data['user_id'] = NULL;
            $data['product_id'] = NULL;
        }

        $this->promo::create($data);

        return true;
    }


    public function update(Request $request, PromoCode $promo)
    {


        $data = $request->only([
            'title',
            'expiration_date',
            'type',
            'value',
            'dedicated_to',
            'percent_or_amount',
            'status',
            'maximum_times_of_use',
            'product_id',
        ]);

        $data['admin_id'] = Auth::guard('admin')->id();

        if ($request->dedicated_to == 'spacial_user') {
            $data['product_id'] = NULL;
            $data['user_id'] = $request->user_id;
        } elseif ($request->dedicated_to == 'spacial_product') {
            $data['user_id'] = NULL;
            $data['product_id'] = $request->product_id;
        } else {
            $data['user_id'] = NULL;
            $data['product_id'] = NULL;
        }

        $data['dedicated_to'] = $request->dedicated_to == "spacial_product" ? "product" :  $request->dedicated_to  ;


        $promo->update($data);



        return $promo ? true : false;
    }

    public function getById(int $id)
    {
        return  $this->promo::withTrashed()->find($id);
    }



    public function getActivePromoCodes()
    {
        return  $this->promo::whereStatus(1)->get();
    }
}
