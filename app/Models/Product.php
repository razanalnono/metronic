<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Variation;
use App\Traits\imageUpload;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, HasTranslations, SoftDeletes,imageUpload;

    protected $guarded = [];
    protected $hidden = ['created_at', 'updated_at'];
    public $translatable = ['name'];

 
  
    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'is_enabled' => 0,
        ]);
    }


    public function attributeValues(){
        return $this->hasMany(AttributeValues::class);
    }
    
    public function productVariants()
    {
        return $this->hasMany(ProductVariants::class);
    }




    //local scope

    public function scopeFilter($query, $request)
    {
        return $query->when($request->name ?? null, function ($query, $name) use ($request) {
            $query->where('name->en', 'LIKE', "%{$request->name}%")
                ->orWhere('name->ar', 'LIKE', "%{$request->name}%");
        })->when($request->min_price ?? null, function ($query, $min_price) {
            $query->where('price', '>=', $min_price);
        })->when($request->max_price ?? null, function ($query, $max_price) {
            $query->where('price', '<=', $max_price);
        })->when($request->category_id ?? null, function ($query, $category_id) {
            $query->whereHas('category', function ($q) use ($category_id) {
                $q->where('id', $category_id);
            });
        });
    }




}