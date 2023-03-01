<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Variation;
use App\Traits\imageUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VariationValue;
use App\Models\ProductVariants;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use imageUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $attributes = Attribute::all();
        $variants = ProductVariants::with(['product', 'attributeValues'])->get();
        $categories = Category::all();
        $products = Product::with('category')->get();
        return view('products_js.index', compact('products', 'categories','attributes','variants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
       
        $image = $request->file('image');
        $folder = 'images/products';
        $image_url = $this->imageUpload($image, $folder);

        $product =  Product::create([
            'name' => ['en' => $request->name_en, 'ar' => $request->name_ar],
            'slug' => Str::slug($request->name_en),
            'category_id' => $request->category_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'description' => $request->description,
            'is_enabled' => $request->is_enabled ? 1 : 0,
            'is_stockable' => $request->is_stockable ? 1 : 0,
            'image' => $image_url
        ]);



        if ($request->have_variation) {
            // $product = $product->id;
            $original_quantity = $product->quantity;
            $request->validate([
                'quantity' => "integer|max:$original_quantity"
            ]);
            foreach ($request->attributevalues_id as $variationvalue_id) {
                ProductVariants::create([
                    'product_id' => $product->id,
                    'quantity' => $request->var_quantity,
                    'price' => $request->var_price,
                    'attributevalues_id' => $variationvalue_id,
                ]);
            }


        return response()->json([
            'status' => 'success',
        ]);
        }}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $product = Product::findOrFail($id);
        //$cartItems = Cart::where('user_id', auth()->id())->get();

        //To get all the attribute variations for specific product
        $productVariations = Variation::where('product_id', $id)->get();
        $variationValues = VariationValue::whereIn('variation_id', $productVariations->pluck('id'))->get();
        $attributeIds = $variationValues->pluck('attribute_id')->unique();
        $attributes = Attribute::whereIn('id', $attributeIds)->get(['id', 'name']);



        return response()->view('Front.show',compact(['product','attributes']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        Product::where('id', $request->up_id)->update([
            'name' => ['en' => $request->up_name_en, 'ar' => $request->up_name_ar],
            'slug' => Str::slug($request->up_name_en),
            'quantity' => $request->up_quantity,
            'price' => $request->up_price,
            'category_id' => $request->up_category_id,
            'description' => $request->up_description,
            'is_enabled' => $request->up_is_enabled ? 1 : 0,
            'image' => $request->up_image,
        ]);

        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
          Product::findOrFail($request->product_id)->delete();
     
      
        return response()->json([
            'status' => 'success'
        ]);

    
    }

    public function trash(){

        $categories = Category::all();
        $products = Product::with('category')->onlyTrashed()->get();
        return view('products_js.trash', compact('products', 'categories'));
        
}

public function restore(Request $request,$id){
 $product=Product::onlyTrashed()->findOrFail($id);
 $product->restore();
$view=view('products_js.trash');
 return response()->json([
    'view' => $view,
    'status' => 'success'
    
 ]);
}

    public function forceDelete($id){
        $product=Product::onlyTrashed()->findOrFail($id);
       $images= $product->image;
       $product->forceDelete();
       if($product->image){
        Storage::disk('images')->delete($product->image);
       }
    }

}