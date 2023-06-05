<?php

namespace App\Services;
use App\Models\Admin;
use App\Models\AdminCategory;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class AdminCategoryService {



protected $category;
public function __construct(AdminCategory $category){

    $this->category = $category;

}

public function getAll(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';
    $categories = $this->category::withCount(['vendor_admins','system_admins'])->with(['added_by_admin'])
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
        return $query->when($request->category_id ,function($q ) use($request){
            return $q->where('id' ,$request->category_id);
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


    return $categories;
}

public function store(Request $request  ){


        $data = $request->only([
            'title_ar',
            'title_en',
            'details_ar',
            'details_en',
            'status'

        ]);
        $data['added_by'] = Auth::guard('admin')->id();

     $this->category::create($data);

    return true;


}


public function update(Request $request ,AdminCategory $category){


    $data = $request->only([
        'title_ar',
        'title_en',
        'details_ar',
        'details_en',
        'status'
    ]);

    $category->update($data);



    return $category ? true :false;


}

public function getById(int $id){
   return  $this->category::withTrashed()->find($id);

}



public function getActiveCategories(){
    return  $this->category::whereStatus(1)->get();

 }
}
