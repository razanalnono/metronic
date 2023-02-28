<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationValue extends Model
{
    use HasFactory;

    protected $guarded=[];
    protected $timestamp = false;
    protected $hidden = ['created_at','updated_at','deleted_at'];



    public function variation(){
        return $this->belongsTo(Variation::class);
   }


    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}