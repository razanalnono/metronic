<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\Variation;
use App\Traits\imageUpload;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\VariationValue;
use App\Models\AttributeValues;
use App\Models\ProductVariants;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

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
  
        $categories = Category::all();
        $attributes = Attribute::all();
        $variants = ProductVariants::with(['product'])->get();
       $variant = ProductVariants::all();
        $products=Product::all();
        return view('products_js.index', compact('variants', 'attributes', 'categories','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();
        $attributes = Attribute::all();
        $variants = ProductVariants::with(['product'])->get();
        $variant = ProductVariants::all();
        $products = Product::all();
        

        return view('products_js.create', compact('variants', 'attributes', 'categories', 'products'));


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

        try {
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

            // Initialize an empty array to store the attribute values
            if($request->have_variation){
            $attribute_values = $request->attribute_values;

            $result = [
                "attributevalue" => [],
                "attribute_values" => []
            ];

         //   $attribute_count = count($attribute_values);

            foreach ($attribute_values as $attribute_id => $values) {
                // Add the attribute values to the result array
                $result["attribute_values"][$attribute_id] = $values;
                // Loop through each value
                foreach ($values as $value) {
                    // Add the value to the attributevalue array
                    $result["attributevalue"][] = $value;
                }
            }

            // Create all possible combinations of the attribute values
            $combinations = [];
            foreach ($result["attribute_values"] as $values) {
                if (empty($combinations)) {
                    foreach ($values as $value) {
                        $combinations[] = [$value];
                    }
                } else {
                    $new_combinations = [];
                    foreach ($combinations as $combination) {
                        foreach ($values as $value) {
                            $new_combination = array_merge($combination, [$value]);
                            $new_combinations[] = $new_combination;
                        }
                    }
                    $combinations = $new_combinations;
                }
            }

            // Create a product variant for each selected value
            foreach ($combinations as $combination) {
                ProductVariants::create([
                    'product_id' => $product->id,
                    'attribute_value' => json_encode($combination),
                ]);
            }
        }
            // Convert the attribute values array to a JSON string and store it in the product's attributes field
            $product->save();

            return response()->json([
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            // If an error occurs during the creation of product variants, delete the product and return an error message
            if (isset($product)) {
                $product->delete();
            }

            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
            ]);
        }

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

        $product = Product::findOrFail($id);
        //$cartItems = Cart::where('user_id', auth()->id())->get();

        //To get all the attribute variations for specific product
      $variants= ProductVariants::with('product')->get();



        return response()->view('Front.show', compact(['product', 'attributes']));
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
    public function update(Request $request,$id)
    {
        $product=   Product::findOrFail($id);
        $old_image=$product->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $folder = 'images/products';
            $image_url = $this->imageUpload($image, $folder);
            $data['image']=$image_url;
        }
        $product->update($data); 
        if($old_image && isset($data['image'])){
            Storage::disk('public')->delete($old_image);
        }
        
        Product::where('id', $request->up_id)->update([
            'name' => ['en' => $request->up_name_en, 'ar' => $request->up_name_ar],
            'slug' => Str::slug($request->up_name_en),
            'quantity' => $request->up_quantity,
            'price' => $request->up_price,
            'category_id' => $request->up_category_id,
            'description' => $request->up_description,
            'is_enabled' => $request->up_is_enabled ? 1 : 0,
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
        $product = Product::findOrFail($request->product_id);

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return response()->json([
            'status' => 'success'
        ]);
    }

    

    public function trash()
    {

        $categories = Category::all();
        $products = Product::with('category')->onlyTrashed()->get();
        return view('products_js.trash', compact('products', 'categories'));
    }

    public function restore(Request $request, $id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        $view = view('products_js.trash');
        return response()->json([
            'view' => $view,
            'status' => 'success'

        ]);
    }

    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $image = $product->image;
        $product->forceDelete();
        if ($image) {
            $path = public_path($image);
            if (file_exists($path)) {
                unlink($path);
            }
        }
    }


}