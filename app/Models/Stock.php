<?php

namespace App\Models;

use App\Models\Product;
use App\Models\AttributeValues;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;
    public $guarded=[];

    public function refernece():MorphTo
    {
        return $this->morphTo();
    }


    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function variants(){
        return $this->belongsTo(ProductVariants::class,'product_variants_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getNameProduct()
    {
        return json_decode($this->product['name']);
    }


    public function getAttValueAttribute()
    {
        return AttributeValues::with('attribute')->whereIn('id', json_decode($this->attribute_value))->get();
    }

    // public function availableQuantity()
    // {

    //     $pushQuantity = $this->where('product_id', $this->product_id)
    //         ->where('movement', 'push')
    //         ->sum('quantity');
    //     $pullQuantity = $this->where('product_id', $this->product_id)
    //         ->where('movement', 'pull')
    //         ->sum('quantity');

    //     return $pushQuantity - $pullQuantity;
    // }


}