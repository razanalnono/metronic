<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\AttributeValues;

class AttributeValuesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
  
        $attributes=Attribute::all();
        $attributeValues=AttributeValues::with('attribute')->get();
        return response()->view('attributeValues.index',compact('attributeValues','attributes'));
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

        $request->validate([
            'attribute_id' =>'required',
           'value' =>'required',
        ]);
        
        AttributeValues::create(
            [
                'attribute_id' => $request->attribute_id,
                'value'=>$request->value
            ]
        );
        return response()->json([
            'message' => 'success',
        ]);    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AttributeValues  $attributeValues
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeValues $attributeValues)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AttributeValues  $attributeValues
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeValues $attributeValues)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AttributeValues  $attributeValues
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        AttributeValues::where('id', $request->up_id)->update([
            'attribute_id'=>$request->attribute_id,
            'value' => $request->up_value,

        ]);

        return response()->json([
            'status' => 'success',
        ]);    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AttributeValues  $attributeValues
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //

        AttributeValues::find($request->attributeValue_id)->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }
}