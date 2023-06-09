<?php

namespace App\Services;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class CityService {



protected $city;
public function __construct(City $city){

    $this->city = $city;

}

public function getAll(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';
        $data = $this->city::withCount(['regions'])->with(['admin' ,'country'])
            ->where(function ($query) use ($request) {
                return $query->when($request->search, function ($q) use ($request) {
                    return $q->where('title_ar', 'like', '%' . $request->search . '%')
                        ->orWhere('title_en', 'like', '%' . $request->search . '%')
                        ->orWhere('code', 'like', '%' . $request->search . '%');
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
        return $query->when($request->city_id ,function($q ) use($request){
            return $q->where('id' ,$request->city_id);
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


    return $data;
}

public function store(Request $request  ){


        $data = $request->only([
            'title_ar',
            'title_en',
            'status',
            'image',
        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
        $data['country_id'] = Country::first()->id ;
        $this->city::create($data);

    return true;


}


public function update(Request $request ,City $city){

    $data = $request->only([
        'title_ar',
        'title_en',
        'status',
        'image',
    ]);

    $data['country_id'] = Country::first()->id ;

    $city->update($data);

    return $city ? true :false;


}

public function getById(int $id){
   return  $this->city::withTrashed()->find($id);

}



public function getActiveCities(){
    return  $this->city::whereStatus(1)->get();

 }

 public function cityByCountryId(int $id){
    return  $this->city::whereCountryId($id)->get();
 }

}
