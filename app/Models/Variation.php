<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Variation extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['product_id','attribute_id','value','price','quantity','image'];
    protected $timestamp=false;
    protected $hidden = ['created_at', 'updated_at', 'deleted_at','attribute_id' ,'value'];



    public function product()
    {
        return $this->belongsTo(Product::class);
    }


    public function attributes(){
        return $this->belongsToMany(Attribute::class,'variation_values')
        ->withPivot(['value'])
        ->as('attributes_value');
        }


    public function variationValues()
    {
        return $this->hasMany(VariationValue::class);
    }

    public function values(){
        return $this->hasMany(VariationValue::class);
    }

  
    
    //Variation (Belongs To) Attribute
    // public function attributes(){
    //     return $this->belongsTo(Attribute::class);
    // }
    
    // public function options()
    // {
    //     return $this->belongsToMany(Attribute::class, 'variations_attributes')
    //     ->withPivot(['value'])
    //     ->as('option');
    // }
}