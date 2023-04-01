<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLog extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function case(){
        return $this->belongsTo(OrderCase::class,'order_cases_id');
    }

    public function order(){
        return $this->belongsTo(Order::class);

    }

    
}