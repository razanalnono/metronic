<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public $timestamps = false;
    public $hidden=['deleted_at'];



    public function attributeValues()
    {
        return $this->hasMany(AttributeValues::class);
    }


    public function getNameAttribute()
    {
        return json_decode($this->attributes['name']);
    }
    

}