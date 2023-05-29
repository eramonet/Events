<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Services\TaxService;
use Illuminate\Http\Request;
use App\Exports\ProductExport;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\City;
use App\Models\Color;
use App\Models\Occasion;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Size;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\ProductCategoryService;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $productService;
    protected $productCategoryService;
    protected $texService;





    public function __construct(ProductService $productService, ProductCategoryService $productCategoryService, TaxService $texService,)
    {
        $this->productService = $productService;
        $this->productCategoryService = $productCategoryService;
        $this->texService = $texService;



        $this->middleware(['permission:products-read'])->only(['index', 'export']);
        $this->middleware(['permission:products-create'])->only(['create', 'store']);
        $this->middleware(['permission:products-update'])->only(['update', 'edit']);
        $this->middleware(['permission:products-delete'])->only(['destroy']);
    }




    public function index(Request $request)
    {
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {

            $products = Product::accept()->latest()->paginate(10);

            $type = $request->type && ($request->type == 'in-stock' || $request->type == 'out-of-stock') ? $request->type : 'all';

            return \view('admin.product.index', \compact('products', 'type'));
        } else {

            $products = $this->productService->getAllAdmin($request, $useradmin->vendor);
            $type = $request->type && ($request->type == 'in-stock' || $request->type == 'out-of-stock') ? $request->type : 'all';

            // return sprintf("%08d",'10000000009999999');
            // return str_pad(3, 12, "0", STR_PAD_LEFT);
            return \view('admin.product.index', \compact('products', 'type'));
        }
    }

    public function create(Request $request)
    {
        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();
        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {

            $mainCategories = $this->productCategoryService->getActiveMainCategories();


            $colors = Color::get();
            $taxes = $this->texService->getActiveTaxes();

            $firstMainCategorySubCategories = $mainCategories->count() > 0 ? $mainCategories->first()->sub_catagories : $mainCategories;

            $products = $this->productService->getActiveProducts();
            $sizes = Size::get();
            $cities = City::get();
            $occasions = Occasion::forProduct()->get();
            // return $products;


            return \view('admin.product.create', \compact('mainCategories', 'occasions', 'sizes', 'cities', 'taxes', 'firstMainCategorySubCategories', 'products', 'colors'));
        } else {
            $mainCategories = $this->productCategoryService->getActiveMainCategoriesAdmin($useradmin);
            $colors = Color::get();
            $taxes = $this->texService->getActiveTaxes();
            $firstMainCategorySubCategories = $mainCategories->count() > 0 ? $mainCategories->first()->sub_catagories : $mainCategories;

            $products = $this->productService->getActiveProductsAdmin($useradmin);
            $sizes = Size::get();
            $cities = City::get();
            // return $products;
            $occasions = Occasion::get();


            return \view('admin.product.create', \compact('mainCategories', 'occasions', 'sizes', 'cities', 'taxes', 'firstMainCategorySubCategories', 'products', 'colors'));
        }
    }


    public function export(Request $request)
    {
        ob_end_clean();
        ob_start();
        $type = $request->type && ($request->type == 'in-stock' || $request->type == 'out-of-stock') ? $request->type : 'all';

        return Excel::download(new ProductExport($type), Carbon::now() . '-products.xlsx');
    }

    public function store(Request $request)
    {

        $request->validate([
            'title_ar' => ['required', 'string', 'min:2', 'unique:products'],
            'title_en' => ['required', 'string', 'min:2', 'unique:products'],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],
            'features_ar' => ['required', 'string', 'min:2'],
            'features_en' => ['required', 'string', 'min:2'],
            'instructions_ar' => ['required', 'string', 'min:2'],
            'instructions_en' => ['required', 'string', 'min:2'],
            'summary_ar' => ['required', 'string', 'min:2'],
            'summary_en' => ['required', 'string', 'min:2'],
            'extras_en' => ['required', 'string', 'min:2'],
            'extras_ar' => ['required', 'string', 'min:2'],
            'keywords_ar' => ['required', 'string', 'min:2'],
            'keywords_en' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'accept' => ['string', Rule::in(['accepted', 'rejected', 'new'])],
            'primary_image' => ['required', 'image', 'max:10240'],
            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'image', 'max:10240'],
            'category_id' => ['required', 'exists:product_categories,id'],
            'taxes.*' => ['nullable', 'exists:taxes,id'],
            'color_id.*' => ['nullable', 'exists:colors,id'],
            'stock' => ['required', 'integer'],
            'fake_price' => ['required', 'integer', 'min:1'],
            'real_price' => ['required', 'integer', 'min:1', 'lt:fake_price'],
            'details_ar' => ['required', 'string', 'min:2'],
            'details_en' => ['required', 'string', 'min:2'],
            'occasion_id.*' => ['required', 'exists:occasions,id'],

        ]);


        if (Auth::guard('admin')->user()->vendor) {


            if (Auth::guard('admin')->user()->vendor->products_count > Auth::guard('admin')->user()->vendor->products->count()) {

                $created = $this->productService->store($request);
                if ($created) {
                    $request->session()->flash('success', 'Product Added SuccessFully');
                } else {
                    $request->session()->flash('failed', 'Something Wrong');
                }
                return redirect('acp/products');
            } else {
                $request->session()->flash('failed', 'You have reached your products limit');
                return redirect('acp/products');
            }
        } else {


            $created = $this->productService->store($request);
            if ($created) {
                $request->session()->flash('success', 'Product Added SuccessFully');
            } else {
                $request->session()->flash('failed', 'Something Wrong');
            }
            return redirect('acp/products');
        }
    }


    public function edit(Request $request, $id)
    {

        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect('acp/products');
        }

        $useradmin = Admin::where('id', Auth::guard('admin')->id())->first();

        if ($useradmin->hasRole('super-admin') || $useradmin->hasRole('admin')) {

            $mainCategories = $this->productCategoryService->getActiveMainCategories();

            $taxes = $this->texService->getActiveTaxes();

            $firstMainCategorySubCategories = $this->productCategoryService->getActiveMainCategories();
            // return $firstMainCategorySubCategories;
            $products = $this->productService->getActiveProducts();

            // $productColors = ProductColor::where('product_id', $id)->pluck('color');
            $cities = City::get();
            $colors = Color::get();
            $sizes = Size::get();
            $occasions = Occasion::get();



            return \view('admin.product.edit', \compact('product', 'cities', 'occasions', 'colors', 'sizes', 'mainCategories', 'taxes', 'firstMainCategorySubCategories', 'products'));
        } else {
            $mainCategories = $this->productCategoryService->getActiveMainCategoriesAdmin($useradmin);
            $taxes = $this->texService->getActiveTaxes();
            $firstMainCategorySubCategories = $this->productCategoryService->subCategoryByParentId($product->category_id);
            $products = $this->productService->getActiveProductsAdmin($useradmin);
            // $productColors = ProductColor::where('product_id', $id)->pluck('color');
            $cities = City::get();
            $colors = Color::get();
            $sizes = Size::get();
            $occasions = Occasion::get();



            return \view('admin.product.edit', \compact('product', 'cities', 'occasions', 'colors', 'sizes', 'mainCategories', 'taxes', 'firstMainCategorySubCategories', 'products'));
        }
    }


    public function update(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect('acp/products');
        }

        $request->validate([

            'title_ar' => ['required', 'string', 'min:2', Rule::unique('products', 'title_ar')->ignore($product->id)],
            'title_en' => ['required', 'string', 'min:2', Rule::unique('products', 'title_en')->ignore($product->id)],
            'description_ar' => ['required', 'string', 'min:2'],
            'description_en' => ['required', 'string', 'min:2'],
            'keywords_ar' => ['required', 'string', 'min:2'],
            'keywords_en' => ['required', 'string', 'min:2'],
            'status' => ['required', 'string', Rule::in([1, 0])],
            'primary_image' => ['nullable', 'image', 'max:10240'],
            'images' => ['nullable', 'array'],
            'images.*' => ['nullable', 'image', 'max:10240'],
            'category_id' => ['required', 'exists:product_categories,id'],
            'taxes.*' => ['nullable', 'exists:taxes,id'],
            'color_id.*' => ['nullable', 'exists:colors,id'],
            'size_id.*' => ['nullable', 'exists:sizes,id'],
            'stock' => ['required', 'integer'],
            'fake_price' => ['required', 'integer', 'min:1'],
            'real_price' => ['required', 'integer', 'min:1', 'lte:fake_price'],
            'details_ar' => ['required', 'string', 'min:2'],
            'details_en' => ['required', 'string', 'min:2'],
            'occasion_id.*' => ['nullable', 'exists:occasions,id'],

        ]);


        $updated = $this->productService->update($request, $product);

        if ($updated) {
            $request->session()->flash('success', 'Product Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }


        return redirect('acp/products');
    }



    public function updatePrice(Request $request, $id)
    {
        $product = $this->productService->getById($id);

        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();
        }
        $validator = Validator::make($request->all(), [
            'fake_price' => ['required', 'integer', 'min:0'],
            'real_price' => ['required', 'integer', 'min:0'],
        ]);

        if ($validator->fails()) {
            $request->session()->flash('failed', 'Something Wrong');
            return redirect()->back();
        }

        $updated = $this->productService->updatePrice($request, $product);

        if ($updated) {
            $request->session()->flash('success', 'Product Price Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect('acp/products');
    }


    public function updateStock(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();
        }
        $validator = Validator::make($request->all(), [
            'stock' => ['required', 'integer', 'min:0'],
        ]);

        if ($validator->fails()) {
            $request->session()->flash('failed', 'Something Wrong');
            return redirect()->back();
        }

        $updated = $this->productService->updateStock($request, $product);

        if ($updated) {
            $request->session()->flash('success', 'Product Stock Updated SuccessFully');
        } else {
            $request->session()->flash('failed', 'Something Wrong');
        }

        return redirect('acp/products');
    }


    public function destroy(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();
        }
        $product->delete();
        $request->session()->flash('success', 'Product Deleted SuccessFully');


        return redirect('acp/products');
    }


    public function restore(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect('acp/products');
        }
        $product->restore();

        $request->session()->flash('success', 'Product Restored SuccessFully');

        return redirect('acp/products');
    }



    public function activation(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect('acp/products');
        }

        $product->status = 1;
        $product->accept = Auth::guard('admin')->user()->vendor ? "new" : "accepted" ;
        $product->save();
        $request->session()->flash('success', 'Product  Status Changed To Active');

        return redirect('acp/products');
    }

    public function inactivation(Request $request, $id)
    {
        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect('acp/products');
        }

        $product->status = '0';
        $product->accept = Auth::guard('admin')->user()->vendor ? "new" : "accepted" ;

        $product->save();
        $request->session()->flash('success', 'Product  Status Changed To InActive');

        return redirect('acp/products');
    }

    public function search(Request $request)
    {

        $request->validate([
            'search' => ['required', 'string'],

        ]);

        $products = $this->productService->adminSearchForProduct($request->search);



        return response()->json($products->toArray());
    }



    public function product_request($status)
    {

        $products = Product::where('accept', $status)->paginate(10);
        return view('admin.product.product_request', compact('products', 'status'));
    }



    public function product_request_accept(Request $request, $id)
    {
        $products = Product::where('id', $id)->update(['accept' => 'accepted']);

        $request->session()->flash('success', 'Product Request Accepted SuccessFully');

        return redirect('acp/product_request/new');
    }

    public function product_request_reject(Request $request, $id)
    {
        $products = Product::where('id', $id)->update(['accept' => 'rejected']);

        $request->session()->flash('success', 'Product Request Accepted SuccessFully');

        return redirect('acp/product_request/new');
    }

    public function show(Request $request, $id)
    {

        $product = $this->productService->getById($id);
        if (!$product) {
            $request->session()->flash('failed', 'Product Not Found');
            return redirect()->back();
        }

        // return $product->occasions ;


        return \view('admin.product.show', \compact('product'));
    }
}
