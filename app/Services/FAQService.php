<?php

namespace App\Services;
use App\Models\FAQ;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;


class FAQService {



protected $faq;
public function __construct(FAQ $faq){

    $this->faq = $faq;

}

public function getAll(Request $request){

    $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ?true:false;
    $deleted = isset($request->deleted) && $request->deleted == 0?1:null;
    $limit = isset($request->limit) && filter_var($request->limit,FILTER_VALIDATE_INT) ? $request->limit:5;
    $order = isset($request->order) && $request->order =='ASC'? 'ASC':'DESC';

    $type = $request->type && $request->type == 'sub' ? 'sub' : 'main';
    $faqs = $this->faq::with(['admin'])
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
        return $query->when($request->faq_id ,function($q ) use($request){
            return $q->where('id' ,$request->faq_id);
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


    return $faqs;
}

public function store(Request $request  ){


        $data = $request->only([
            'question_ar',
            'question_en',
            'answer_ar',
            'answer_en',
            'category_id',
            'status',

        ]);
        $data['admin_id'] = Auth::guard('admin')->id();
     $faq = $this->faq::create($data);

    $faq->save();

    return true;


}


public function update(Request $request ,FAQ $faq){



    $data = $request->only([
        'question_ar',
        'question_en',
        'answer_ar',
        'answer_en',
        'category_id',
        'status',

    ]);

    $faq->update($data);


    $faq->save();


    return $faq ? true :false;


}

public function getById(int $id){
   return  $this->faq::withTrashed()->find($id);

}



public function getActiveFAQs(){
    return  $this->faq::whereStatus(1)->get();

 }



}
