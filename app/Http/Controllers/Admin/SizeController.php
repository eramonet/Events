<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes= Size::paginate(10);
        return view('admin.sizes.index',[
            'sizes' => $sizes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.size.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','string','min:2' , 'unique:sizes'],
           
         ]);

         $created = Size::create($request->all());

         if($created){
             $request->session()->flash('success', 'Size Added SuccessFully');
 
         }else{
             $request->session()->flash('failed', 'Something Wrong');
 
         }

         return redirect('acp/sizes');
    }

    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        $size = Size::where('id',$id)->first();
        $request->validate([
            'name'=>['required','string'],
      
         ]);

         $size->update($request->all());
         $request->session()->flash('success', 'Size Added SuccessFully');
         return redirect('acp/sizes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Size::where('id',$id)->first();
        $color->delete();
        session()->flash('success', 'Size deleted SuccessFully');
        return redirect('acp/sizes');
    }
}
