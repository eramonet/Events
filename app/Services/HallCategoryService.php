<?php

namespace App\Services;
use App\Models\HallCategory;
use App\Helper\UploadHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class HallCategoryService {



protected $category;
public function __construct(HallCategory $category){

    $this->category = $category;

}

public function getAll(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';

    $countries = $this->category::with(['admin'])->withCount(['halls'])
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


    return $countries;
}

    public function getAllAdmin(Request $request, $useradmin)
    {

        $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ? true : false;
        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';

        $countries = $this->category::with(['admin'])->withCount(['halls'])
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
                return $query->when($request->category_id, function ($q) use ($request) {
                    return $q->where('id', $request->category_id);
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




public function store(Request $request  ){


        $data = $request->only([
            'title_ar',
            'title_en',
            'summary_ar',
            'summary_en',
            'description_ar',
            'description_en',
            'keywords_ar',
            'keywords_en',
            'status',

        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
     $category = $this->category::create($data);

     if($request->hasFile('image')){
        $imageName = UploadHelper::upload('halls_categories_images', $request->file('image'), 800, 800);

        $category->image =$imageName;
    }
    $category->save();

    return true;


}


public function update(Request $request ,HallCategory $category){



    $data = $request->only([
        'title_ar',
        'title_en',
        'summary_ar',
        'summary_en',
        'description_ar',
        'description_en',
        'keywords_ar',
        'keywords_en',
        'status',
    ]);

    $category->update($data);

    if($request->hasFile('image')){


        if( File::exists(public_path('uploads/halls_categories_images/'. $category->image))){

            Storage::disk('public_uploads')->delete('halls_categories_images/'. $category->image);
        }

            $imageName = UploadHelper::upload('halls_categories_images', $request->file('image'), 800, 800);

            $category->image =$imageName;
    }
    $category->save();


    return $category ? true :false;


}

public function getById(int $id){
   return  $this->category::withTrashed()->find($id);

}



public function getActiveCategories(){
    return  $this->category::whereStatus(1)->get();

 }



}
