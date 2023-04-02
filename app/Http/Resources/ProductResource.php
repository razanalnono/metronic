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

        // $product = Product::with('variations.attributes')->findOrFail($request->id);


        return [
            'id' => $this->id,
            'category' => $this->category->name,
            'price' => $this->price,
            'description' => $this->description,
            'image' => asset($this->image),
            'variation' => $this->productVariants


        ];
    }
}
