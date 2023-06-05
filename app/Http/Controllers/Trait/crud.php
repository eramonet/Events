<?php


namespace App\Http\Controllers\Trait;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

trait crud
{
    // get all
    public function get_all($model)
    {
        return $model::latest()->get();
    }

    // create
    function create_fun($model, $data)
    {
        $model_path = $model::create($data);
        return $model_path;
    }

    function update_fun($model, $id, $data)
    {
        return $model::find($id)->update($data);
    }

    function show_fun($model, $column , $slug)
    {
        $data = $model::where($column , $slug)->first();
        if (!$data) {
            return false;
        }
        return $data;
    }

    // destroy
    function delete_fun($model, $id)
    {
        $model_path = $model::find($id)->delete();

        return true;
    }

    /**
     * last value in $modal array should be base model
     * key that will foreign key of other tables
     */
    function delete_tree_fun($modals, $key, $id)
    {
        for ($index = 0; $index < count($modals); $index++) {
            if ($index != count($modals) - 1) {
                $value = $modals[$index]::where($key, $id)->get();

                if (count($value) > 0) {
                    foreach ($value as $val) {
                        $val->delete();
                    }
                }
            } else if ($index == count($modals) - 1) {
                $modals[$index]::find($id)->delete();
            }
        }

        return true;
    }

    function update_tree_fun($modals, $key, $id, $data)
    {
        $items = $modals::where($key, $id)->get();

        if (count($items) > 0) {
            foreach ($items as $item) {
                $item->update($data);
            }
        }

        return true;
    }

    function store_image(Request $request, $file_name, $path)
    {
        $file = $request->file($file_name);

        $FileName = date('YmdHi') . $file->getClientOriginalName();

        $file->move(public_path($path), $FileName);
        return $FileName;
    }

    function get_lang(  )
    {
        return session()->get('locale');
    }

    public function get_current_user()
    {
        if( auth()->user() ){
            return auth()->user()->id ;
        }else{
            return \Request::ip() ;
        }
    }

    function get_data_with_multi_constrants( $model , $fkey , $fvalue , $skey , $svale ){
        $data = $model::where([
            [ $fkey , $fvalue ] ,
            [ $skey , $svale ]
        ])->first();

        return $data ;
    }


}
