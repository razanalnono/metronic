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


        // foreach ($request->attribute_values as $attributeId => $valueIds) {
        //     foreach ($valueIds as $valueId) {
        //         $attributeValue = new AttributeValues;
        //         $attributeValue->attribute_id = $attributeId;
        //         $attributeValue->value_id = $valueId;
        //         $attributeValue->product_variant_id = $productVariant->id;
        //         $attributeValue->save();
        //     }
        // }

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
    public function update(Request $request, ProductVariants $productVariants)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductVariants  $productVariants
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVariants $productVariants)
    {
        //
    }
}