<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SplashService;
use Illuminate\Http\Request;

class SplashController extends Controller
{
    protected $splashService;

    public function __construct(SplashService $splashService)
    {
        $this->splashService = $splashService;

        $this->middleware(['permission:splashes-read'])->only(['index', 'export']);
        $this->middleware(['permission:splashes-create'])->only(['create', 'store']);
        $this->middleware(['permission:splashes-update'])->only(['update', 'edit']);
        $this->middleware(['permission:splashes-delete'])->only(['destroy']);
    }



    public function index(Request $request)
    {


        $splashes = $this->splashService->getAll($request);



        // return $cities;
        return \view('admin.splashes.index', \compact('splashes'));
    }

    public function create(Request $request)
    {


        return \view('admin.splashes.create');
    }




    public function store(Request $request)

    {


        $request->validate([
            'title_ar' => ['required', 'string', 'min:2', 'unique:splashes'],
            'title_en' => ['required', 'string', 'min:2', 'unique:splashes'],
            'details_ar' => ['required', 'string', 'min:2'],
            'details_en' => ['required', 'string', 'min:2'],
            'number' => ['required'],
            'image' => ['required', 'image', 'max:10240'],
        ]);



        $created = $this->splashService->store($request);

        if ($created) {
            $request->session()->flash('success', 'Splash Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->back();
    }


    public function edit(Request $request, $id)
    {

        $splash = $this->splashService->getById($id);
        if (!$splash) {
            $request->session()->flash('failed', 'Splash Not Found');
            return redirect()->back();
        }
        return \view('admin.splashes.edit', \compact('splash'));
    }


    public function update(Request $request, $id)
    {
        $splash = $this->splashService->getById($id);
        if (!$splash) {
            $request->session()->flash('failed', 'Splash Not Found');
            return redirect()->back();
        }
        $request->validate([
            'title_ar' => ['nullable', 'string', 'min:2', 'unique:splashes'],
            'title_en' => ['nullable', 'string', 'min:2', 'unique:splashes'],
            'details_ar' => ['nullable', 'string', 'min:2'],
            'details_en' => ['nullable', 'string', 'min:2'],
            'number' => ['nullable'],
            'image' => ['nullable', 'image', 'max:10240'],
        ]);

        $updated = $this->splashService->update($request, $splash);

        if ($updated) {
            $request->session()->flash('success', 'Splash Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $splash = $this->splashService->getById($id);
        if (!$splash) {
            $request->session()->flash('failed', 'Splash Not Found');
            return redirect()->back();
        }
        $splash->delete();
        $request->session()->flash('success', 'Splash Deleted SuccessFully');


        return redirect()->back();
    }

}