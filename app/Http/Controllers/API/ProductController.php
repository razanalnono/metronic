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

    use apiResponse, imageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */


    /**
     * @OA\Get(
     *      path="/api/products",
     *      operationId="getProducts",
     *      tags={"Products"},
     *      summary="Get a list of products",
     *      description="Returns a list of products",
     *      @OA\Parameter(
     *          name="page",
     *          in="query",
     *          description="The page number to retrieve",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *              default=1
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="limit",
     *          in="query",
     *          description="The number of items to retrieve per page",
     *          required=false,
     *          @OA\Schema(
     *              type="integer",
     *              default=10
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="search",
     *          in="query",
     *          description="The search term to filter by",
     *          required=false,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response="200",
     *          description="Success",
     *       
     *          )
     *      )
     *      )
     * )
     */

    public function index(Request $request)
    {

        $model = Product::filter($request);


        $products = $model->orderBy('created_at', 'desc')->paginate(10);
        $data['has_more_page'] = $products->hasMorePages();

        $data['products']  = ProductResource::collection($products);
        return $this->apiResponse($data, 'تم تنفيذ العملية بنجاح');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post(
     *     path="/api/products",
     *     tags={"Products"},
     *     summary="Create a new product",
     *     description="Create a new product.",
     *     operationId="createProduct",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     property="name_en",
     *                     type="string",
     *                     description="The name of the product in English"
     *                 ),
     *                 @OA\Property(
     *                     property="name_ar",
     *                     type="string",
     *                     description="The name of the product in Arabic"
     *                 ),
     *                 @OA\Property(
     *                     property="category_id",
     *                     type="integer",
     *                     description="The ID of the category that the product belongs to"
     *                 ),
     *                 @OA\Property(
     *                     property="quantity",
     *                     type="integer",
     *                     description="The quantity of the product"
     *                 ),
     *                 @OA\Property(
     *                     property="price",
     *                     type="number",
     *                     format="float",
     *                     description="The price of the product"
     *                 ),
     *                 @OA\Property(
     *                     property="description",
     *                     type="string",
     *                     description="The description of the product"
     *                 ),
     *                 @OA\Property(
     *                     property="is_enabled",
     *                     type="boolean",
     *                     description="Whether the product is enabled or not"
     *                 ),
     *                 @OA\Property(
     *                     property="image",
     *                     type="file",
     *                     description="The image of the product"
     *                 )
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Product created successfully",
     *    
     *     )
     * )
     */
    public function store(ProductRequest $request)
    {
        $image = $request->file('image');
        $folder = 'images/products';
        $image_url = $this->imageUpload($image, $folder);

        $product = Product::create([
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

    /**
     * @OA\Get(
     *      path="/api/products/{id}",
     *      operationId="getProductById",
     *      tags={"Products"},
     *      summary="Get product by ID",
     *      description="Returns a single product with its variants",
     *      @OA\Parameter(
     *          name="id",
     *          description="ID of the product to return",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  property="product",
     *                  type="object",
     *                  @OA\Property(
     *                      property="id",
     *                      type="integer",
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="description",
     *                      type="string",
     *                  ),
     *                  @OA\Property(
     *                      property="category_id",
     *                      type="integer",
     *                  )
     *              ),
     *              @OA\Property(
     *                  property="variants",
     *                  type="array",
     *                  @OA\Items(
     *                      @OA\Property(
     *                          property="id",
     *                          type="integer"
     *                      ),
     *                      @OA\Property(
     *                          property="attribute_values",
     *                          type="array",
     *                          @OA\Items(
     *                              type="object",
     *                              @OA\Property(
     *                                  property="id",
     *                                  type="integer"
     *                              ),
     *                              @OA\Property(
     *                                  property="value",
     *                                  type="string"
     *                              ),
     *                              @OA\Property(
     *                                  property="attribute_id",
     *                                  type="integer"
     *                              )
     *                          )
     *                      ),
     *                      @OA\Property(
     *                          property="price",
     *                          type="number",
     *                          format="float"
     *                      ),
     *                      @OA\Property(
     *                          property="quantity",
     *                          type="integer"
     *                      )
     *                  )
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Product not found"
     *      )
     * )
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
