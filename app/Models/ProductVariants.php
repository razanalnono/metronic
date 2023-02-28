<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariants extends Model
{
    use HasFactory;
     protected $guarded=[];


     
   public function attributeValues()
   {
      return $this->belongsTo(AttributeValues::class,'attributevalues_id');
   }

   public function product()
   {
      return $this->belongsTo(Product::class);
   }

}