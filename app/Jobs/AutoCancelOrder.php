<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Stock;
use App\Models\OrderLog;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AutoCancelOrder implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */

    public function handle()
    {
       
   
        $orders = Order::with('items')->whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('order_logs')
                ->whereRaw('orders.id = order_logs.order_id')
                ->where('order_logs.order_cases_id', 7)
                ->where('orders.created_at', '>=', now()->subHours(2));
        })->get();

        foreach ($orders as $order) {

            $existingLog = OrderLog::where('order_id', $order->id)
                ->where('order_cases_id', 7)
                ->exists();

            if (!$existingLog) {
                // Insert a new record in orderLog table
                $orderLog = new OrderLog();
                $orderLog->order_id = $order->id;
                $orderLog->order_cases_id = 7;
                $orderLog->save();

                    $totalQuantityReturned = 0;

                    if ($order->relationLoaded('items')) {
                        foreach ($order->items as $item) {
                            $product = $item->product;
                            $variantId = $item->product_variants_id;
                            $quantity = $item->quantity;
                            $totalQuantityReturned += $quantity;
                            if ($product->is_stockable) {

                                $stockQuery = Stock::where('product_id', $product->id);

                                if ($variantId) {
                                    $stockQuery->where('product_variants_id', $variantId);
                                }

                                $stock = $stockQuery->firstOrFail();

                                $stock->create([
                                    'product_id' => $product->id,
                                    'product_variants_id' => $variantId ?? null,
                                    'quantity' => $quantity,
                                    'movement' => 'push',
                                    'refernece_id' => $order->id,
                                    'refernece_type' => $order->getMorphClass(),
                                ]);
                            }
                        }
                    }
                    return $totalQuantityReturned;
                }
            }
            
        }

    
  
}