<?php

namespace App\Listeners;

use App\Models\Stock;
use App\Models\Product;
use App\Models\OrderItem;
use App\Events\OrderCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AddToStock
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
     * @param  \App\Events\OrderCreated  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {
        $order=$event->order;
        $items=$event->items;
        
        $total=0;
        foreach ($items as $itemData) {
            $product = Product::find($itemData['product_id']);

            if (!$product) {
                throw new \Exception('Invalid request. Product not found.');
            }

            $stockQuery = Stock::where('product_id', $product->id);

            if (isset($itemData['product_variants_id'])) {
                $stockQuery->where('product_variants_id', $itemData['product_variants_id']);
            }

            $stock = $stockQuery->first();

            if (!$stock || $stock->quantity <= 0) {
                throw new \Exception('Product or variant is out of stock.');
            }

            if ($stock->quantity < $itemData['quantity']) {
                throw new \Exception('Not enough quantity in stock.');
            }

            $item = new OrderItem();
            $item->order_id = $order->id;
            $item->product_id = $product->id;
            $item->product_name = $product->name;
            $item->price = $product->price;
            $item->quantity = $itemData['quantity'];
            $item->product_variants_id = $itemData['product_variants_id'] ?? null;
            $item->save();

            $stock = Stock::where('product_id', $itemData['product_id'])->first();
            $stock->quantity -= $itemData['quantity'];
            $stock->save();

            $total += $order->shipping + $order->tax - $order->discount;
            $order->total = $total;
            $order->save();


        }
        $stockMovement = new Stock([
            'product_id' => $item->product_id,
            'quantity' => $stock->quantity,
            'product_variants_id' => $item->product_variants_id,
            'movement' => 'pull',
        ]);

        $order->stock()->save($stockMovement);

            
    }
}