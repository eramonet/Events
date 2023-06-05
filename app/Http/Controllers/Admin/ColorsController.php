<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ColorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::latest()->paginate(10);
        return view('admin.colors.index', [
            'colors' => $colors,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.colors.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'name_en' => ['required', 'string', 'min:2', 'unique:colors'],
            'name_ar' => ['required', 'string', 'min:2', 'unique:colors'],
            'code' => ['required', 'string', 'min:2', 'unique:colors'],
        ]);

        $created = Color::create($request->all());

        if ($created) {
            $request->session()->flash('success', 'Color Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect('acp/colors');
    }


    public function edit($id)
    {

        $color = Color::where('id', $id)->frist();
        return view('admin.colors.edit', [
            'color' => $color
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
        $color = Color::where('id', $id)->first();


        $request->validate([
            'name_en' => ['required', 'string'],
            'name_ar' => ['required', 'string'],
            'code' => ['required', 'string',],
        ]);

        $color->update($request->all());
        $request->session()->flash('success', 'Color Added SuccessFully');
        return redirect('acp/colors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::where('id', $id)->first();
        $color->delete();
        session()->flash('success', 'Color deleted SuccessFully');
        return redirect('acp/colors');
    }
}
