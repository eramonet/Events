<?php

namespace App\Services;
use App\Models\DynamicPage;
use App\Helper\UploadHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class DynamicPageService {



protected $page;
public function __construct(DynamicPage $page){

    $this->page = $page;

}

public function getAll(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';

    $type = $request->type && $request->type == 'sub' ? 'sub' : 'main';
    $pages = $this->page::with(['admin'])
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
        return $query->when($request->page_id ,function($q ) use($request){
            return $q->where('id' ,$request->page_id);
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


    return $pages;
}

public function store(Request $request  ){


        $data = $request->only([
            'title_ar',
            'title_en',
            'content_ar',
            'content_en',
            'description_ar',
            'description_en',
            'keywords_ar',
            'keywords_en',
            'youtube_video_link',
            'status',

        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
     $page = $this->page::create($data);

     if($request->hasFile('image')){
        $imageName = UploadHelper::upload('dynamic_pages_images', $request->file('image'), config('imageDimensions.pages.width'), config('imageDimensions.pages.height'));

        $page->image =$imageName;
    }
    $page->save();

    return true;


}


public function update(Request $request ,DynamicPage $page){



    $data = $request->only([
        'title_ar',
        'title_en',
        'content_ar',
        'content_en',
        'description_ar',
        'description_en',
        'keywords_ar',
        'keywords_en',
        'youtube_video_link',
        'status',
    ]);

    $page->update($data);

    if($request->hasFile('image')){


        if( File::exists(public_path('uploads/dynamic_pages_images/'. $page->image))){

            Storage::disk('public_uploads')->delete('dynamic_pages_images/'. $page->image);
        }

            $imageName = UploadHelper::upload('dynamic_pages_images', $request->file('image'), config('imageDimensions.pages.width'), config('imageDimensions.pages.height'));

            $page->image =$imageName;
    }
    $page->save();


    return $page ? true :false;


}

public function getById(int $id){
   return  $this->page::withTrashed()->find($id);

}



public function getActiveDynamicPages(){
    return  $this->page::whereStatus(1)->get();

 }



}
