<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory, HasTranslations;

    // protected $fillable=['name','slug','parent_id'];
    protected $guarded = [];
    protected  $hidden = ['created_at', 'updated_at'];
    public $translatable = ['name'];


    public function products(){
        return $this->hasMany(Product::class);
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id')
            ->withDefault([
                'name' => '-'
            ]);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    
}