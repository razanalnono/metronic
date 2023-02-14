<?php

namespace App\Http\Resources;

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
        return [
            'id'       => $this->id,
            'name'     => $this->name,
            'slug'     => $this->slug,
            'quantity' => $this->quantity,
            'price'    =>  $this->price,
            'image'    => $this->image,
            'category' => [
                            'category_id'=>    $this->category->id,
                            'category_name'=>  $this->category->name]
        ];
    }
}