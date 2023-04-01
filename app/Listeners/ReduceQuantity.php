<?php

namespace App\Listeners;

use Throwable;
use App\Models\Cart;
use App\Models\Variation;
use App\Events\OrderCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReduceQuantity
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
     * @param  object  $event
     * @return void
     */
    public function handle(OrderCreated $event)
    {

        $order = $event->order;
        $quantity=$order->quantity;
    return 5;
        try {
            foreach ($order->items as $order_item) {
                $order_item->product->decrement('quantity', $quantity);
            }
        } catch (Throwable $e) {

            return $e;
        }
    }
}