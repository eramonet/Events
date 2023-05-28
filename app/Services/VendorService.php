<?php

namespace App\Services;
use App\Models\Vendor;
use App\Helper\UploadHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class VendorService {



protected $vendor;
public function __construct(Vendor $vendor){

    $this->vendor = $vendor;

}

public function getAll(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';
    $countries = $this->vendor::withCount(['admins','halls'])->with(['admin'])
     -> where(function($query)use($request){
        return $query->when($request->search ,function($q ) use($request){
            return $q->where('title_ar' ,'like' , '%'.$request->search.'%')
                    ->orWhere('title_en' ,'like' , '%'.$request->search.'%');
        });

    })

    ->when($deleted ,function($q ) use($deleted){
        return $q->onlyTrashed();
    })
    ->when($request->from ,function($q ) use($request){
        return $q->whereDate('created_at','>=',$request->from);
    })
    ->when($request->to ,function($q ) use($request){
        return $q->whereDate('created_at','<=',$request->to);
    })

    ->where(function($query)use($request){
        return $query->when($request->vendor_id ,function($q ) use($request){
            return $q->where('id' ,$request->vendor_id);
        });

    })
    ->where(function($query)use($request , $status){
        return $query->when($status ,function($q ) use($request){
            return $q->whereStatus($request->status);
        });
    })
    ->orderBy('created_at' , $order)
    ->paginate( $limit)
    ->withQueryString();


    return $countries;
}

public function store(Request $request  ){


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
            'can_add_products',
            'can_add_halls',
            'status',
            'commission',
            'halls_count',
            'products_count',
            'type',
            'account',
            'Tax_Number',
            'Tax_Number_expiration_date',
            'country_id',
            'halls_count',
            'city_id',
            'region_id',
            'commercial_registration_number',
            'vendor_admin',
           
           

        ]);

        $data['admin_id'] = Auth::guard('admin')->id();
        $vendor = $this->vendor::create($data);

     if($request->hasFile('image')){
        $imageName = UploadHelper::upload('vendors_images', $request->file('image'), 800, 800);

        $vendor->image =$imageName;
    }
    $vendor->save();

    return true;


}


public function update(Request $request ,Vendor $vendor){



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
        'can_add_products',
        'can_add_halls',
        'status',
        'commission',
        'halls_count',
        'products_count',
        'type',
        'account',
        'Tax_Number',
        'country_id',
        'halls_count',
        'city_id',
        'region_id',
        'Tax_Number_expiration_date',
        'commercial_registration_number',
        'vendor_admin',
       
    ]);

    $vendor->update($data);

    if($request->hasFile('image')){


        if( File::exists(public_path('uploads/vendors_images/'. $vendor->image))){

            Storage::disk('public_uploads')->delete('vendors_images/'. $vendor->image);
        }

            $imageName = UploadHelper::upload('vendors_images', $request->file('image'), 800, 800);

            $vendor->image =$imageName;
    }
    $vendor->save();


    return $vendor ? true :false;


}

public function getById(int $id){
   return  $this->vendor::withTrashed()->find($id);

}



public function getActiveVendors(){
    return  $this->vendor::whereStatus(1)->get();

 }
}
