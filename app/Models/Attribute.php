<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;

    public $guarded=[];

    public function variations()
    {
        return $this->belongsToMany(Variation::class, 'variations_attributes')
        ->withPivot(['value'])
        ->as('option');
    }
    
}