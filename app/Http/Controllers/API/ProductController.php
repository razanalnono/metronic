<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Models\Attribute;
use App\Models\Variation;

use App\Jobs\EnableProduct;
use App\Traits\apiResponse;
use App\Traits\imageUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Events\AddProductEvent;
use App\Models\AttributeValues;
use App\Models\ProductVariants;
use App\Notifications\AddProduct;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use Symfony\Component\HttpFoundation\Response;
use League\CommonMark\Extension\Attributes\Node\Attributes;

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

        $product = Product::with('productVariants')->where('id', $id)->first();
        $variants = $product->productVariants->map(function ($variant) {
            return [
                'id' => $variant->id,
                'attribute_values' => $variant->attributeValues,
                'price' => $variant->price,
                'quantity' => $variant->quantity
            ];
        });
        $result = [
            'product' => [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'category_id' => $product->category_id
            ],
            'variants' => $variants
        ];

        return response()->json($result);

    }





}