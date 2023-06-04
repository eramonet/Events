<?php

namespace App\Services;

use App\Models\Product;
use App\Helper\UploadHelper;
use App\Models\Admin;
use App\Models\ProductColor;
use App\Models\ProductSize;
use App\Models\ProductTax;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Request;


class ProductService
{



    protected $product;
    public function __construct(Product $product)
    {

        $this->product = $product;
    }

    public function getAll(Request $request)
    {

        $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ? true : false;
        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';

        $type = $request->type && ($request->type == 'in-stock' || $request->type == 'out-of-stock') ? $request->type : 'all';


        $countries = $this->product::with(['admin', 'category', 'main_category'])
            ->withCount('reviews')
            ->where(function ($query) use ($request) {
                return $query->when($request->search, function ($q) use ($request) {
                    return $q->where('title_ar', 'like', '%' . $request->search . '%')
                        ->orWhere('title_en', 'like', '%' . $request->search . '%');
                });
            })

            ->when($type == 'in-stock', function ($q) {
                return $q->inStock();
            })
            ->when($type == 'out-of-stock', function ($q) {
                return $q->outOfStock();
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
                    return $q->where('category_id', $request->category_id);
                });
            })

            ->where(function ($query) use ($request) {
                return $query->when($request->category_id, function ($q) use ($request) {
                    return $q->where('category_id', $request->category_id);
                });
            })

            ->where(function ($query) use ($request) {
                return $query->when($request->product_id, function ($q) use ($request) {
                    return $q->where('id', $request->product_id);
                });
            })

            ->where(function ($query) use ($request, $status) {
                return $query->when($status, function ($q) use ($request) {
                    return $q->whereStatus($request->status);
                });
            })


            ->orderBy('created_at', $order)
            ->accept()
            ->paginate($limit)
            ->withQueryString();


        return $countries;
    }

    public function getAllAdmin(Request $request, $useradmin)
    {


        $status = isset($request->status) && ($request->status == 0 || $request->status == 1) ? true : false;
        $deleted = isset($request->deleted) && $request->deleted == 0 ? 1 : null;
        $limit = isset($request->limit) && filter_var($request->limit, FILTER_VALIDATE_INT) ? $request->limit : 5;
        $order = isset($request->order) && $request->order == 'ASC' ? 'ASC' : 'DESC';

        $type = $request->type && ($request->type == 'in-stock' || $request->type == 'out-of-stock') ? $request->type : 'all';


        $countries = $this->product::with(['admin', 'category', 'main_category'])
            ->withCount('reviews')
            ->where('admin_id', $useradmin->id)
            ->where(function ($query) use ($request) {
                return $query->when($request->search, function ($q) use ($request) {
                    return $q->where('title_ar', 'like', '%' . $request->search . '%')
                        ->orWhere('title_en', 'like', '%' . $request->search . '%');
                });
            })

            ->when($type == 'in-stock', function ($q) {
                return $q->inStock();
            })
            ->when($type == 'out-of-stock', function ($q) {
                return $q->outOfStock();
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
                    return $q->where('category_id', $request->category_id);
                });
            })

            ->where(function ($query) use ($request) {
                return $query->when($request->category_id, function ($q) use ($request) {
                    return $q->where('category_id', $request->category_id);
                });
            })

            ->where(function ($query) use ($request) {
                return $query->when($request->product_id, function ($q) use ($request) {
                    return $q->where('id', $request->product_id);
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
    public function store(Request $request)
    {
        $data = $request->only([
            'title_ar',
            'title_en',
            'description_ar',
            'description_en',
            'keywords_ar',
            'keywords_en',
            'primary_image',
            'details_ar',
            'details_en',
            'fake_price',
            'real_price',
            'stock',
            'status',
            'in_stock',
            'category_id',
            'features_ar',
            'features_en',
            'instructions_ar',
            'instructions_en',
            'summary_ar',
            'summary_en',
            'extras_ar',
            'extras_en',
            'offer_end_at' ,
            'model_number',
            'limitation',
        ]);

        $request->all() ;

        $data['admin_id'] = Auth::guard('admin')->id();
        if( Auth::guard('admin')->user()->vendor){
            $data['admin_id'] = Auth::guard('admin')->user()->vendor->id;
        }

        $data["accept"] = Auth::guard('admin')->user()->vendor ? "new" : "accepted" ;
        $data["status"] = Auth::guard('admin')->user()->vendor ? 0 : 1 ;


        $product = $this->product::create($data);

        if ($request->input('taxes')) {
            foreach( $request->input('taxes') as $tax ){
                ProductTax::create([
                    "tax_id" => $tax ,
                    "product_id" => $product->id
                ]);
            }
        }

        if ($request->input('occasion_id')) {
            $product->occasions()->attach($request->occasion_id);
        }

        if ($request->input('products_with')) {
            $product->products_with()->attach($request->products_with);
        }

        if ($request->input('color_id')) {
            $product->colors()->attach($request->color_id);
        }

        if ($request->hasFile('primary_image')) {
            $imageName = UploadHelper::upload('products_images', $request->file('primary_image'), config('imageDimensions.products.width'), config('imageDimensions.products.height'));

            $product->primary_image = $imageName;
        }

        if ($request->hasFile('images')) {


            foreach ($request->images as $image) {
                $imageName = UploadHelper::upload('products_images', $image, config('imageDimensions.products.width'), config('imageDimensions.products.height'));

                $product->media()->create(['image' => $imageName]);
            }
        }

        $product->save();


        return true;
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->only([
            'title_ar',
            'title_en',
            'description_ar',
            'description_en',
            'keywords_ar',
            'keywords_en',
            'primary_image',
            'details_ar',
            'details_en',
            'fake_price',
            'real_price',
            'stock',
            'status',
            'in_stock',
            'category_id',
            'features_ar',
            'features_en',
            'instructions_ar',
            'instructions_en',
            'summary_ar',
            'summary_en',
            'extras_ar',
            'extras_en' ,
            'offer_end_at',
            'model_number',
            'limitation',
        ]);

        $data["accept"] = Auth::guard('admin')->user()->vendor ? "new" : "accepted" ;


        $product->update($data);
        // $product->taxes()->sync($request->taxes);

        if(  $request->taxes && count( $request->taxes ) > 0 ){
            foreach( $product->taxes as $taxe ){
                $taxe->delete() ;
            }

            foreach( $request->taxes as $tax ){
                ProductTax::create([
                    "tax_id" => $tax ,
                    "product_id" => $product->id
                ]);
            }

        }
        $product->products_with()->sync($request->products_with);
        $product->sizes()->sync($request->size_id);

        $product->colors()->sync($request->color_id);


        if ($request->hasFile('primary_image')) {

            if (File::exists(public_path('uploads/products_images/' . $product->primary_image))) {

                Storage::disk('public_uploads')->delete('products_images/' . $product->primary_image);
            }
            $imageName = UploadHelper::upload('products_images', $request->file('primary_image'), config('imageDimensions.products.width'), config('imageDimensions.products.height'));

            $product->primary_image = $imageName;
        }

        if ($request->hasFile('images')) {

            foreach ($product->media as $media) {
                if (File::exists(public_path('uploads/products_images/' . $media->image))) {

                    Storage::disk('public_uploads')->delete('products_images/' . $media->image);
                }
            }
            $product->media()->delete();
            foreach ($request->images as $image) {
                $imageName = UploadHelper::upload('products_images', $image, config('imageDimensions.products.width'), config('imageDimensions.products.height'));

                $product->media()->create(['image' => $imageName]);
            }
        }
        $product->save();

        return $product ? true : false;
    }


    public function updatePrice(Request $request, Product $product)
    {
        $product->accept = Auth::guard('admin')->user()->vendor ? "new" : "accepted" ;

        $product->real_price = $request->real_price;
        $product->fake_price = $request->fake_price;
        $product->save();
        return $product ? true : false;
    }

    public function updateStock(Request $request, Product $product)
    {
        $product->accept = Auth::guard('admin')->user()->vendor ? "new" : "accepted" ;
        $product->stock = $request->stock;
        $product->save();
        return $product ? true : false;
    }





    public function getById(int $id)
    {
        return  $this->product::withTrashed()->find($id);
    }



    public function getActiveProducts()
    {
        return  $this->product::whereStatus(1)->latest()->get();
    }

    public function getActiveProductsAdmin($useradmin)
    {
        return  $this->product::where('admin_id', $useradmin->id)->whereStatus(1)->latest()->get();
    }

    public function adminSearchForProduct(string $search){

        return  $this->product::where( 'id' ,'like' ,'%' .$search .'%')
        ->orWhere('title_ar' ,'like' ,'%' .$search .'%')
        ->orWhere('title_en' ,'like' ,'%' .$search .'%')
        ->limit(50)
        ->get();
     }
}
