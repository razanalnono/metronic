<?php

namespace App\Http\Controllers\API;

use App\Events\AddProductEvent;
use App\Models\Product;
use App\Jobs\EnableProduct;

use App\Traits\apiResponse;
use App\Traits\imageUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Notifications\AddProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    use apiResponse,imageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $model = Product::query()->filter($request);


        $products = $model->orderBy('created_at', 'desc')->paginate(10);

        if ($products->isEmpty()) {
            return $this->apiResponse(null, "Not Found!", 404);
        }
        $data['products']  = ProductResource::collection($products);
        $data['has_more_page'] = $products->hasMorePages();
        return $this->apiResponse($data, 'تم تنفيذ العملية بنجاح');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $image = $request->file('image');
        $folder = 'images/products';
        $image_url = $this->imageUpload($image, $folder);

     $product=Product::create([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => Str::slug($request->name_en),
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description,
            'is_enabled' => $request->is_enabled ?? 0,
            'image' => $image_url
        ]);
        
        event(new AddProductEvent($product));
        
        if ($product) {
            return $this->apiResponse(new ProductResource($product), 'Product added successfully!', Response::HTTP_CREATED);
        }
        return $this->apiResponse(null, 'Error', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->apiResponse(new ProductResource(Product::findOrFail($id)), 'Done', Response::HTTP_OK);
    }
}