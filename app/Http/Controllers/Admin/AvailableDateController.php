<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Available_date;
use App\Models\Hall;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AvailableDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dates=Available_date::paginate(10);



        return view('admin.availabel_date.index',[
            'dates' => $dates,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $halls=Hall::all();
        return view('admin.availabel_date.create',[
            'halls' => $halls,
        ]);
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
            'status'=>['required', 'string', Rule::in(['active', 'inactive'])],

            'hall_id'=> ['required', 'exists:halls,id'],

            'available_date' => ['required'],

            'time_from' => ['required'],
            'time_to' => ['required'],
        ]);
        $date=Available_date::where('hall_id',$request->hall_id)->
        where('available_date',$request->available_date)->
            where('time_from', $request->time_from)->
            where('time_to', $request->time_to)->first();
        if ($date) {
            session()->flash('failed', 'Date Is Not Available');
            return redirect('acp/availabel_date');
        }
        Available_date::create($request->all());
        $request->session()->flash('success', 'Date created SuccessFully');
        return redirect('acp/availabel_date');

    }

    public function edit($id)
    {
       $date= Available_date::findOrFail($id);
       $halls = Hall::all();
        return view('admin.availabel_date.edit',[
            'date' => $date,
            'halls' => $halls,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $request->validate([

            'status'=>['required', 'string', Rule::in(['active', 'inactive'])],
            'hall_id'=> ['required', 'exists:halls,id'],
            'available_date' => ['required'],
            'time_from' => ['required'],
            'time_to' => ['required'],
          ]);
        $date = Available_date::where('hall_id', $request->hall_id)->where('available_date', $request->available_date)->where('time_from', $request->time_from)->where('time_to', $request->time_to)->first();
        if ($date) {
            session()->flash('failed', 'Date Is Not Available');
            return redirect('acp/availabel_date');
        }else{
        $date = Available_date::findOrFail($id);
        $date->update($request->all());
        $request->session()->flash('success', 'Category crated SuccessFully');
        return redirect('acp/availabel_date');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $date= Available_date::findOrFail($id);;




        if(!$date ){
            session()->flash('failed', 'Unvaliabel Date Not Found');
            return redirect('acp/availabel_date');

        }
        $date->delete();
       session()->flash('success', 'Unvaliabel Date Deleted SuccessFully');


       return redirect('acp/availabel_date');
    }
}