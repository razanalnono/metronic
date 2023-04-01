<?php

namespace App\Listeners;

use App\Models\Stock;
use App\Events\QuantityAdded;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddQunatity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\QuantityAdded  $event
     * @return void
     */
    public function handle(QuantityAdded $event)
    {
  
        $product = $event->product;
        if ($product->is_stockable) {
            $stock = Stock::where('product_id', $product->id)->first();

            if (!$stock) {
                Stock::create([
                    'product_id' => $product->id,
                    'quantity' => $product->quantity,
                    'product_variants_id' => $product->product_variants_id ?? null,
                    'movement' => 'push',
                ]);

            } 
        }
    
    }
}