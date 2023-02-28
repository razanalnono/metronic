<?php

namespace App\Http\Resources;

use App\Models\Product;
use App\Http\Resources\VariationResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $product = Product::with('variations.attributes')->findOrFail($request->id);


        return [
            'id' => $this->id,
            'product_id' => $product->id,
            'category'=> $product->category->name,
            'price'=>$product->price,
            'description'=>$product->description,
            'image'=>asset($product->image),
            'variation'=>$product->variations
            
            
           
        ];
    }

    
}