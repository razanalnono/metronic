<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Attribute;

use App\Models\Variation;
use App\Traits\imageUpload;
use Illuminate\Http\Request;
use App\Models\VariationValue;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class VariationController extends Controller
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
 

        $products = Product::all();
        $attributes= Attribute::all();

        // $variations=Variation::with(['product:name', 'attributes:name'])->get();


        // $attributes = DB::table('attributes')
        // ->join('variation_values','attributes.id','=','variation_values.attribute_id')
        // ->get(['attributes.name','variation_values.value']);




        $variations = Variation::with(['attributes:name'])->get();
        $variationArray = json_decode($variations, true);

        // if (isset($variationArray['attributes'])) {
        //     $name = $variationArray['attributes']['name'];
        //     $value = $variationArray['attributes']['attributes_value']['value'];
        //     echo $name . ': ' . $value; // Output: color: red
        // } else {
        //     echo 'No attributes found.';
        // }
        
        return view('variation.index', compact('variations','products','attributes'));
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
    public function store(Request $request)
    {
        //

        $product = Product::find($request->product_id);
        $original_quantity = $product->quantity;
        $request->validate([
            'quantity' => "integer|max:$original_quantity"
        ]);

        $image = $request->file('image');
        $folder = 'images/products';
        $image_url = $this->imageUpload($image, $folder);

        // Create the variation
        $variation = Variation::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'image' => $image_url,
        ]);

        $attributes = $request->input('attributes');
        $values = $request->input('value');

        // Loop through the attributes and values and create a VariationValue record for each one
        foreach ($attributes as $key => $attribute_id) {
            $value = $values[$key];

            $variationValue = new VariationValue;
            $variationValue->variation_id = $variation->id;
            $variationValue->attribute_id = $attribute_id;
            $variationValue->value = $value;
            $variationValue->save();
        }

        return response()->json([
            'status' => 'success',
        ]);
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


 
        
        $variation = Variation::where('id',$request->up_id)->first();

        if (!$variation) {
            return response()->json(['error' => 'Variation not found'], 404);
        }

        // Update the variation with the new values
        $variation->product_id = $request->up_product_id;
        $variation->quantity = $request->up_quantity;
        $variation->price = $request->up_price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $folder = 'images/products';
            $image_url = $this->imageUpload($image, $folder);
            $variation->image = $image_url;
        }

        $variation->save();

        // Update the variation value with the new values
        $variationValue = VariationValue::where('variation_id', $variation->id)->first();

        if (!$variationValue) {
            return response()->json(['error' => 'Variation value not found'], 404);
        }

        $variationValue->attribute_id = $request->up_attribute_id;
        $variationValue->value = $request->up_value;
        $variationValue->save();

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
        //

        Variation::find($request->variation_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}