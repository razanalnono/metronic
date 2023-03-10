<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeValues extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $hidden = ['created_at', 'updated_at'];

    public function attribute(){
        return $this->belongsTo(Attribute::class);
    }

    public function variants(){
        return $this->hasMany(ProductVariants::class);
    }
    
}