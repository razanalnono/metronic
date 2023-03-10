<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\AttributeValues;
use App\Models\ProductVariants;

class ProductVariantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes=Attribute::all();
        $products=Product::all();
        $variants = ProductVariants::with(['product', 'attributeValues'])->get();

        return view('ProductVariants.index', compact('variants','products','attributes'));
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

        foreach ($request->attributevalues_id as $variationvalue_id) {
            ProductVariants::create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'price' => $request->price,
                'attributevalues_id' => $variationvalue_id,
            ]);
        }


        return response()->json([
            'message' => 'success',
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductVariants  $productVariants
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVariants $productVariants)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductVariants  $productVariants
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVariants $productVariants)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductVariants  $productVariants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $variant = ProductVariants::findOrFail($request->up_id);
        $variant->quantity = $request->up_quantity;
        $variant->price = $request->up_price;
        $variant->save();

        return response()->json(['status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVariants  $productVariants
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        ProductVariants::find($request->variant_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    
    }
}