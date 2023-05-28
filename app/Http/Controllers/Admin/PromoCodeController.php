<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Exports\PromoCodeExport;
use App\Services\PromoCodeService;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\PromoCode;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PromoCodeController extends Controller
{
    protected $promoServices;
    public function __construct(PromoCodeService $promoServices)
    {
        $this->promoServices = $promoServices;
        //   $this->middleware(['permission:promo-codes-read'])->only(['index','export']);
        //   $this->middleware(['permission:promo-codes-create'])->only(['create', 'store']);
        //   $this->middleware(['permission:promo-codes-update'])->only(['update', 'edit']);
        //   $this->middleware(['permission:promo-codes-delete'])->only(['destroy']);
    }



    public function index(Request $request)
    {
        $today = Carbon::now();

        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {
            $promo_codes = $this->promoServices->getAll($request);

            foreach ($promo_codes as $promo_code) {
                if ($promo_code->expiration_date < $today) {
                    $promo_code->update([
                        "status" => 0
                    ]);
                }
            }

            return \view('admin.promoCode.index', \compact('promo_codes'));
        } else {
            $promo_codes = $this->promoServices->getAllAdmin($request, $useradmin);
            foreach ($promo_codes as $promo_code) {
                if ($promo_code->expiration_date < $today) {
                    $promo_code->update([
                        "status" => 0
                    ]);
                }
            }
            return \view('admin.promoCode.index', \compact('promo_codes'));
        }
    }

    public function create(Request $request)
    {


        return \view('admin.promoCode.create');
    }


    public function export()
    {
        ob_end_clean();
        ob_start();
        return Excel::download(new PromoCodeExport,  Carbon::now() . '-promo_codes.xlsx');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:2', 'unique:promo_codes'],
            'expiration_date' => ['required', 'date'],
            'value' => ['required', 'numeric', 'min:1'],
            'maximum_times_of_use' => ['required', 'numeric', 'min:1'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'dedicated_to' => ['required', 'string'],
            'type' => ['required', 'string', Rule::in(['percent', 'amount'])],
            'user_id' => ['nullable',  'exists:users,id'],

            'product_id' => ['nullable',  'exists:products,id'],
        ]);

        // check value if type is percentage
        if ($request->type == "percent") {
            // value should be have maximum 100 %
            if ($request->value > 100) {
                $request->session()->flash('failed', 'Invalid Value');
                return redirect()->back();
            }
        }

        $created = $this->promoServices->store($request);

        if ($created) {
            $request->session()->flash('success', 'Promo Code Added SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect()->route('admin.promo-codes.index');
    }


    public function edit(Request $request, $id)
    {

        $promo = $this->promoServices->getById($id);
        if (!$promo) {
            $request->session()->flash('failed', 'Promo Code Not Found');
            return redirect()->back();
        }


        return \view('admin.promoCode.edit', \compact('promo'));
    }


    public function update(Request $request, $id)
    {

        $promo = $this->promoServices->getById($id);
        if (!$promo) {
            $request->session()->flash('failed', 'Promo Code Not Found');
            return redirect()->back();
        }

        // return $request->all();
        $request->validate([
            'title' => ['required', 'string', 'min:2',  Rule::unique('promo_codes', 'title')->ignore($promo->id)],
            'expiration_date' => ['required', 'date'],
            'value' => ['required', 'numeric', 'min:0'],
            'maximum_times_of_use' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'dedicated_to' => ['required', 'string'],
            'type' => ['required', 'string', Rule::in(['percent', 'amount'])],
            'user_id' => ['nullable',  'exists:users,id'],
            'product_id' => ['nullable',  'exists:products,id'],
        ]);

        // check value if type is percentage
        if ($request->type == "percent") {
            // value should be have maximum 100 %
            if ($request->value > 100) {
                $request->session()->flash('failed', 'Invalid Value');
                return redirect()->back();
            }
        }

        $updated = $this->promoServices->update($request, $promo);

        if ($updated) {
            $request->session()->flash('success', 'Promo Code Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect()->route('admin.promo-codes.index');
    }

    public function destroy(Request $request, $id)
    {
        $promo = $this->promoServices->getById($id);
        if (!$promo) {
            $request->session()->flash('failed', 'Promo Code Not Found');
            return redirect()->back();
        }
        $promo->delete();
        $request->session()->flash('success', 'Promo Code Deleted SuccessFully');


        return redirect()->back();
    }


    public function restore(Request $request, $id)
    {
        $promo = $this->promoServices->getById($id);
        if (!$promo) {
            $request->session()->flash('failed', 'Promo Code Not Found');
            return redirect()->back();
        }
        $promo->restore();
        $request->session()->flash('success', 'Promo Code Restored SuccessFully');

        return redirect()->back();
    }

    public function show($id)
    {
        $promo_code = PromoCode::find($id);

        return view('admin.promoCode.show', compact('promo_code'));
    }
}
