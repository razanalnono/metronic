<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded=[];
    
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Default Customer'
        ]);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id', 'id', 'id')
            ->using(OrderItem::class)
            ->as('order_item')
            ->withPivot([
                'price', 'quantity'
            ]);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }


    public function addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }

}