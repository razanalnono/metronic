<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
   use HasFactory;
   protected $guarded = [];
   protected $hidden = ['created_at', 'updated_at'];


   protected $casts = [
      'attributevalue' => 'json'
   ];

   public function attributeValues()
   {
      return $this->belongsTo(AttributeValues::class, 'attributevalues_id');
   }

   public function product()
   {
      return $this->belongsTo(Product::class);
   }

   public function getAttValueAttribute()
   {
      return AttributeValues::with('attribute')->whereIn('id', json_decode($this->attribute_value))->get();
   }



   public function getAttributeValuesAttribute()
   {
      $attributeValues = AttributeValues::whereIn('id', json_decode($this->attribute_value))->get();
      $attributeValues = $attributeValues->map(function ($attributeValue) {
         $attributeValue->setAttribute('attribute_name', $attributeValue->attribute->name);
         return $attributeValue->only(['attribute_name', 'value']);
      });
      return $attributeValues;
   }
}