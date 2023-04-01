<?php

namespace App\Models;

use Exception;
use Carbon\Carbon;
use App\Models\OrderCase;
use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    const STATUS_DRAFT = 'draft';
    const STATUS_PENDING = 'pending';
    const STATUS_COMPLETED = 'completed';
    public const STATUS_PAID = 'Paid';

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


    public function stock()
    {
        return $this->morphMany(Stock::class, 'refernece');
    }

    public function cases()
    {
        return $this->hasOne(OrderLog::class, 'order_id');
    }


    public function logs()
    {
        return $this->hasMany(OrderLog::class, 'order_id');
    }


    public function prices()
    {
        return $this->hasMany(OrderPrices::class);
    }


    public function payment_type()
    {
        return $this->belongsTo(PaymentType::class, 'payment_types_id');
    }

    // public function getNameProduct()
    // {
    //     return json_decode($this->products['name']);
    // }



    public function cancel()
    {
        // Update order status to "cancelled"
        $this->status = 'cancelled';
        if ($this->status === "cancelled") {
            $this->payment_method = "";
            $this->shipping = 0;
            $this->tax = 0;
            $this->discount = 0;
            $this->total = 0;
        }
        $this->save();

        // Insert a new record in orderLog table
        $orderLog = new OrderLog();
        $orderLog->order_id = $this->id;
        $orderLog->order_cases_id = 6; 
        $orderLog->save();

        // Return quantity to stock
        $totalQuantityReturned = 0;
        if ($this->relationLoaded('items')) {
            foreach ($this->items as $item) {
                $product = $item->product;
                $variantId = $item->product_variant_id;
                $quantity = $item->quantity;

                $totalQuantityReturned += $quantity;
                if ($product->is_stockable) {
                    $stockQuery = Stock::where('product_id', $product->id);

                    if ($variantId) {
                        $stockQuery->where('product_variant_id', $variantId);
                    }

                    $stock = $stockQuery->firstOrFail();

                    $stock->create([
                        'product_id' => $product->id,
                        'product_variants_id' => $variantId ?? null,
                        'quantity' => $quantity,
                        'movement' => 'push',
                        'refernece_id' => $this->id,
                        'refernece_type' => $this->getMorphClass(),
                    ]);
                }
            }
        }

        return $totalQuantityReturned;
    }








}